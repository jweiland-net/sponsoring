<?php
declare(strict_types = 1);
namespace JWeiland\Sponsoring\Domain\Model;

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

use JWeiland\Maps2\Domain\Model\PoiCollection;
use JWeiland\ServiceBw2\Utility\ModelUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Main domain model for projects
 */
class Project extends AbstractEntity
{
    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $number = '';

    /**
     * @var string
     */
    protected $contactPerson = '';

    /**
     * @var string
     */
    protected $telephone = '';

    /**
     * @var string
     */
    protected $email = '';

    /**
     * @var bool
     */
    protected $organizerType = false;

    /**
     * Organisationseinheit from ext:service_bw2
     * Will be an array after first getter call!
     *
     * @var int
     */
    protected $organisationseinheit = 0;

    /**
     * @var string
     */
    protected $organizerManuell = '';

    /**
     * @var \DateTime
     */
    protected $applicationDeadline;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Sponsoring\Domain\Model\Category>
     */
    protected $promotion;

    /**
     * @var string
     */
    protected $promotionType = '';

    /**
     * @var string
     */
    protected $promotionValue = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $images;

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var \JWeiland\Maps2\Domain\Model\PoiCollection
     */
    protected $txMaps2Uid;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $files;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Sponsoring\Domain\Model\Link>
     */
    protected $links;

    public function __construct()
    {
        $this->initStorageObjects();
    }

    /**
     * Initializes all \TYPO3\CMS\Extbase\Persistence\ObjectStorage properties.
     */
    protected function initStorageObjects()
    {
        $this->promotion = new ObjectStorage();
        $this->images = new ObjectStorage();
        $this->files = new ObjectStorage();
        $this->links = new ObjectStorage();
    }

    /**
     * @return array
     */
    public function getOrganisationseinheit(): array
    {
        return $this->organisationseinheit = ModelUtility::getOrganisationseinheit($this->organisationseinheit);
    }

    /**
     * @param array $organisationseinheit
     */
    public function setOrganisationseinheit(array $organisationseinheit)
    {
        $this->organisationseinheit = $organisationseinheit;
    }

    /**
     * Get Organizer
     * It can handle both kinds of organizer
     * Useful for Fluid Templates
     *
     * @return string
     */
    public function getOrganizer(): string
    {
        if ($this->organizerType) {
            // get manually given organizer
            return $this->getOrganizerManuell();
        }
        $organisationseinheit = $this->getOrganisationseinheit();
        if (\is_array($organisationseinheit) && isset($organisationseinheit['name'])) {
            return $organisationseinheit['name'];
        }
        return '';
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber(string $number)
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getContactPerson(): string
    {
        return $this->contactPerson;
    }

    /**
     * @param string $contactPerson
     */
    public function setContactPerson(string $contactPerson)
    {
        $this->contactPerson = $contactPerson;
    }

    /**
     * @return string
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone(string $telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return bool
     */
    public function isOrganizerType(): bool
    {
        return $this->organizerType;
    }

    /**
     * @param bool $organizerType
     */
    public function setOrganizerType(bool $organizerType)
    {
        $this->organizerType = $organizerType;
    }

    /**
     * @return string
     */
    public function getOrganizerManuell(): string
    {
        return $this->organizerManuell;
    }

    /**
     * @param string $organizerManuell
     */
    public function setOrganizerManuell(string $organizerManuell)
    {
        $this->organizerManuell = $organizerManuell;
    }

    /**
     * @return \DateTime|null
     */
    public function getApplicationDeadline()
    {
        return $this->applicationDeadline;
    }

    /**
     * @param \DateTime|null $applicationDeadline
     */
    public function setApplicationDeadline(\DateTime $applicationDeadline = null)
    {
        $this->applicationDeadline = $applicationDeadline;
    }

    /**
     * @return ObjectStorage
     */
    public function getPromotion(): ObjectStorage
    {
        return $this->promotion;
    }

    /**
     * @param ObjectStorage $promotion
     */
    public function setPromotion(ObjectStorage $promotion)
    {
        $this->promotion = $promotion;
    }

    /**
     * @return array
     */
    public function getPromotionType(): array
    {
        return GeneralUtility::trimExplode(',', $this->promotionType, true);
    }

    /**
     * @param string $promotionType
     */
    public function setPromotionType(string $promotionType)
    {
        $this->promotionType = $promotionType;
    }

    /**
     * @return string
     */
    public function getPromotionValue(): string
    {
        return $this->promotionValue;
    }

    /**
     * @param string $promotionValue
     */
    public function setPromotionValue(string $promotionValue)
    {
        $this->promotionValue = $promotionValue;
    }

    /**
     * @return ObjectStorage
     */
    public function getImages(): ObjectStorage
    {
        return $this->images;
    }

    /**
     * @param ObjectStorage $images
     */
    public function setImages(ObjectStorage $images)
    {
        $this->images = $images;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return PoiCollection|null
     */
    public function getTxMaps2Uid()
    {
        return $this->txMaps2Uid;
    }

    /**
     * @param PoiCollection $txMaps2Uid
     */
    public function setTxMaps2Uid(PoiCollection $txMaps2Uid)
    {
        $this->txMaps2Uid = $txMaps2Uid;
    }

    /**
     * @return ObjectStorage
     */
    public function getFiles(): ObjectStorage
    {
        return $this->files;
    }

    /**
     * @param ObjectStorage $files
     */
    public function setFiles(ObjectStorage $files)
    {
        $this->files = $files;
    }

    /**
     * @return ObjectStorage
     */
    public function getLinks(): ObjectStorage
    {
        return $this->links;
    }

    /**
     * @param ObjectStorage $links
     */
    public function setLinks(ObjectStorage $links)
    {
        $this->links = $links;
    }
}
