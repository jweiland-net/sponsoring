<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Sponsoring',
    'description' => 'Display and manage sponsoring projects like competitions',
    'category' => 'plugin',
    'author' => 'Stefan Froemken',
    'author_email' => 'projects@jweiland.net',
    'state' => 'stable',
    'clearCacheOnLoad' => 0,
    'version' => '4.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.29-10.4.99',
            'maps2' => '8.0.0-0.0.0',
            'service_bw2' => '5.0.0-0.0.0'
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
