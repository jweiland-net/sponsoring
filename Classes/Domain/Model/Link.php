<?php
namespace JWeiland\Sponsoring\Domain\Model;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Projects
 */
class Link extends AbstractEntity {

    /**
     * Link
     *
     * @var string
     */
    protected $link = '';

    /**
     * Title
     *
     * @var string
     */
    protected $title = 'Video';

    /**
     * Returns Link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Sets Link
     *
     * @param string $link
     */
    public function setLink(string $link)
    {
        $this->link = $link;
    }

    /**
     * Returns Title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets Title
     *
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }
}
