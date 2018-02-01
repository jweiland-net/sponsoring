<?php
namespace JWeiland\Sponsoring\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Stefan Frömken <projects@jweiland.net>, jweiland.net
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class JWeiland\Sponsoring\Controller\ProjectController.
 *
 * @author Stefan Frömken <projects@jweiland.net>
 * @todo update unit test !
 */
class ProjectControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \JWeiland\Sponsoring\Controller\ProjectController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('JWeiland\\Sponsoring\\Controller\\ProjectController', ['redirect', 'forward', 'addFlashMessage'], [], '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllProjectsFromRepositoryAndAssignsThemToView() {

		$allProjects = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', [], [], '', FALSE);

		$projectRepository = $this->getMock('JWeiland\\Sponsoring\\Domain\\Repository\\ProjectRepository', ['findAll'], [], '', FALSE);
		$projectRepository->expects($this->once())->method('findAll')->will($this->returnValue($allProjects));
		$this->inject($this->subject, 'projectRepository', $projectRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('projects', $allProjects);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenProjectToView() {
		$project = new \JWeiland\Sponsoring\Domain\Model\Project();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('project', $project);

		$this->subject->showAction($project);
	}
}
