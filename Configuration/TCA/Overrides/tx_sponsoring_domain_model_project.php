<?php

call_user_func(function ($extConf) {
    // Add tx_maps2_uid column to project table
    if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('maps2')) {
        \JWeiland\Maps2\Tca\Maps2Registry::getInstance()->add(
            'sponsoring',
            'tx_sponsoring_domain_model_project'
        );
    }

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
        'sponsoring',
        'tx_sponsoring_domain_model_project',
        'promotion',
        [
            'label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.promotion',
            'fieldConfiguration' => [
                'treeConfig' => [
                    'rootUid' => $extConf['rootCategory']
                ]
            ],
            'fieldList' => 'promotion', // prevent creating a category tab
            'position' => 'before:promotion_type'
        ]
    );
}, unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['sponsoring']));
