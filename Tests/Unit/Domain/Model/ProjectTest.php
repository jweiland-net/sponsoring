<?php

/*
 * This file is part of the package jweiland/sponsoring.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Sponsoring\Tests\Unit\Domain\Model;

use JWeiland\Maps2\Domain\Model\PoiCollection;
use JWeiland\Sponsoring\Domain\Model\Category;
use JWeiland\Sponsoring\Domain\Model\Link;
use JWeiland\Sponsoring\Domain\Model\Project;
use Nimut\TestingFramework\TestCase\UnitTestCase;
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
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getName());
    }

    /**
     * @test
     */
    public function setNameWithBooleanResultsInString()
    {
        $this->subject->setName(true);
        $this->assertSame('1', $this->subject->getName());
    }

    /**
     * @test
     */
    public function getNumberInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getNumber());
    }

    /**
     * @test
     */
    public function setNumberWithBooleanResultsInString()
    {
        $this->subject->setNumber(true);
        $this->assertSame('1', $this->subject->getNumber());
    }

    /**
     * @test
     */
    public function getContactPersonInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getContactPerson());
    }

    /**
     * @test
     */
    public function setContactPersonWithBooleanResultsInString()
    {
        $this->subject->setContactPerson(true);
        $this->assertSame('1', $this->subject->getContactPerson());
    }

    /**
     * @test
     */
    public function getTelephoneInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getTelephone());
    }

    /**
     * @test
     */
    public function setTelephoneWithBooleanResultsInString()
    {
        $this->subject->setTelephone(true);
        $this->assertSame('1', $this->subject->getTelephone());
    }

    /**
     * @test
     */
    public function getEmailInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getEmail());
    }

    /**
     * @test
     */
    public function setEmailWithBooleanResultsInString()
    {
        $this->subject->setEmail(true);
        $this->assertSame('1', $this->subject->getEmail());
    }

    /**
     * @test
     */
    public function getOrganizerTypeInitiallyReturnsFalse()
    {
        $this->assertFalse(
            $this->subject->isOrganizerType()
        );
    }

    /**
     * @test
     */
    public function setOrganizerTypeSetsOrganizerType()
    {
        $this->subject->setOrganizerType(true);
        $this->assertTrue(
            $this->subject->isOrganizerType()
        );
    }

    /**
     * @test
     */
    public function setOrganizerTypeWithStringReturnsTrue()
    {
        $this->subject->setOrganizerType('foo bar');
        $this->assertTrue($this->subject->isOrganizerType());
    }

    /**
     * @test
     */
    public function setOrganizerTypeWithZeroReturnsFalse()
    {
        $this->subject->setOrganizerType(0);
        $this->assertFalse($this->subject->isOrganizerType());
    }

    /**
     * @test
     */
    public function getOrganizerManuellInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getOrganizerManuell());
    }

    /**
     * @test
     */
    public function setOrganizerManuellWithBooleanResultsInString()
    {
        $this->subject->setOrganizerManuell(true);
        $this->assertSame('1', $this->subject->getOrganizerManuell());
    }

    /**
     * @test
     */
    public function getApplicationDeadlineInitiallyReturnsNull()
    {
        $this->assertNull(
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

        $this->assertSame(
            $date,
            $this->subject->getApplicationDeadline()
        );
    }

    /**
     * @test
     */
    public function getPromotionInitiallyReturnsObjectStorage()
    {
        $this->assertEquals(
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

        $this->assertSame(
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

        $this->assertSame(
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

        $this->assertSame(
            $objectStorage,
            $this->subject->getPromotion()
        );
    }

    /**
     * @test
     */
    public function getPromotionTypeInitiallyReturnsEmptyArray()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame(
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
        $this->assertSame(
            ['1'],
            $this->subject->getPromotionType()
        );
    }

    /**
     * @test
     */
    public function getPromotionValueInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getPromotionValue());
    }

    /**
     * @test
     */
    public function setPromotionValueWithBooleanResultsInString()
    {
        $this->subject->setPromotionValue(true);
        $this->assertSame('1', $this->subject->getPromotionValue());
    }

    /**
     * @test
     */
    public function getImagesInitiallyReturnsObjectStorage()
    {
        $this->assertEquals(
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

        $this->assertSame(
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

        $this->assertSame(
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

        $this->assertSame(
            $objectStorage,
            $this->subject->getImages()
        );
    }

    /**
     * @test
     */
    public function getDescriptionInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getDescription());
    }

    /**
     * @test
     */
    public function setDescriptionWithBooleanResultsInString()
    {
        $this->subject->setDescription(true);
        $this->assertSame('1', $this->subject->getDescription());
    }

    /**
     * @test
     */
    public function getTxMaps2UidInitiallyReturnsNull()
    {
        $this->assertNull($this->subject->getTxMaps2Uid());
    }

    /**
     * @test
     */
    public function setTxMaps2UidSetsTxMaps2Uid()
    {
        $instance = new PoiCollection();
        $this->subject->setTxMaps2Uid($instance);

        $this->assertSame(
            $instance,
            $this->subject->getTxMaps2Uid()
        );
    }

    /**
     * @test
     */
    public function getFilesInitiallyReturnsObjectStorage()
    {
        $this->assertEquals(
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

        $this->assertSame(
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

        $this->assertSame(
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

        $this->assertSame(
            $objectStorage,
            $this->subject->getFiles()
        );
    }

    /**
     * @test
     */
    public function getLinksInitiallyReturnsObjectStorage()
    {
        $this->assertEquals(
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

        $this->assertSame(
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

        $this->assertSame(
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

        $this->assertSame(
            $objectStorage,
            $this->subject->getLinks()
        );
    }
}
