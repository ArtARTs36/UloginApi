<?php

namespace ArtARTs36\ULoginApi\Tests\Unit;

use ArtARTs36\ULoginApi\Support\Md5;
use PHPUnit\Framework\TestCase;

/**
 * Class Md5Test
 * @package ArtARTs36\ULoginApi\Tests\Unit
 */
final class Md5Test extends TestCase
{
    /**
     * @covers \ArtARTs36\ULoginApi\Support\Md5::isValid
     */
    public function testIsValid(): void
    {
        self::assertTrue(Md5::isValid(\md5('random_string')));
        self::assertFalse(Md5::isValid('random_string'));
    }
    /**
     * @covers \ArtARTs36\ULoginApi\Support\Md5::isNotValid
     */
    public function testIsNotValid(): void
    {
        self::assertTrue(Md5::isNotValid('random_string'));
        self::assertFalse(Md5::isNotValid(\md5('random_string')));
    }
}
