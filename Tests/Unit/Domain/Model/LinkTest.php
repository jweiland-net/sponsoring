<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/sponsoring.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Sponsoring\Tests\Unit\Domain\Model;

use JWeiland\Sponsoring\Domain\Model\Link;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case.
 */
class LinkTest extends UnitTestCase
{
    /**
     * @var Link
     */
    protected $subject;

    protected function setUp(): void
    {
        $this->subject = new Link();
    }

    protected function tearDown(): void
    {
        unset($this->subject);
    }

    /**
     * @test
     */
    public function getLinkInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getLink(),
        );
    }

    /**
     * @test
     */
    public function setLinkSetsLink(): void
    {
        $this->subject->setLink('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getLink(),
        );
    }

    /**
     * @test
     */
    public function getTitleInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            'Video',
            $this->subject->getTitle(),
        );
    }

    /**
     * @test
     */
    public function setTitleSetsTitle(): void
    {
        $this->subject->setTitle('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getTitle(),
        );
    }
}
