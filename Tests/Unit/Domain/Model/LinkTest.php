<?php

/*
 * This file is part of the package jweiland/sponsoring.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Sponsoring\Tests\Unit\Domain\Model;

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

    protected function setUp()
    {
        $this->subject = new Link();
    }

    protected function tearDown()
    {
        unset($this->subject);
    }

    /**
     * @test
     */
    public function getLinkInitiallyReturnsEmptyString()
    {
        self::assertSame(
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

        self::assertSame(
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
        self::assertSame('123', $this->subject->getLink());
    }

    /**
     * @test
     */
    public function setLinkWithBooleanResultsInString()
    {
        $this->subject->setLink(true);
        self::assertSame('1', $this->subject->getLink());
    }

    /**
     * @test
     */
    public function getTitleInitiallyReturnsEmptyString()
    {
        self::assertSame(
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

        self::assertSame(
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
        self::assertSame('123', $this->subject->getTitle());
    }

    /**
     * @test
     */
    public function setTitleWithBooleanResultsInString()
    {
        $this->subject->setTitle(true);
        self::assertSame('1', $this->subject->getTitle());
    }
}
