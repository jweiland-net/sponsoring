<?php
if (!defined('TYPO3_MODE')) {
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

    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['sponsoringUpdateSlug']
        = \JWeiland\Sponsoring\Updater\SponsoringSlugUpdater::class;
});
