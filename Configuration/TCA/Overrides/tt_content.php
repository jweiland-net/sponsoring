<?php

/*
 * This file is part of the package jweiland/sponsoring.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

if (!defined('TYPO3')) {
    die('Access denied.');
}

ExtensionUtility::registerPlugin(
    'Sponsoring',
    'Sponsoring',
    'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:plugin.title',
    'ext-sponsoring-wizard-icon',
    'plugins',
    'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:plugin.description',
);
