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
use PHPUnit\Framework\Attributes\Test;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case.
 */
class LinkTest extends UnitTestCase
{
    protected Link $subject;

    protected function setUp(): void
    {
        $this->subject = new Link();
    }

    protected function tearDown(): void
    {
        unset($this->subject);
    }

    #[Test]
    public function getLinkInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getLink(),
        );
    }

    #[Test]
    public function setLinkSetsLink(): void
    {
        $this->subject->setLink('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getLink(),
        );
    }

    #[Test]
    public function getTitleInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            'Video',
            $this->subject->getTitle(),
        );
    }

    #[Test]
    public function setTitleSetsTitle(): void
    {
        $this->subject->setTitle('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getTitle(),
        );
    }
}
