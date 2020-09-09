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

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['sponsoringUpdateSlug']
    = \JWeiland\Sponsoring\Updater\SponsoringSlugUpdater::class;
