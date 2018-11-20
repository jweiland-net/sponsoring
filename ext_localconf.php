<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'JWeiland.sponsoring',
    'Sponsoring',
    [
        'Project' => 'list, search, show',
    ],
    // non-cacheable actions
    [
        'Project' => 'search',
    ]
);
