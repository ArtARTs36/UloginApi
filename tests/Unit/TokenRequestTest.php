<?php

namespace ArtARTs36\ULoginApi\Tests\Unit;

use ArtARTs36\ULoginApi\Contracts\Request;
use ArtARTs36\ULoginApi\Requests\TokenRequest;
use PHPUnit\Framework\TestCase;

/**
 * Class TokenRequestTest
 * @package ArtARTs36\ULoginApi\Tests
 */
final class TokenRequestTest extends TestCase
{
    /**
     * @covers \ArtARTs36\ULoginApi\Requests\TokenRequest::url
     * @covers \ArtARTs36\ULoginApi\Requests\TokenRequest::method
     */
    public function test(): void
    {
        $token = 'blabla';

        $request = new TokenRequest($token);

        //

        self::assertEquals(Request::METHOD_GET, $request->method());
        self::assertEquals('token.php?token='. $token, $request->url());
    }
}
