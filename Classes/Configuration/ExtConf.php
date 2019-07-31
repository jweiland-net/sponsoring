<?php
declare(strict_types = 1);
namespace JWeiland\Sponsoring\Configuration;

/*
 * This file is part of the sponsoring project.
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

use TYPO3\CMS\Core\SingletonInterface;

/**
 * This class will streamline the values from extension manager configuration
 */
class ExtConf implements SingletonInterface
{
    /**
     * @var int
     */
    protected $rootCategory = 0;

    public function __construct()
    {
        if (isset($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['sponsoring'])) {
            // get global configuration
            $extConf = unserialize(
                $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['sponsoring'],
                ['allowed_classes' => false]
            );
            if (is_array($extConf) && count($extConf)) {
                // call setter method foreach configuration entry
                foreach ($extConf as $key => $value) {
                    $methodName = 'set' . ucfirst($key);
                    if (method_exists($this, $methodName)) {
                        $this->$methodName($value);
                    }
                }
            }
        }
    }

    /**
     * @return int
     */
    public function getRootCategory(): int
    {
        return $this->rootCategory;
    }

    /**
     * @param int $rootCategory
     */
    public function setRootCategory(int $rootCategory)
    {
        $this->rootCategory = (int)$rootCategory;
    }
}
