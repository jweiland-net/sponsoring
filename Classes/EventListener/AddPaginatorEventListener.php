<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/sponsoring.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Sponsoring\EventListener;

use JWeiland\Sponsoring\Event\PostProcessFluidVariablesEvent;
use JWeiland\Sponsoring\Pagination\RequestPagination;
use TYPO3\CMS\Core\Utility\MathUtility;
use TYPO3\CMS\Extbase\Pagination\QueryResultPaginator;

class AddPaginatorEventListener extends AbstractControllerEventListener
{
    /**
     * @var int
     */
    protected $itemsPerPage = 15;

    protected $allowedControllerActions = [
        'Project' => [
            'list',
            'search',
        ],
    ];

    public function __invoke(PostProcessFluidVariablesEvent $event): void
    {
        if ($this->isValidRequest($event)) {
            $paginator = new QueryResultPaginator(
                $event->getFluidVariables()['projects'],
                $this->getCurrentPage($event),
                $this->getItemsPerPage($event)
            );

            $event->addFluidVariable('actionName', $event->getActionName());
            $event->addFluidVariable('paginator', $paginator);
            $event->addFluidVariable('projects', $paginator->getPaginatedItems());
            $event->addFluidVariable('pagination', new RequestPagination($paginator));
        }
    }

    protected function getCurrentPage(PostProcessFluidVariablesEvent $event): int
    {
        $currentPage = 1;
        if ($event->getRequest()->hasArgument('currentPage')) {
            // $currentPage have to be positive and greater than 0
            // See: AbstractPaginator::setCurrentPageNumber()
            $currentPage = MathUtility::forceIntegerInRange(
                (int)$event->getRequest()->getArgument('currentPage'),
                1
            );
        }

        return $currentPage;
    }

    protected function getItemsPerPage(PostProcessFluidVariablesEvent $event): int
    {
        return (int)($event->getSettings()['pageBrowser']['itemsPerPage'] ?? $this->itemsPerPage);
    }
}
