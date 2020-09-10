<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/sponsoring.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Sponsoring\Domain\Model;

/**
 * Domain model for categories.
 *
 * As TYPO3 does not come with TCA nor with a SQL entry, it is not save
 * to use the icon setter/getter of extbase. Maybe they will be removed
 * in future.
 */
class Category extends \TYPO3\CMS\Extbase\Domain\Model\Category
{
    /**
     * @var string
     */
    protected $icon = '';

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Sets the icon
     *
     * @param string $icon
     */
    public function setIcon($icon)
    {
        $this->icon = (string)$icon;
    }
}
