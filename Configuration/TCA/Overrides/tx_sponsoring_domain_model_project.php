<?php
$extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['sponsoring']);

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
