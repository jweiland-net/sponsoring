<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Sponsoring',
    'description' => 'Display sponsoring projects',
    'category' => 'plugin',
    'author' => 'Stefan Frömken',
    'author_email' => 'projects@jweiland.net',
    'state' => 'stable',
    'internal' => '',
    'uploadfolder' => '1',
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '2.0.3',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-9.5.99',
            'maps2' => '8.0.0-0.0.0',
            'service_bw2' => '3.0.0-3.99.99'
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
