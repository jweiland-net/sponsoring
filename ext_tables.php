<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_sponsoring_domain_model_project',
    'EXT:sponsoring/Resources/Private/Language/locallang_csh_tx_sponsoring_domain_model_project.xlf'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_sponsoring_domain_model_link',
    'EXT:sponsoring/Resources/Private/Language/locallang_csh_tx_sponsoring_domain_model_link.xlf'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sponsoring_domain_model_project');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sponsoring_domain_model_link');
