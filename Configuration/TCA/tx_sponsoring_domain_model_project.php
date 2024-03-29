<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'type' => 'organizer_type',
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
        'searchFields' => 'name,number,contact_person,telephone,email,organizer,promotion_value,description,',
        'iconfile' => 'EXT:sponsoring/Resources/Public/Icons/tx_sponsoring_domain_model_project.svg',
    ],
    'types' => [
        '0' => [
            'showitem' => '--palette--;;languageHidden, --palette--;;nameNumber, path_segment, contact_person, 
            --palette--;;telephoneEmail, organizer_type, organisationseinheit, application_deadline, promotion_type, promotion_value, images, description, files, links,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.access, 
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.access;access',
        ],
        '1' => [
            'showitem' => '--palette--;;languageHidden, --palette--;;nameNumber, path_segment, contact_person,
             --palette--;;telephoneEmail, organizer_type, organizer_manuell, application_deadline, promotion_type, promotion_value, images, description, files, links,
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
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple',
                    ],
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        '',
                        0,
                    ],
                ],
                'foreign_table' => 'tx_sponsoring_domain_model_project',
                'foreign_table_where' => 'AND tx_sponsoring_domain_model_project.pid=###CURRENT_PID### AND tx_sponsoring_domain_model_project.sys_language_uid IN (-1,0)',
                'default' => 0,
            ],
        ],
        'l10n_source' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true,
                    ],
                ],
            ],
        ],
        'cruser_id' => [
            'label' => 'cruser_id',
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'pid' => [
            'label' => 'pid',
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'crdate' => [
            'label' => 'crdate',
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'tstamp' => [
            'label' => 'tstamp',
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
            ],
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038),
                ],
            ],
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
        ],
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
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,email',
            ],
        ],
        'organizer_type' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.organizer_type',
            'description' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.organizer_type.description',
            'config' => [
                'type' => 'check',
                'default' => 0,
            ],
        ],
        'organisationseinheit' => [
            'displayCond' => 'FIELD:organizer_type:=:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.organisationseinheit',
            'config' => \JWeiland\ServiceBw2\Utility\TCAUtility::getOrganisationseinheitenFieldTCAConfig(['maxitems' => 1]),
        ],
        'organizer_manuell' => [
            'displayCond' => 'FIELD:organizer_type:=:1',
            'exclude' => 1,
            'label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.organizer_manuell',
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
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'dbType' => 'date',
                'size' => 7,
                'eval' => 'date',
                'checkbox' => 0,
                'default' => '0000-00-00',
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
                    ['LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.promotion_type.money', 'money'],
                    ['LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.promotion_type.materialResources', 'materialResources'],
                    ['LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.promotion_type.service', 'service'],
                    ['LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.promotion_type.seeDescription', 'seeDescription'],
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
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'images',
                [
                    'minitems' => 0,
                    'maxitems' => 5,
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference',
                    ],
                    'overrideChildTca' => [
                        'types' => [
                            '0' => [
                                'showitem' => '
                            --palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette',
                            ],
                            \TYPO3\CMS\Core\Resource\AbstractFile::FILETYPE_TEXT => [
                                'showitem' => '
                            --palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette',
                            ],
                            \TYPO3\CMS\Core\Resource\AbstractFile::FILETYPE_IMAGE => [
                                'showitem' => '
                            --palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette',
                            ],
                            \TYPO3\CMS\Core\Resource\AbstractFile::FILETYPE_AUDIO => [
                                'showitem' => '
                            --palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette',
                            ],
                            \TYPO3\CMS\Core\Resource\AbstractFile::FILETYPE_VIDEO => [
                                'showitem' => '
                            --palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette',
                            ],
                            \TYPO3\CMS\Core\Resource\AbstractFile::FILETYPE_APPLICATION => [
                                'showitem' => '
                            --palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette',
                            ],
                        ],
                    ],
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ],
        'description' => [
            'l10n_mode' => 'prefixLangTitle',
            'l10n_cat' => 'text',
            'label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'softref' => 'typolink_tag,images,email[subst],url',
                'enableRichtext' => true,
            ],
        ],
        'files' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:sponsoring/Resources/Private/Language/locallang_db.xlf:tx_sponsoring_domain_model_project.files',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'files',
                [
                    'minitems' => 0,
                    'maxitems' => 10,
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:media.addFileReference',
                    ],
                ],
            ),
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
