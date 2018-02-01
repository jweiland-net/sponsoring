<?php

namespace JWeiland\Sponsoring\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Stefan Frömken <projects@jweiland.net>, jweiland.net
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class \JWeiland\Sponsoring\Domain\Model\Project.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Stefan Frömken <projects@jweiland.net>
 * @todo update unit test !
 */
class ProjectTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \JWeiland\Sponsoring\Domain\Model\Project
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \JWeiland\Sponsoring\Domain\Model\Project();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getName()
		);
	}

	/**
	 * @test
	 */
	public function setNameForStringSetsName() {
		$this->subject->setName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'name',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getNumberReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getNumber()
		);
	}

	/**
	 * @test
	 */
	public function setNumberForStringSetsNumber() {
		$this->subject->setNumber('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'number',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getContactPersonReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getContactPerson()
		);
	}

	/**
	 * @test
	 */
	public function setContactPersonForStringSetsContactPerson() {
		$this->subject->setContactPerson('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'contactPerson',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTelephoneReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getTelephone()
		);
	}

	/**
	 * @test
	 */
	public function setTelephoneForStringSetsTelephone() {
		$this->subject->setTelephone('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'telephone',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEmailReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getEmail()
		);
	}

	/**
	 * @test
	 */
	public function setEmailForStringSetsEmail() {
		$this->subject->setEmail('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'email',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getOrganizerReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getOrganizer()
		);
	}

	/**
	 * @test
	 */
	public function setOrganizerForStringSetsOrganizer() {
		$this->subject->setOrganizer('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'organizer',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getApplicationDeadlineReturnsInitialValueForDateTime() {
		$this->assertEquals(
			NULL,
			$this->subject->getApplicationDeadline()
		);
	}

	/**
	 * @test
	 */
	public function setApplicationDeadlineForDateTimeSetsApplicationDeadline() {
		$dateTimeFixture = new \DateTime();
		$this->subject->setApplicationDeadline($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'applicationDeadline',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPromotionReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getPromotion()
		);
	}

	/**
	 * @test
	 */
	public function setPromotionForStringSetsPromotion() {
		$this->subject->setPromotion('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'promotion',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPromotionTypeReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getPromotionType()
		);
	}

	/**
	 * @test
	 */
	public function setPromotionTypeForStringSetsPromotionType() {
		$this->subject->setPromotionType('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'promotionType',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPromotionValueReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getPromotionValue()
		);
	}

	/**
	 * @test
	 */
	public function setPromotionValueForStringSetsPromotionValue() {
		$this->subject->setPromotionValue('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'promotionValue',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getImagesReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getImages()
		);
	}

	/**
	 * @test
	 */
	public function setImagesForFileReferenceSetsImages() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setImages($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'images',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription() {
		$this->subject->setDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'description',
			$this->subject
		);
	}
}
