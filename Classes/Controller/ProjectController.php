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
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Annotation as Extbase;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;

/**
 * Main controller to list and show projects
 */
class ProjectController extends ActionController
{
    public function __construct(
        private readonly ProjectRepository $projectRepository,
        private readonly CategoryRepository $categoryRepository,
        private readonly ExtConf $extConf,
    ) {}

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

    public function listAction(): ResponseInterface
    {
        $this->postProcessAndAssignFluidVariables([
            'projects' => $this->projectRepository->findAll(),
            'promotions' => $this->categoryRepository->findByParent($this->extConf->getRootCategory()),
        ]);
        return $this->htmlResponse();
    }

    #[Extbase\Validate(['param' => 'sortBy', 'validator' => 'RegularExpression', 'options' => ['regularExpression' => '/name|application_deadline|promotion_value/']])]
    #[Extbase\Validate(['param' => 'direction', 'validator' => 'RegularExpression', 'options' => ['regularExpression' => '/ASC|DESC/']])]
    public function searchAction(int $promotion = 0, string $sortBy = 'name', string $direction = 'ASC'): ResponseInterface
    {
        $this->postProcessAndAssignFluidVariables([
            'projects' => $this->projectRepository->findAllSorted($promotion, $sortBy, $direction),
            'promotion' => $promotion,
            'sortBy' => $sortBy,
            'direction' => $direction,
            'promotions' => $this->categoryRepository->findByParent($this->extConf->getRootCategory()),
        ]);
        return $this->htmlResponse();
    }

    public function showAction(int $project): ResponseInterface
    {
        $this->postProcessAndAssignFluidVariables([
            'project' => $this->projectRepository->findByIdentifier($project),
        ]);
        return $this->htmlResponse();
    }

    protected function postProcessAndAssignFluidVariables(array $variables = []): void
    {
        /** @var PostProcessFluidVariablesEvent $event */
        $event = $this->eventDispatcher->dispatch(
            new PostProcessFluidVariablesEvent(
                $this->request,
                $this->settings,
                $variables,
            ),
        );

        $this->view->assignMultiple($event->getFluidVariables());
    }
}
