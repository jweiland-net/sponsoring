<?php

/*
 * This file is part of the package jweiland/sponsoring.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

return [
    'ctrl' => [
        'title' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'name,number,contact_person,telephone,email,promotion_value,description,',
        'iconfile' => 'EXT:sponsoring/Resources/Public/Icons/tx_sponsoring_domain_model_project.svg',
    ],
    'types' => [
        '0' => [
            'showitem' => '--palette--;;languageHidden, --palette--;;nameNumber, path_segment, contact_person,
            --palette--;;telephoneEmail, application_deadline, promotion_type, promotion_value, images, description, files, links,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.access,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.access;access',
        ],
        '1' => [
            'showitem' => '--palette--;;languageHidden, --palette--;;nameNumber, path_segment, contact_person,
             --palette--;;telephoneEmail, application_deadline, promotion_type, promotion_value, images, description, files, links,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.access,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.access;access',
        ],
    ],
    'palettes' => [
        'languageHidden' => ['showitem' => 'sys_language_uid, l10n_parent, hidden'],
        'nameNumber' => ['showitem' => 'name, number'],
        'telephoneEmail' => ['showitem' => 'telephone, email'],
        'access' => [
            'showitem' => 'starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel,endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel',
        ],
    ],
    'columns' => [
        'name' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'path_segment' => [
            'label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.path_segment',
            'displayCond' => 'VERSION:IS:false',
            'config' => [
                'type' => 'slug',
                'size' => 50,
                'generatorOptions' => [
                    'fields' => ['name'],
                    // Do not add pageSlug, as we add pageSlug on our own in RouteEnhancer
                    'prefixParentPageSlug' => false,
                    'fieldSeparator' => '-',
                    'replacements' => [
                        '/' => '-',
                    ],
                ],
                'fallbackCharacter' => '-',
                'eval' => 'unique',
                'default' => '',
            ],
        ],
        'number' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.number',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'contact_person' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.contact_person',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'telephone' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.telephone',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'email' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.email',
            'config' => ['type' => 'email'],
        ],
        'organizer_manuell' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.organizer',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'application_deadline' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.application_deadline',
            'config' => [
                'type' => 'datetime',
                'dbType' => 'date',
                'format' => 'date',
            ],
        ],
        'promotion_type' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.promotion_type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'size' => 5,
                'minitems' => 0,
                'maxitems' => 99,
                'items' => [
                    ['label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.promotion_type.money', 'value' => 'money'],
                    ['label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.promotion_type.materialResources', 'value' => 'materialResources'],
                    ['label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.promotion_type.service', 'value' => 'service'],
                    ['label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.promotion_type.seeDescription', 'value' => 'seeDescription'],
                ],
            ],
        ],
        'promotion_value' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.promotion_value',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'images' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.images',
            'config' => [
                'type' => 'file',
                'minitems' => 0,
                'maxitems' => 5,
                'allowed' => 'common-image-types',
            ],
        ],
        'description' => [
            'l10n_mode' => 'prefixLangTitle',
            'label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'softref' => 'typolink_tag,email[subst],url',
                'enableRichtext' => true,
            ],
        ],
        'files' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.files',
            'config' => [
                'type' => 'file',
                'minitems' => 0,
                'maxitems' => 10,
                'allowed' => 'pdf',
            ],
        ],
        'links' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.links',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_sponsoring_domain_model_link',
                'maxitems' => 10,
                'minitems' => 0,
                'appearance' => [
                    'levelLinksPosition' => 'top',
                    'newRecordLinkAddTitle' => true,
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1,
                ],
            ],
        ],
    ],
];
