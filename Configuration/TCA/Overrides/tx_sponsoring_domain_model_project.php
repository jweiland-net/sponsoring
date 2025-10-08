<?php

/*
 * This file is part of the package jweiland/sponsoring.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use JWeiland\Maps2\Tca\Maps2Registry;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

if (!defined('TYPO3')) {
    die('Access denied.');
}

call_user_func(static function () {
    // Add tx_maps2_uid column to project table
    if (ExtensionManagementUtility::isLoaded('maps2')) {
        Maps2Registry::getInstance()->add(
            'sponsoring',
            'tx_sponsoring_domain_model_project',
        );
    }

    // Get and build extConf
    $extensionConfiguration = GeneralUtility::makeInstance(
        ExtensionConfiguration::class,
    );

    // Add categories field to tx_sponsoring_domain_model_project table
    $GLOBALS['TCA']['tx_sponsoring_domain_model_project']['columns']['promotion'] = [
        'label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.promotion',
        'config' => [
            'type' => 'category',
            'treeConfig' => [
                'startingPoints' => $extensionConfiguration->get('sponsoring', 'rootCategory'),
            ],
        ],
    ];

    ExtensionManagementUtility::addToAllTCAtypes(
        'tx_sponsoring_domain_model_project',
        'promotion',
    );
});
