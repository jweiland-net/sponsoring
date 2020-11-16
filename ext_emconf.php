<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Sponsoring',
    'description' => 'Display and manage sponsoring projects like competitions',
    'category' => 'plugin',
    'author' => 'Stefan Froemken',
    'author_email' => 'projects@jweiland.net',
    'state' => 'stable',
    'clearCacheOnLoad' => 0,
    'version' => '3.0.4',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.17-10.4.99',
            'maps2' => '8.0.0-0.0.0',
            'service_bw2' => '4.0.0-4.99.99'
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
