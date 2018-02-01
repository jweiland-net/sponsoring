<?php
namespace JWeiland\Sponsoring\Controller;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use JWeiland\Sponsoring\Domain\Repository\ProjectRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;

/**
 * ProjectController
 */
class ProjectController extends ActionController
{

    /**
     * projectRepository
     *
     * @var ProjectRepository
     */
    protected $projectRepository;

    /**
     * inject projectRepository
     *
     * @param ProjectRepository $projectRepository
     * @return void
     */
    public function injectProjectRepository(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * preprocessing of all actions
     *
     * @return void
     */
    public function initializeAction()
    {
        // if this value was not set, then it will be filled with 0
        // but that is not good, because UriBuilder accepts 0 as pid, so it's better to set it to NULL
        if (empty($this->settings['pidOfDetailPage'])) {
            $this->settings['pidOfDetailPage'] = null;
        }
    }

    /**
     * add some default variables to fluid templates
     *
     * @return void
     */
    public function initializeView(ViewInterface $view)
    {
        $this->view->assign('typo3RequestDir', GeneralUtility::getIndpEnv('TYPO3_REQUEST_DIR'));
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $projects = $this->projectRepository->findAll();
        $this->view->assign('projects', $projects);
    }

    /**
     * action search
     *
     * @param integer $promotion
     * @param string $sortBy
     * @param string $direction
     * @validate $sortBy RegularExpression(regularExpression=/name|application_deadline|promotion_value/)
     * @validate $direction RegularExpression(regularExpression=/ASC|DESC/)
     * @return void
     */
    public function searchAction(int $promotion = 0, string $sortBy = 'name', string $direction = 'ASC')
    {
        $projects = $this->projectRepository->findAllSorted($promotion, $sortBy, $direction);
        $this->view->assign('projects', $projects);
        $this->view->assign('promotion', $promotion);
        $this->view->assign('sortBy', $sortBy);
        $this->view->assign('direction', $direction);
    }

    /**
     * action show
     *
     * @param int $project
     * @return void
     */
    public function showAction(int $project)
    {
        $this->view->assign('project', $this->projectRepository->findByIdentifier($project));
    }

}