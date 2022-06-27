<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

call_user_func(static function () {
    // Add tx_maps2_uid column to project table
    if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('maps2')) {
        \JWeiland\Maps2\Tca\Maps2Registry::getInstance()->add(
            'sponsoring',
            'tx_sponsoring_domain_model_project'
        );
    }

    // Get and build extConf
    $extensionConfiguration = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
        \TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
        'sponsoring',
        'tx_sponsoring_domain_model_project',
        'promotion',
        [
            'label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.promotion',
            'fieldConfiguration' => [
                'treeConfig' => [
                    'rootUid' => $extensionConfiguration->get('sponsoring', 'rootCategory')
                ]
            ],
            'fieldList' => 'promotion', // prevent creating a category tab
            'position' => 'before:promotion_type'
        ]
    );
});
