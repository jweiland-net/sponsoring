<?php
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use JWeiland\Maps2\Tca\Maps2Registry;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
if (!defined('TYPO3')) {
    die('Access denied.');
}

call_user_func(static function () {
    // Add tx_maps2_uid column to project table
    if (ExtensionManagementUtility::isLoaded('maps2')) {
        Maps2Registry::getInstance()->add(
            'sponsoring',
            'tx_sponsoring_domain_model_project'
        );
    }

    // Get and build extConf
    $extensionConfiguration = GeneralUtility::makeInstance(
        ExtensionConfiguration::class
    );

    ExtensionManagementUtility::makeCategorizable(
        'sponsoring',
        'tx_sponsoring_domain_model_project',
        'promotion',
        [
            'label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.promotion',
            'fieldConfiguration' => [
                'treeConfig' => [
                    'rootUid' => $extensionConfiguration->get('sponsoring', 'rootCategory'),
                ],
            ],
            'fieldList' => 'promotion', // prevent creating a category tab
            'position' => 'before:promotion_type',
        ]
    );
});
