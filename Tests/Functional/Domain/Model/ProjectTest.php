<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/sponsoring.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Sponsoring\Tests\Functional\Domain\Model;

use JWeiland\Maps2\Domain\Model\PoiCollection;
use JWeiland\Sponsoring\Domain\Model\Link;
use JWeiland\Sponsoring\Domain\Model\Project;
use PHPUnit\Framework\Attributes\Test;
use TYPO3\CMS\Extbase\Domain\Model\Category;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

/**
 * Test case.
 */
class ProjectTest extends FunctionalTestCase
{
    protected Project $subject;

    protected array $testExtensionsToLoad = [
        'jweiland/maps2',
        'jweiland/sponsoring',
        'jweiland/service-bw2',
    ];

    protected array protected array $coreExtensionsToLoad = [
        'typo3/cms-scheduler',
    ];

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Project();
    }

    protected function tearDown(): void
    {
        unset(
            $this->subject,
        );

        parent::tearDown();
    }

    #[Test]
    public function getNameInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getName(),
        );
    }

    #[Test]
    public function setNameSetsName(): void
    {
        $this->subject->setName('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getName(),
        );
    }

    #[Test]
    public function getNumberInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getNumber(),
        );
    }

    #[Test]
    public function setNumberSetsNumber(): void
    {
        $this->subject->setNumber('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getNumber(),
        );
    }

    #[Test]
    public function getContactPersonInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getContactPerson(),
        );
    }

    #[Test]
    public function setContactPersonSetsContactPerson(): void
    {
        $this->subject->setContactPerson('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getContactPerson(),
        );
    }

    #[Test]
    public function getTelephoneInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTelephone(),
        );
    }

    #[Test]
    public function setTelephoneSetsTelephone(): void
    {
        $this->subject->setTelephone('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getTelephone(),
        );
    }

    #[Test]
    public function getEmailInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getEmail(),
        );
    }

    #[Test]
    public function setEmailSetsEmail(): void
    {
        $this->subject->setEmail('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getEmail(),
        );
    }

    #[Test]
    public function getOrganizerTypeInitiallyReturnsFalse(): void
    {
        self::assertFalse(
            $this->subject->isOrganizerType(),
        );
    }

    #[Test]
    public function setOrganizerTypeSetsOrganizerType(): void
    {
        $this->subject->setOrganizerType(true);
        self::assertTrue(
            $this->subject->isOrganizerType(),
        );
    }

    #[Test]
    public function getOrganizerManuellInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getOrganizerManuell(),
        );
    }

    #[Test]
    public function setOrganizerManuellSetsOrganizerManuell(): void
    {
        $this->subject->setOrganizerManuell('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getOrganizerManuell(),
        );
    }

    #[Test]
    public function getApplicationDeadlineInitiallyReturnsNull(): void
    {
        self::assertNull(
            $this->subject->getApplicationDeadline(),
        );
    }

    #[Test]
    public function setApplicationDeadlineSetsApplicationDeadline(): void
    {
        $date = new \DateTime();
        $this->subject->setApplicationDeadline($date);

        self::assertSame(
            $date,
            $this->subject->getApplicationDeadline(),
        );
    }

    #[Test]
    public function getPromotionInitiallyReturnsObjectStorage(): void
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getPromotion(),
        );
    }

    #[Test]
    public function setPromotionSetsPromotion(): void
    {
        $object = new Category();
        $objectStorage = new ObjectStorage();
        $objectStorage->attach($object);
        $this->subject->setPromotion($objectStorage);

        self::assertSame(
            $objectStorage,
            $this->subject->getPromotion(),
        );
    }

    #[Test]
    public function addPromotionAddsOnePromotion(): void
    {
        $objectStorage = new ObjectStorage();
        $this->subject->setPromotion($objectStorage);

        $object = new Category();
        $this->subject->addPromotion($object);

        $objectStorage->attach($object);

        self::assertSame(
            $objectStorage,
            $this->subject->getPromotion(),
        );
    }

    #[Test]
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
            $this->subject->getPromotion(),
        );
    }

    #[Test]
    public function getPromotionTypeInitiallyReturnsEmptyArray(): void
    {
        self::assertSame(
            [],
            $this->subject->getPromotionType(),
        );
    }

    #[Test]
    public function setPromotionTypeSetsPromotionType(): void
    {
        $this->subject->setPromotionType('foo, bar');

        self::assertSame(
            ['foo', 'bar'],
            $this->subject->getPromotionType(),
        );
    }

    #[Test]
    public function getPromotionValueInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getPromotionValue(),
        );
    }

    #[Test]
    public function setPromotionValueSetsPromotionValue(): void
    {
        $this->subject->setPromotionValue('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getPromotionValue(),
        );
    }

    #[Test]
    public function getImagesInitiallyReturnsObjectStorage(): void
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getImages(),
        );
    }

    #[Test]
    public function setImagesSetsImages(): void
    {
        $object = new FileReference();
        $objectStorage = new ObjectStorage();
        $objectStorage->attach($object);
        $this->subject->setImages($objectStorage);

        self::assertSame(
            $objectStorage,
            $this->subject->getImages(),
        );
    }

    #[Test]
    public function addImageAddsOneImage(): void
    {
        $objectStorage = new ObjectStorage();
        $this->subject->setImages($objectStorage);

        $object = new FileReference();
        $this->subject->addImage($object);

        $objectStorage->attach($object);

        self::assertSame(
            $objectStorage,
            $this->subject->getImages(),
        );
    }

    #[Test]
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
            $this->subject->getImages(),
        );
    }

    #[Test]
    public function getDescriptionInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getDescription(),
        );
    }

    #[Test]
    public function setDescriptionSetsDescription(): void
    {
        $this->subject->setDescription('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getDescription(),
        );
    }

    #[Test]
    public function getTxMaps2UidInitiallyReturnsNull(): void
    {
        self::assertNull($this->subject->getTxMaps2Uid());
    }

    #[Test]
    public function setTxMaps2UidSetsTxMaps2Uid(): void
    {
        $instance = new PoiCollection();
        $this->subject->setTxMaps2Uid($instance);

        self::assertSame(
            $instance,
            $this->subject->getTxMaps2Uid(),
        );
    }

    #[Test]
    public function getFilesInitiallyReturnsObjectStorage(): void
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getFiles(),
        );
    }

    #[Test]
    public function setFilesSetsFiles(): void
    {
        $object = new FileReference();
        $objectStorage = new ObjectStorage();
        $objectStorage->attach($object);
        $this->subject->setFiles($objectStorage);

        self::assertSame(
            $objectStorage,
            $this->subject->getFiles(),
        );
    }

    #[Test]
    public function addFileAddsOneFile(): void
    {
        $objectStorage = new ObjectStorage();
        $this->subject->setFiles($objectStorage);

        $object = new FileReference();
        $this->subject->addFile($object);

        $objectStorage->attach($object);

        self::assertSame(
            $objectStorage,
            $this->subject->getFiles(),
        );
    }

    #[Test]
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
            $this->subject->getFiles(),
        );
    }

    #[Test]
    public function getLinksInitiallyReturnsObjectStorage(): void
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getLinks(),
        );
    }

    #[Test]
    public function setLinksSetsLinks(): void
    {
        $object = new Link();
        $objectStorage = new ObjectStorage();
        $objectStorage->attach($object);
        $this->subject->setLinks($objectStorage);

        self::assertSame(
            $objectStorage,
            $this->subject->getLinks(),
        );
    }

    #[Test]
    public function addLinkAddsOneLink(): void
    {
        $objectStorage = new ObjectStorage();
        $this->subject->setLinks($objectStorage);

        $object = new Link();
        $this->subject->addLink($object);

        $objectStorage->attach($object);

        self::assertSame(
            $objectStorage,
            $this->subject->getLinks(),
        );
    }

    #[Test]
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
            $this->subject->getLinks(),
        );
    }
}
