<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/sponsoring.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use JWeiland\Sponsoring\Domain\Model\Category;
use JWeiland\Sponsoring\Domain\Model\Project;

return [
    Category::class => [
        'tableName' => 'sys_category',
    ],
    Project::class => [
        'properties' => [
            'organizer' => [
                'fieldName' => 'organizer_manuell',
            ],
        ],
    ],
];
