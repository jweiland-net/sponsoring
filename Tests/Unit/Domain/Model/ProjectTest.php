<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/sponsoring.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Sponsoring\Tests\Unit\Domain\Model;

use JWeiland\Maps2\Domain\Model\PoiCollection;
use JWeiland\Sponsoring\Domain\Model\Link;
use JWeiland\Sponsoring\Domain\Model\Project;
use Nimut\TestingFramework\TestCase\UnitTestCase;
use TYPO3\CMS\Extbase\Domain\Model\Category;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Test case.
 */
class ProjectTest extends UnitTestCase
{
    /**
     * @var Project
     */
    protected $subject;

    protected function setUp(): void
    {
        $this->subject = new Project();
    }

    protected function tearDown(): void
    {
        unset($this->subject);
    }

    /**
     * @test
     */
    public function getNameInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameSetsName(): void
    {
        $this->subject->setName('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function getNumberInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getNumber()
        );
    }

    /**
     * @test
     */
    public function setNumberSetsNumber(): void
    {
        $this->subject->setNumber('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getNumber()
        );
    }

    /**
     * @test
     */
    public function getContactPersonInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getContactPerson()
        );
    }

    /**
     * @test
     */
    public function setContactPersonSetsContactPerson(): void
    {
        $this->subject->setContactPerson('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getContactPerson()
        );
    }

    /**
     * @test
     */
    public function getTelephoneInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTelephone()
        );
    }

    /**
     * @test
     */
    public function setTelephoneSetsTelephone(): void
    {
        $this->subject->setTelephone('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getTelephone()
        );
    }

    /**
     * @test
     */
    public function getEmailInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getEmail()
        );
    }

    /**
     * @test
     */
    public function setEmailSetsEmail(): void
    {
        $this->subject->setEmail('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getEmail()
        );
    }

    /**
     * @test
     */
    public function getOrganizerTypeInitiallyReturnsFalse(): void
    {
        self::assertFalse(
            $this->subject->isOrganizerType()
        );
    }

    /**
     * @test
     */
    public function setOrganizerTypeSetsOrganizerType(): void
    {
        $this->subject->setOrganizerType(true);
        self::assertTrue(
            $this->subject->isOrganizerType()
        );
    }

    /**
     * @test
     */
    public function getOrganizerManuellInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getOrganizerManuell()
        );
    }

    /**
     * @test
     */
    public function setOrganizerManuellSetsOrganizerManuell(): void
    {
        $this->subject->setOrganizerManuell('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getOrganizerManuell()
        );
    }

    /**
     * @test
     */
    public function getApplicationDeadlineInitiallyReturnsNull(): void
    {
        self::assertNull(
            $this->subject->getApplicationDeadline()
        );
    }

    /**
     * @test
     */
    public function setApplicationDeadlineSetsApplicationDeadline(): void
    {
        $date = new \DateTime();
        $this->subject->setApplicationDeadline($date);

        self::assertSame(
            $date,
            $this->subject->getApplicationDeadline()
        );
    }

    /**
     * @test
     */
    public function getPromotionInitiallyReturnsObjectStorage(): void
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getPromotion()
        );
    }

    /**
     * @test
     */
    public function setPromotionSetsPromotion(): void
    {
        $object = new Category();
        $objectStorage = new ObjectStorage();
        $objectStorage->attach($object);
        $this->subject->setPromotion($objectStorage);

        self::assertSame(
            $objectStorage,
            $this->subject->getPromotion()
        );
    }

    /**
     * @test
     */
    public function addPromotionAddsOnePromotion(): void
    {
        $objectStorage = new ObjectStorage();
        $this->subject->setPromotion($objectStorage);

        $object = new Category();
        $this->subject->addPromotion($object);

        $objectStorage->attach($object);

        self::assertSame(
            $objectStorage,
            $this->subject->getPromotion()
        );
    }

    /**
     * @test
     */
    public function removePromotionRemovesOnePromotion(): void
    {
        $object = new Category();
        $objectStorage = new ObjectStorage();
        $objectStorage->attach($object);
        $this->subject->setPromotion($objectStorage);

        $this->subject->removePromotion($object);
        $objectStorage->detach($object);

        self::assertSame(
            $objectStorage,
            $this->subject->getPromotion()
        );
    }

    /**
     * @test
     */
    public function getPromotionTypeInitiallyReturnsEmptyArray(): void
    {
        self::assertSame(
            [],
            $this->subject->getPromotionType()
        );
    }

    /**
     * @test
     */
    public function setPromotionTypeSetsPromotionType(): void
    {
        $this->subject->setPromotionType('foo, bar');

        self::assertSame(
            ['foo', 'bar'],
            $this->subject->getPromotionType()
        );
    }

    /**
     * @test
     */
    public function getPromotionValueInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getPromotionValue()
        );
    }

    /**
     * @test
     */
    public function setPromotionValueSetsPromotionValue(): void
    {
        $this->subject->setPromotionValue('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getPromotionValue()
        );
    }

    /**
     * @test
     */
    public function getImagesInitiallyReturnsObjectStorage(): void
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getImages()
        );
    }

    /**
     * @test
     */
    public function setImagesSetsImages(): void
    {
        $object = new FileReference();
        $objectStorage = new ObjectStorage();
        $objectStorage->attach($object);
        $this->subject->setImages($objectStorage);

        self::assertSame(
            $objectStorage,
            $this->subject->getImages()
        );
    }

    /**
     * @test
     */
    public function addImageAddsOneImage(): void
    {
        $objectStorage = new ObjectStorage();
        $this->subject->setImages($objectStorage);

        $object = new FileReference();
        $this->subject->addImage($object);

        $objectStorage->attach($object);

        self::assertSame(
            $objectStorage,
            $this->subject->getImages()
        );
    }

    /**
     * @test
     */
    public function removeImageRemovesOneImage(): void
    {
        $object = new FileReference();
        $objectStorage = new ObjectStorage();
        $objectStorage->attach($object);
        $this->subject->setImages($objectStorage);

        $this->subject->removeImage($object);
        $objectStorage->detach($object);

        self::assertSame(
            $objectStorage,
            $this->subject->getImages()
        );
    }

    /**
     * @test
     */
    public function getDescriptionInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionSetsDescription(): void
    {
        $this->subject->setDescription('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function getTxMaps2UidInitiallyReturnsNull(): void
    {
        self::assertNull($this->subject->getTxMaps2Uid());
    }

    /**
     * @test
     */
    public function setTxMaps2UidSetsTxMaps2Uid(): void
    {
        $instance = new PoiCollection();
        $this->subject->setTxMaps2Uid($instance);

        self::assertSame(
            $instance,
            $this->subject->getTxMaps2Uid()
        );
    }

    /**
     * @test
     */
    public function getFilesInitiallyReturnsObjectStorage(): void
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getFiles()
        );
    }

    /**
     * @test
     */
    public function setFilesSetsFiles(): void
    {
        $object = new FileReference();
        $objectStorage = new ObjectStorage();
        $objectStorage->attach($object);
        $this->subject->setFiles($objectStorage);

        self::assertSame(
            $objectStorage,
            $this->subject->getFiles()
        );
    }

    /**
     * @test
     */
    public function addFileAddsOneFile(): void
    {
        $objectStorage = new ObjectStorage();
        $this->subject->setFiles($objectStorage);

        $object = new FileReference();
        $this->subject->addFile($object);

        $objectStorage->attach($object);

        self::assertSame(
            $objectStorage,
            $this->subject->getFiles()
        );
    }

    /**
     * @test
     */
    public function removeFileRemovesOneFile(): void
    {
        $object = new FileReference();
        $objectStorage = new ObjectStorage();
        $objectStorage->attach($object);
        $this->subject->setFiles($objectStorage);

        $this->subject->removeFile($object);
        $objectStorage->detach($object);

        self::assertSame(
            $objectStorage,
            $this->subject->getFiles()
        );
    }

    /**
     * @test
     */
    public function getLinksInitiallyReturnsObjectStorage(): void
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getLinks()
        );
    }

    /**
     * @test
     */
    public function setLinksSetsLinks(): void
    {
        $object = new Link();
        $objectStorage = new ObjectStorage();
        $objectStorage->attach($object);
        $this->subject->setLinks($objectStorage);

        self::assertSame(
            $objectStorage,
            $this->subject->getLinks()
        );
    }

    /**
     * @test
     */
    public function addLinkAddsOneLink(): void
    {
        $objectStorage = new ObjectStorage();
        $this->subject->setLinks($objectStorage);

        $object = new Link();
        $this->subject->addLink($object);

        $objectStorage->attach($object);

        self::assertSame(
            $objectStorage,
            $this->subject->getLinks()
        );
    }

    /**
     * @test
     */
    public function removeLinkRemovesOneLink(): void
    {
        $object = new Link();
        $objectStorage = new ObjectStorage();
        $objectStorage->attach($object);
        $this->subject->setLinks($objectStorage);

        $this->subject->removeLink($object);
        $objectStorage->detach($object);

        self::assertSame(
            $objectStorage,
            $this->subject->getLinks()
        );
    }
}
