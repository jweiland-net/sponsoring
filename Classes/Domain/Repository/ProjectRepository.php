<?php
namespace JWeiland\Sponsoring\Domain\Repository;

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

use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * The repository for Projects
 */
class ProjectRepository extends Repository
{

    /**
     * find all records sorted by given parameters
     *
     * @param string $promotion
     * @param string $sortBy
     * @param string $direction
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findAllSorted(string $promotion, string $sortBy = 'name', string $direction = 'ASC')
    {
        $query = $this->createQuery();
        $query->setOrderings([
            $sortBy => $direction
        ]);
        $constraints = [];

        // add promotion filter
        if (!empty($promotion)) {
            $constraints = $query->contains('promotion', $promotion);
        }

        if (empty($constraints)) {
            return $query->execute();
        }
        return $query->matching($constraints)->execute();
    }
}
