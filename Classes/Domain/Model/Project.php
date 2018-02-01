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

use JWeiland\ServiceBw2\Utility\ModelUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Projects
 */
class Project extends AbstractEntity
{
    /**
     * name
     *
     * @var string
     */
    protected $name = '';

    /**
     * number
     *
     * @var string
     */
    protected $number = '';

    /**
     * contactPerson
     *
     * @var string
     */
    protected $contactPerson = '';

    /**
     * telephone
     *
     * @var string
     */
    protected $telephone = '';

    /**
     * email
     *
     * @var string
     */
    protected $email = '';

    /**
     * organizerType
     *
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
     * organizerManuell
     *
     * @var string
     */
    protected $organizerManuell = '';

    /**
     * applicationDeadline
     *
     * @var \DateTime
     */
    protected $applicationDeadline;

    /**
     * promotion
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     */
    protected $promotion;

    /**
     * promotionType
     *
     * @var string
     */
    protected $promotionType = '';

    /**
     * promotionValue
     *
     * @var string
     */
    protected $promotionValue = '';

    /**
     * images
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $images;

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * TxMaps2Uid
     *
     * @var \JWeiland\Maps2\Domain\Model\PoiCollection
     */
    protected $txMaps2Uid;

    /**
     * files
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $files;

    /**
     * links
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Sponsoring\Domain\Model\Link>
     */
    protected $links;

    /**
     * __construct
     */
    public function __construct()
    {
        $this->initStorageObjects();
    }

    /**
     * Initializes all \TYPO3\CMS\Extbase\Persistence\ObjectStorage properties.
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->promotion = new ObjectStorage();
        $this->images = new ObjectStorage();
        $this->files = new ObjectStorage();
        $this->links = new ObjectStorage();
    }

    /**
     * Returns Organisationseinheit
     *
     * @return array
     */
    public function getOrganisationseinheit(): array
    {
        return $this->organisationseinheit = ModelUtility::getOrganisationseinheit($this->organisationseinheit);
    }

    /**
     * Sets Organisationseinheit
     *
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
    public function getOrganizer()
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
     * Returns Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets Name
     *
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Returns Number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Sets Number
     *
     * @param string $number
     */
    public function setNumber(string $number)
    {
        $this->number = $number;
    }

    /**
     * Returns ContactPerson
     *
     * @return string
     */
    public function getContactPerson(): string
    {
        return $this->contactPerson;
    }

    /**
     * Sets ContactPerson
     *
     * @param string $contactPerson
     */
    public function setContactPerson(string $contactPerson)
    {
        $this->contactPerson = $contactPerson;
    }

    /**
     * Returns Telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Sets Telephone
     *
     * @param string $telephone
     */
    public function setTelephone(string $telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * Returns Email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets Email
     *
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * Returns OrganizerType
     *
     * @return bool
     */
    public function isOrganizerType(): bool
    {
        return $this->organizerType;
    }

    /**
     * Sets OrganizerType
     *
     * @param bool $organizerType
     */
    public function setOrganizerType(bool $organizerType)
    {
        $this->organizerType = $organizerType;
    }

    /**
     * Returns OrganizerManuell
     *
     * @return string
     */
    public function getOrganizerManuell(): string
    {
        return $this->organizerManuell;
    }

    /**
     * Sets OrganizerManuell
     *
     * @param string $organizerManuell
     */
    public function setOrganizerManuell(string $organizerManuell)
    {
        $this->organizerManuell = $organizerManuell;
    }

    /**
     * Returns ApplicationDeadline
     *
     * @return \DateTime
     */
    public function getApplicationDeadline()
    {
        return $this->applicationDeadline;
    }

    /**
     * Sets ApplicationDeadline
     *
     * @param \DateTime $applicationDeadline
     */
    public function setApplicationDeadline(\DateTime $applicationDeadline)
    {
        $this->applicationDeadline = $applicationDeadline;
    }

    /**
     * Returns Promotion
     *
     * @return ObjectStorage
     */
    public function getPromotion(): ObjectStorage
    {
        return $this->promotion;
    }

    /**
     * Sets Promotion
     *
     * @param ObjectStorage $promotion
     */
    public function setPromotion(ObjectStorage $promotion)
    {
        $this->promotion = $promotion;
    }

    /**
     * Returns PromotionType
     *
     * @return array
     */
    public function getPromotionType(): array
    {
        return GeneralUtility::trimExplode(',', $this->promotionType, true);
    }

    /**
     * Sets PromotionType
     *
     * @param string $promotionType
     */
    public function setPromotionType(string $promotionType)
    {
        $this->promotionType = $promotionType;
    }

    /**
     * Returns PromotionValue
     *
     * @return string
     */
    public function getPromotionValue()
    {
        return $this->promotionValue;
    }

    /**
     * Sets PromotionValue
     *
     * @param string $promotionValue
     */
    public function setPromotionValue(string $promotionValue)
    {
        $this->promotionValue = $promotionValue;
    }

    /**
     * Returns Images
     *
     * @return ObjectStorage
     */
    public function getImages(): ObjectStorage
    {
        return $this->images;
    }

    /**
     * Sets Images
     *
     * @param ObjectStorage $images
     */
    public function setImages(ObjectStorage $images)
    {
        $this->images = $images;
    }

    /**
     * Returns Description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Sets Description
     *
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Returns TxMaps2Uid
     *
     * @return \JWeiland\Maps2\Domain\Model\PoiCollection|null
     */
    public function getTxMaps2Uid()
    {
        return $this->txMaps2Uid;
    }

    /**
     * Sets TxMaps2Uid
     *
     * @param \JWeiland\Maps2\Domain\Model\PoiCollection $txMaps2Uid
     */
    public function setTxMaps2Uid(\JWeiland\Maps2\Domain\Model\PoiCollection $txMaps2Uid)
    {
        $this->txMaps2Uid = $txMaps2Uid;
    }

    /**
     * Returns Files
     *
     * @return ObjectStorage
     */
    public function getFiles(): ObjectStorage
    {
        return $this->files;
    }

    /**
     * Sets Files
     *
     * @param ObjectStorage $files
     */
    public function setFiles(ObjectStorage $files)
    {
        $this->files = $files;
    }

    /**
     * Returns Links
     *
     * @return ObjectStorage
     */
    public function getLinks(): ObjectStorage
    {
        return $this->links;
    }

    /**
     * Sets Links
     *
     * @param ObjectStorage $links
     */
    public function setLinks(ObjectStorage $links)
    {
        $this->links = $links;
    }
}
