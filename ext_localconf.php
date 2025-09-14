<?php
if (!defined('TYPO3')) {
    die('Access denied.');
}

call_user_func(static function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Sponsoring',
        'Sponsoring',
        [
            \JWeiland\Sponsoring\Controller\ProjectController::class => 'list, search, show',
        ],
        // non-cacheable actions
        [
            \JWeiland\Sponsoring\Controller\ProjectController::class => 'search',
        ]
    );

    // Add sponsoring plugin to new element wizard
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:sponsoring/Configuration/TSconfig/ContentElementWizard.tsconfig">'
    );

    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['sponsoringUpdateSlug']
        = \JWeiland\Sponsoring\Updater\SponsoringSlugUpdater::class;
});
