<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/sponsoring.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Sponsoring\Update;

use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\Restriction\DeletedRestriction;
use TYPO3\CMS\Core\DataHandling\SlugHelper;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Install\Attribute\UpgradeWizard;
use TYPO3\CMS\Install\Updates\DatabaseUpdatedPrerequisite;
use TYPO3\CMS\Install\Updates\UpgradeWizardInterface;

/*
 * Updater to fill empty slug columns of project records
 */
#[UpgradeWizard('sponsoring_sponsoringSlugUpdater')]
class SponsoringSlugUpdater implements UpgradeWizardInterface
{
    protected string $tableName = 'tx_sponsoring_domain_model_project';

    protected string $fieldName = 'path_segment';

    protected SlugHelper $slugHelper;
    public function __construct(
        private readonly ConnectionPool $connectionPool,
    ) {}

    /**
     * Return the identifier for this wizard
     * This should be the same string as used in the ext_localconf class registration
     */
    public function getIdentifier(): string
    {
        return 'sponsoringUpdateSlug';
    }

    public function getTitle(): string
    {
        return '[sponsoring] Update Slug of project records';
    }

    public function getDescription(): string
    {
        return 'Update empty slug column "path_segment" of project records with an URI compatible version of the project name';
    }

    public function updateNecessary(): bool
    {
        $queryBuilder = $this->connectionPool->getQueryBuilderForTable($this->tableName);
        $queryBuilder->getRestrictions()->removeAll();
        $queryBuilder->getRestrictions()->add(GeneralUtility::makeInstance(DeletedRestriction::class));
        $amountOfRecordsWithEmptySlug = $queryBuilder
            ->count('*')
            ->from($this->tableName)->where($queryBuilder->expr()->or($queryBuilder->expr()->eq(
                $this->fieldName,
                $queryBuilder->createNamedParameter('', Connection::PARAM_STR),
            ), $queryBuilder->expr()->isNull(
                $this->fieldName,
            )))->executeQuery()
            ->fetchOne();

        return (bool)$amountOfRecordsWithEmptySlug;
    }

    /**
     * Performs the accordant updates.
     *
     * @return bool Whether everything went smoothly or not
     */
    public function executeUpdate(): bool
    {
        $queryBuilder = $this->connectionPool->getQueryBuilderForTable($this->tableName);
        $queryBuilder->getRestrictions()->removeAll();
        $queryBuilder->getRestrictions()->add(GeneralUtility::makeInstance(DeletedRestriction::class));
        $statement = $queryBuilder
            ->select('uid', 'pid', 'name')
            ->from($this->tableName)->where($queryBuilder->expr()->or($queryBuilder->expr()->eq(
                $this->fieldName,
                $queryBuilder->createNamedParameter('', Connection::PARAM_STR),
            ), $queryBuilder->expr()->isNull(
                $this->fieldName,
            )))->executeQuery();

        $connection = $this->connectionPool->getConnectionForTable($this->tableName);
        while ($recordToUpdate = $statement->fetch()) {
            if ((string)$recordToUpdate['name'] !== '') {
                $slug = $this->getSlugHelper()->generate($recordToUpdate, (int)$recordToUpdate['pid']);
                $connection->update(
                    $this->tableName,
                    [
                        $this->fieldName => $slug,
                    ],
                    [
                        'uid' => (int)$recordToUpdate['uid'],
                    ],
                );
            }
        }

        return true;
    }

    protected function getSlugHelper(): SlugHelper
    {
        if ($this->slugHelper === null) {
            // Add uid to slug, to prevent duplicates
            $config = $GLOBALS['TCA'][$this->tableName]['columns']['path_segment']['config'];
            $config['generatorOptions']['fields'] = ['name', 'uid'];

            $this->slugHelper = GeneralUtility::makeInstance(
                SlugHelper::class,
                $this->tableName,
                $this->fieldName,
                $config,
            );
        }

        return $this->slugHelper;
    }

    /**
     * @return string[]
     */
    public function getPrerequisites(): array
    {
        return [
            DatabaseUpdatedPrerequisite::class,
        ];
    }
}
