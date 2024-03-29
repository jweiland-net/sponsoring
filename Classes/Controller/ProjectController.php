<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/sponsoring.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Sponsoring\Controller;

use JWeiland\Sponsoring\Configuration\ExtConf;
use JWeiland\Sponsoring\Domain\Repository\CategoryRepository;
use JWeiland\Sponsoring\Domain\Repository\ProjectRepository;
use JWeiland\Sponsoring\Event\PostProcessFluidVariablesEvent;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Annotation as Extbase;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;

/**
 * Main controller to list and show projects
 */
class ProjectController extends ActionController
{
    /**
     * @var ProjectRepository
     */
    protected $projectRepository;

    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @var ExtConf
     */
    protected $extConf;

    public function injectProjectRepository(ProjectRepository $projectRepository): void
    {
        $this->projectRepository = $projectRepository;
    }

    public function injectCategoryRepository(CategoryRepository $categoryRepository): void
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function injectExtConf(ExtConf $extConf): void
    {
        $this->extConf = $extConf;
    }

    public function initializeAction(): void
    {
        // if this value was not set, then it will be filled with 0
        // but that is not good, because UriBuilder accepts 0 as pid, so it's better to set it to NULL
        if (empty($this->settings['pidOfDetailPage'])) {
            $this->settings['pidOfDetailPage'] = null;
        }
    }

    public function initializeView(ViewInterface $view): void
    {
        $view->assign('typo3RequestDir', GeneralUtility::getIndpEnv('TYPO3_REQUEST_DIR'));
    }

    public function listAction(): void
    {
        $this->postProcessAndAssignFluidVariables([
            'projects' => $this->projectRepository->findAll(),
            'promotions' => $this->categoryRepository->findByParent($this->extConf->getRootCategory()),
        ]);
    }

    /**
     * @Extbase\Validate(param="sortBy", validator="RegularExpression", options={"regularExpression": "/name|application_deadline|promotion_value/"})
     * @Extbase\Validate(param="direction", validator="RegularExpression", options={"regularExpression": "/ASC|DESC/"})
     */
    public function searchAction(int $promotion = 0, string $sortBy = 'name', string $direction = 'ASC'): void
    {
        $this->postProcessAndAssignFluidVariables([
            'projects' => $this->projectRepository->findAllSorted($promotion, $sortBy, $direction),
            'promotion' => $promotion,
            'sortBy' => $sortBy,
            'direction' => $direction,
            'promotions' => $this->categoryRepository->findByParent($this->extConf->getRootCategory()),
        ]);
    }

    public function showAction(int $project): void
    {
        $this->postProcessAndAssignFluidVariables([
            'project' => $this->projectRepository->findByIdentifier($project),
        ]);
    }

    protected function postProcessAndAssignFluidVariables(array $variables = []): void
    {
        /** @var PostProcessFluidVariablesEvent $event */
        $event = $this->eventDispatcher->dispatch(
            new PostProcessFluidVariablesEvent(
                $this->request,
                $this->settings,
                $variables
            )
        );

        $this->view->assignMultiple($event->getFluidVariables());
    }
}
