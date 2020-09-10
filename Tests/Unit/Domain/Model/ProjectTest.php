<?php

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

    protected function setUp()
    {
        $this->subject = new Project();
    }

    protected function tearDown()
    {
        unset($this->subject);
    }

    /**
     * @test
     */
    public function getNameInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameSetsName()
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
    public function setNameWithIntegerResultsInString()
    {
        $this->subject->setName(123);
        self::assertSame('123', $this->subject->getName());
    }

    /**
     * @test
     */
    public function setNameWithBooleanResultsInString()
    {
        $this->subject->setName(true);
        self::assertSame('1', $this->subject->getName());
    }

    /**
     * @test
     */
    public function getNumberInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getNumber()
        );
    }

    /**
     * @test
     */
    public function setNumberSetsNumber()
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
    public function setNumberWithIntegerResultsInString()
    {
        $this->subject->setNumber(123);
        self::assertSame('123', $this->subject->getNumber());
    }

    /**
     * @test
     */
    public function setNumberWithBooleanResultsInString()
    {
        $this->subject->setNumber(true);
        self::assertSame('1', $this->subject->getNumber());
    }

    /**
     * @test
     */
    public function getContactPersonInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getContactPerson()
        );
    }

    /**
     * @test
     */
    public function setContactPersonSetsContactPerson()
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
    public function setContactPersonWithIntegerResultsInString()
    {
        $this->subject->setContactPerson(123);
        self::assertSame('123', $this->subject->getContactPerson());
    }

    /**
     * @test
     */
    public function setContactPersonWithBooleanResultsInString()
    {
        $this->subject->setContactPerson(true);
        self::assertSame('1', $this->subject->getContactPerson());
    }

    /**
     * @test
     */
    public function getTelephoneInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getTelephone()
        );
    }

    /**
     * @test
     */
    public function setTelephoneSetsTelephone()
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
    public function setTelephoneWithIntegerResultsInString()
    {
        $this->subject->setTelephone(123);
        self::assertSame('123', $this->subject->getTelephone());
    }

    /**
     * @test
     */
    public function setTelephoneWithBooleanResultsInString()
    {
        $this->subject->setTelephone(true);
        self::assertSame('1', $this->subject->getTelephone());
    }

    /**
     * @test
     */
    public function getEmailInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getEmail()
        );
    }

    /**
     * @test
     */
    public function setEmailSetsEmail()
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
    public function setEmailWithIntegerResultsInString()
    {
        $this->subject->setEmail(123);
        self::assertSame('123', $this->subject->getEmail());
    }

    /**
     * @test
     */
    public function setEmailWithBooleanResultsInString()
    {
        $this->subject->setEmail(true);
        self::assertSame('1', $this->subject->getEmail());
    }

    /**
     * @test
     */
    public function getOrganizerTypeInitiallyReturnsFalse()
    {
        self::assertFalse(
            $this->subject->isOrganizerType()
        );
    }

    /**
     * @test
     */
    public function setOrganizerTypeSetsOrganizerType()
    {
        $this->subject->setOrganizerType(true);
        self::assertTrue(
            $this->subject->isOrganizerType()
        );
    }

    /**
     * @test
     */
    public function setOrganizerTypeWithStringReturnsTrue()
    {
        $this->subject->setOrganizerType('foo bar');
        self::assertTrue($this->subject->isOrganizerType());
    }

    /**
     * @test
     */
    public function setOrganizerTypeWithZeroReturnsFalse()
    {
        $this->subject->setOrganizerType(0);
        self::assertFalse($this->subject->isOrganizerType());
    }

    /**
     * @test
     */
    public function getOrganizerManuellInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getOrganizerManuell()
        );
    }

    /**
     * @test
     */
    public function setOrganizerManuellSetsOrganizerManuell()
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
    public function setOrganizerManuellWithIntegerResultsInString()
    {
        $this->subject->setOrganizerManuell(123);
        self::assertSame('123', $this->subject->getOrganizerManuell());
    }

    /**
     * @test
     */
    public function setOrganizerManuellWithBooleanResultsInString()
    {
        $this->subject->setOrganizerManuell(true);
        self::assertSame('1', $this->subject->getOrganizerManuell());
    }

    /**
     * @test
     */
    public function getApplicationDeadlineInitiallyReturnsNull()
    {
        self::assertNull(
            $this->subject->getApplicationDeadline()
        );
    }

    /**
     * @test
     */
    public function setApplicationDeadlineSetsApplicationDeadline()
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
    public function getPromotionInitiallyReturnsObjectStorage()
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getPromotion()
        );
    }

    /**
     * @test
     */
    public function setPromotionSetsPromotion()
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
    public function addPromotionAddsOnePromotion()
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
    public function removePromotionRemovesOnePromotion()
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
    public function getPromotionTypeInitiallyReturnsEmptyArray()
    {
        self::assertSame(
            [],
            $this->subject->getPromotionType()
        );
    }

    /**
     * @test
     */
    public function setPromotionTypeSetsPromotionType()
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
    public function setPromotionTypeWithIntegerResultsInString()
    {
        $this->subject->setPromotionType(123);
        self::assertSame(
            ['123'],
            $this->subject->getPromotionType()
        );
    }

    /**
     * @test
     */
    public function setPromotionTypeWithBooleanResultsInString()
    {
        $this->subject->setPromotionType(true);
        self::assertSame(
            ['1'],
            $this->subject->getPromotionType()
        );
    }

    /**
     * @test
     */
    public function getPromotionValueInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getPromotionValue()
        );
    }

    /**
     * @test
     */
    public function setPromotionValueSetsPromotionValue()
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
    public function setPromotionValueWithIntegerResultsInString()
    {
        $this->subject->setPromotionValue(123);
        self::assertSame('123', $this->subject->getPromotionValue());
    }

    /**
     * @test
     */
    public function setPromotionValueWithBooleanResultsInString()
    {
        $this->subject->setPromotionValue(true);
        self::assertSame('1', $this->subject->getPromotionValue());
    }

    /**
     * @test
     */
    public function getImagesInitiallyReturnsObjectStorage()
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getImages()
        );
    }

    /**
     * @test
     */
    public function setImagesSetsImages()
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
    public function addImageAddsOneImage()
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
    public function removeImageRemovesOneImage()
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
    public function getDescriptionInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionSetsDescription()
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
    public function setDescriptionWithIntegerResultsInString()
    {
        $this->subject->setDescription(123);
        self::assertSame('123', $this->subject->getDescription());
    }

    /**
     * @test
     */
    public function setDescriptionWithBooleanResultsInString()
    {
        $this->subject->setDescription(true);
        self::assertSame('1', $this->subject->getDescription());
    }

    /**
     * @test
     */
    public function getTxMaps2UidInitiallyReturnsNull()
    {
        self::assertNull($this->subject->getTxMaps2Uid());
    }

    /**
     * @test
     */
    public function setTxMaps2UidSetsTxMaps2Uid()
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
    public function getFilesInitiallyReturnsObjectStorage()
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getFiles()
        );
    }

    /**
     * @test
     */
    public function setFilesSetsFiles()
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
    public function addFileAddsOneFile()
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
    public function removeFileRemovesOneFile()
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
    public function getLinksInitiallyReturnsObjectStorage()
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getLinks()
        );
    }

    /**
     * @test
     */
    public function setLinksSetsLinks()
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
    public function addLinkAddsOneLink()
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
    public function removeLinkRemovesOneLink()
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
