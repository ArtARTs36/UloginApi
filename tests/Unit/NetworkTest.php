<?php

namespace ArtARTs36\ULoginApi\Tests\Unit;

use ArtARTs36\ULoginApi\Support\Network;
use PHPUnit\Framework\TestCase;

/**
 * Class NetworkTest
 * @package ArtARTs36\ULoginApi\Tests\Unit
 */
final class NetworkTest extends TestCase
{
    /**
     * @covers \ArtARTs36\ULoginApi\Support\Network::isValid
     */
    public function testIsValid(): void
    {
        foreach (Network::ALL as $name) {
            self::assertTrue(Network::isValid($name));
        }

        self::assertFalse(Network::isValid('random_name'));
    }
}
