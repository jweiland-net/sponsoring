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
    'version' => '2.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-9.5.99',
            'maps2' => '5.0.0-5.99.99',
            'service_bw2' => '2.0.0-2.99.99'
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
