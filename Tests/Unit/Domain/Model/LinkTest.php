<?php

namespace JWeiland\Sponsoring\Tests\Unit\Domain\Model;

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

use JWeiland\Sponsoring\Domain\Model\Link;
use Nimut\TestingFramework\TestCase\UnitTestCase;

/**
 * Test case.
 */
class LinkTest extends UnitTestCase
{
    /**
     * @var Link
     */
    protected $subject;

    protected function setUp() {
        $this->subject = new Link();
    }

    protected function tearDown() {
        unset($this->subject);
    }

    /**
     * @test
     */
    public function getLinkInitiallyReturnsEmptyString()
    {
        $this->assertSame(
            '',
            $this->subject->getLink()
        );
    }

    /**
     * @test
     */
    public function setLinkSetsLink()
    {
        $this->subject->setLink('foo bar');

        $this->assertSame(
            'foo bar',
            $this->subject->getLink()
        );
    }

    /**
     * @test
     */
    public function setLinkWithIntegerResultsInString()
    {
        $this->subject->setLink(123);
        $this->assertSame('123', $this->subject->getLink());
    }

    /**
     * @test
     */
    public function setLinkWithBooleanResultsInString()
    {
        $this->subject->setLink(true);
        $this->assertSame('1', $this->subject->getLink());
    }

    /**
     * @test
     */
    public function getTitleInitiallyReturnsEmptyString()
    {
        $this->assertSame(
            'Video',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleSetsTitle()
    {
        $this->subject->setTitle('foo bar');

        $this->assertSame(
            'foo bar',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleWithIntegerResultsInString()
    {
        $this->subject->setTitle(123);
        $this->assertSame('123', $this->subject->getTitle());
    }

    /**
     * @test
     */
    public function setTitleWithBooleanResultsInString()
    {
        $this->subject->setTitle(true);
        $this->assertSame('1', $this->subject->getTitle());
    }
}
