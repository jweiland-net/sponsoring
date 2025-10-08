<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/sponsoring.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Sponsoring\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Main repository to find and fetch projects
 */
class ProjectRepository extends Repository
{
    /**
     * Find all project records sorted by given parameters
     *
     * @param int $promotion
     * @param string $sortBy
     * @param string $direction
     * @return QueryResultInterface
     */
    public function findAllSorted(
        int $promotion,
        string $sortBy = 'name',
        string $direction = 'ASC',
    ): QueryResultInterface {
        $query = $this->createQuery();
        $query->setOrderings([
            $sortBy => $direction,
        ]);

        $constraints = [];

        // Add promotion filter
        if ($promotion > 0) {
            $constraints = $query->contains('promotion', $promotion);
        }

        if (empty($constraints)) {
            return $query->execute();
        }
        return $query->matching($constraints)->execute();
    }
}
