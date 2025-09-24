<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/sponsoring.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Sponsoring\Configuration;

use Symfony\Component\DependencyInjection\Attribute\Autoconfigure;
use TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationExtensionNotConfiguredException;
use TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationPathDoesNotExistException;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\SingletonInterface;

/**
 * This class will streamline the values from extension manager configuration
 */
#[Autoconfigure(constructor: 'create')]
readonly class ExtConf implements SingletonInterface
{
    private const EXT_KEY = 'sponsoring';

    private const DEFAULT_SETTINGS = [
        'rootCategory' => 0,
    ];

    public function __construct(private int $rootCategory = self::DEFAULT_SETTINGS['rootCategory'])
    {
    }

    public static function create(ExtensionConfiguration $extensionConfiguration): static
    {
        $extensionSettings = self::DEFAULT_SETTINGS;

        try {
            $extensionSettings = array_merge(
                $extensionSettings,
                $extensionConfiguration->get(self::EXT_KEY),
            );
        } catch (ExtensionConfigurationExtensionNotConfiguredException|ExtensionConfigurationPathDoesNotExistException $e) {
        }
    }

    public function getRootCategory(): int
    {
        return $this->rootCategory;
    }
}
