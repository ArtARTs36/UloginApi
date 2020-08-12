<?php

namespace ArtARTs36\ULoginApi\Tests\Unit;

use ArtARTs36\ULoginApi\Support\HttpCode;
use PHPUnit\Framework\TestCase;

/**
 * Class HttpCodeTest
 * @package ArtARTs36\ULoginApi\Tests\Unit
 */
final class HttpCodeTest extends TestCase
{
    /**
     * @covers \ArtARTs36\ULoginApi\Support\HttpCode::isAllowed
     */
    public function testIsAllowed(): void
    {
        self::assertTrue(HttpCode::isAllowed(200));
        self::assertTrue(HttpCode::isAllowed(201));

        self::assertFalse(HttpCode::isAllowed(400));
    }

    /**
     * @covers \ArtARTs36\ULoginApi\Support\HttpCode::isDisallowed
     */
    public function testIsDisallowed(): void
    {
        self::assertTrue(HttpCode::isDisallowed(404));
        self::assertTrue(HttpCode::isDisallowed(403));
        self::assertTrue(HttpCode::isDisallowed(401));
        self::assertTrue(HttpCode::isDisallowed(400));
    }
}
