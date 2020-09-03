<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

// @ToDo: SF: This must be removed. It is up to the user to implement icon for categories and extend sponsoring
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'sys_category',
    [
        'icon' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:sys_category.icon',
            'config' => [
                'type' => 'group',
                'internal_type' => 'file',
                'uploadfolder' => 'uploads/tx_sponsoring',
                'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
                'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],
                'show_thumbs' => true,
                'size' => 5,
                'maxitems' => 1,
                'minitems' => 0,
            ],
        ],
    ]
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'sys_category',
    'icon',
    '1',
    'after:description'
);
