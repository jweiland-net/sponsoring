<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/sponsoring.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Sponsoring\Domain\Model;

use JWeiland\Maps2\Domain\Model\PoiCollection;
use JWeiland\ServiceBw2\Utility\ModelUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\MathUtility;
use TYPO3\CMS\Extbase\Domain\Model\Category;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
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
     * @var ObjectStorage<Category>
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
     * @var ObjectStorage<FileReference>
     */
    protected $images;

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var PoiCollection
     */
    protected $txMaps2Uid;

    /**
     * @var ObjectStorage<FileReference>
     */
    protected $files;

    /**
     * @var ObjectStorage<Link>
     */
    protected $links;

    public function __construct()
    {
        $this->promotion = new ObjectStorage();
        $this->images = new ObjectStorage();
        $this->files = new ObjectStorage();
        $this->links = new ObjectStorage();
    }

    /**
     * Called again with initialize object, as fetching an entity from the DB does not use the constructor
     */
    public function initializeObject(): void
    {
        $this->promotion = $this->promotion ?? new ObjectStorage();
        $this->images = $this->images ?? new ObjectStorage();
        $this->files = $this->files ?? new ObjectStorage();
        $this->links = $this->links ?? new ObjectStorage();
    }

    public function getOrganisationseinheit(): array
    {
        if (MathUtility::canBeInterpretedAsInteger($this->organisationseinheit)) {
            // Do not remove the int cast as $this->organisationseinheit will be filled by _setProperty()
            // Please remove that with introduction of typed properties
            $this->organisationseinheit = ModelUtility::getOrganisationseinheit((int)$this->organisationseinheit);
        }

        return $this->organisationseinheit;
    }

    public function setOrganisationseinheit(array $organisationseinheit): void
    {
        $this->organisationseinheit = $organisationseinheit;
    }

    /**
     * Get Organizer
     * It can handle both kinds of organizer
     * Useful for Fluid Templates
     */
    public function getOrganizer(): string
    {
        if ($this->organizerType) {
            // Get manually given organizer
            return $this->getOrganizerManuell();
        }

        return $this->getOrganisationseinheit()['name'] ?? '';
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    public function getContactPerson(): string
    {
        return $this->contactPerson;
    }

    public function setContactPerson(string $contactPerson): void
    {
        $this->contactPerson = $contactPerson;
    }

    public function getTelephone(): string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function isOrganizerType(): bool
    {
        return $this->organizerType;
    }

    public function setOrganizerType(bool $organizerType): void
    {
        $this->organizerType = $organizerType;
    }

    public function getOrganizerManuell(): string
    {
        return $this->organizerManuell;
    }

    public function setOrganizerManuell(string $organizerManuell): void
    {
        $this->organizerManuell = $organizerManuell;
    }

    public function getApplicationDeadline(): ?\DateTime
    {
        return $this->applicationDeadline;
    }

    public function setApplicationDeadline(?\DateTime $applicationDeadline = null): void
    {
        $this->applicationDeadline = $applicationDeadline;
    }

    public function getPromotion(): ObjectStorage
    {
        return $this->promotion;
    }

    public function setPromotion(ObjectStorage $promotion): void
    {
        $this->promotion = $promotion;
    }

    public function addPromotion(Category $promotion): void
    {
        $this->promotion->attach($promotion);
    }

    public function removePromotion(Category $promotion): void
    {
        $this->promotion->detach($promotion);
    }

    public function getPromotionType(): array
    {
        return GeneralUtility::trimExplode(',', $this->promotionType, true);
    }

    public function setPromotionType(string $promotionType): void
    {
        $this->promotionType = $promotionType;
    }

    public function getPromotionValue(): string
    {
        return $this->promotionValue;
    }

    public function setPromotionValue(string $promotionValue): void
    {
        $this->promotionValue = $promotionValue;
    }

    public function getImages(): ObjectStorage
    {
        return $this->images;
    }

    public function setImages(ObjectStorage $images): void
    {
        $this->images = $images;
    }

    public function addImage(FileReference $image): void
    {
        $this->images->attach($image);
    }

    public function removeImage(FileReference $image): void
    {
        $this->images->detach($image);
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getTxMaps2Uid(): ?PoiCollection
    {
        return $this->txMaps2Uid;
    }

    public function setTxMaps2Uid(?PoiCollection $txMaps2Uid = null): void
    {
        $this->txMaps2Uid = $txMaps2Uid;
    }

    public function getFiles(): ObjectStorage
    {
        return $this->files;
    }

    public function setFiles(ObjectStorage $files): void
    {
        $this->files = $files;
    }

    public function addFile(FileReference $file): void
    {
        $this->files->attach($file);
    }

    public function removeFile(FileReference $file): void
    {
        $this->files->detach($file);
    }

    public function getLinks(): ObjectStorage
    {
        return $this->links;
    }

    public function setLinks(ObjectStorage $links): void
    {
        $this->links = $links;
    }

    public function addLink(Link $link): void
    {
        $this->links->attach($link);
    }

    public function removeLink(Link $link): void
    {
        $this->links->detach($link);
    }
}
