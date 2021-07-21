<?php

namespace ArtARTs36\ULoginApi\Tests\Unit;

use ArtARTs36\ULoginApi\Client;
use ArtARTs36\ULoginApi\Requests\TokenRequest;
use ArtARTs36\ULoginApi\Tests\Traits\CallMethodViaReflection;
use PHPUnit\Framework\TestCase;

/**
 * Class ClientTest
 * @package ArtARTs36\ULoginApi\Tests\Unit
 */
final class ClientTest extends TestCase
{
    use CallMethodViaReflection;

    /**
     * @throws \ReflectionException
     */
    public function testUrl(): void
    {
        $suffix = 'random_string';

        self::assertEquals(
            'http://ulogin.ru/'. $suffix,
            $this->callMethodViaReflection($this->make(), 'url', $suffix)
        );
    }

    /**
     * @throws \ReflectionException
     */
    public function testCreateCurl(): void
    {
        $request = new TokenRequest('123456789');

        $curl = $this->callMethodViaReflection($this->make(), 'createCurl', $request);

        self::assertNotFalse($curl);
    }

    /**
     * @return Client
     */
    private function make(): Client
    {
        return new Client('site.ru');
    }
}
