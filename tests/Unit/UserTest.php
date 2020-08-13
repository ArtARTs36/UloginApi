<?php

namespace ArtARTs36\ULoginApi\Tests\Unit;

use ArtARTs36\ULoginApi\Entities\User;
use ArtARTs36\ULoginApi\Support\Network;
use PHPUnit\Framework\TestCase;

/**
 * Class UserTest
 * @package ArtARTs36\ULoginApi\Tests\Unit
 */
final class UserTest extends TestCase
{
    /**
     * @covers \ArtARTs36\ULoginApi\Entities\User
     */
    public function test(): void
    {
        $network = Network::VK;

        $identity = 'vk.com/id123456789';
        $name = 'Artem';
        $lastName = 'Ukrainskiy';

        $user = new User($network, [
            'first_name' => $name,
            'last_name' => $lastName,
            'identity' => $identity,
        ]);

        self::assertEquals($identity, $user->identity());
        self::assertEquals($network, $user->network());
        self::assertTrue($user->isOfNetwork($network));
        self::assertFalse($user->isOfNetwork('random_network'));

        self::assertEquals($name, $user->firstName());
        self::assertEquals($lastName, $user->lastName());
        self::assertNull($user->uid());
        self::assertNull($user->city());
        self::assertNull($user->email());
        self::assertFalse($user->isOfCity('random_city'));
    }
}
