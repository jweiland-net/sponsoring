<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/sponsoring.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Sponsoring\Controller;

use JWeiland\Sponsoring\Domain\Repository\ProjectRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
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

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function initializeAction()
    {
        // if this value was not set, then it will be filled with 0
        // but that is not good, because UriBuilder accepts 0 as pid, so it's better to set it to NULL
        if (empty($this->settings['pidOfDetailPage'])) {
            $this->settings['pidOfDetailPage'] = null;
        }
    }

    public function initializeView(ViewInterface $view)
    {
        $view->assign('typo3RequestDir', GeneralUtility::getIndpEnv('TYPO3_REQUEST_DIR'));
    }

    public function listAction(): void
    {
        $projects = $this->projectRepository->findAll();
        $this->view->assign('projects', $projects);
    }

    /**
     * Action search
     *
     * @param int $promotion
     * @param string $sortBy
     * @param string $direction
     * @validate $sortBy RegularExpression(regularExpression=/name|application_deadline|promotion_value/)
     * @validate $direction RegularExpression(regularExpression=/ASC|DESC/)
     */
    public function searchAction(int $promotion = 0, string $sortBy = 'name', string $direction = 'ASC'): void
    {
        $projects = $this->projectRepository->findAllSorted($promotion, $sortBy, $direction);
        $this->view->assign('projects', $projects);
        $this->view->assign('promotion', $promotion);
        $this->view->assign('sortBy', $sortBy);
        $this->view->assign('direction', $direction);
    }

    /**
     * @param int $project
     */
    public function showAction(int $project): void
    {
        $this->view->assign('project', $this->projectRepository->findByIdentifier($project));
    }
}
