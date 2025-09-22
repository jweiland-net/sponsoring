<?php

/*
 * This file is part of the package jweiland/sponsoring.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use JWeiland\Pfprojects\Controller\ProjectController;
use JWeiland\Sponsoring\Updater\SponsoringSlugUpdater;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

if (!defined('TYPO3')) {
    die('Access denied.');
}

call_user_func(static function () {
    ExtensionUtility::configurePlugin(
        'Sponsoring',
        'Sponsoring',
        [
            ProjectController::class => 'list, search, show',
        ],
        // non-cacheable actions
        [
            ProjectController::class => 'search',
        ],
        ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT,
    );

    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['sponsoringUpdateSlug']
        = SponsoringSlugUpdater::class;
});
