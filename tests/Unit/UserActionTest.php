<?php

namespace ArtARTs36\ULoginApi\Tests\Unit;

use ArtARTs36\ULoginApi\Actions\UserAction;
use ArtARTs36\ULoginApi\Exceptions\GivenInCorrectData;
use ArtARTs36\ULoginApi\Exceptions\NetworkNotAllowed;
use ArtARTs36\ULoginApi\Exceptions\GivenIncorrectToken;
use ArtARTs36\ULoginApi\Requests\TokenRequest;
use ArtARTs36\ULoginApi\Support\Network;
use ArtARTs36\ULoginApi\Tests\Traits\CallMethodViaReflection;
use PHPUnit\Framework\TestCase;

/**
 * Class UserActionTest
 * @package ArtARTs36\ULoginApi\Tests\Unit
 */
final class UserActionTest extends TestCase
{
    use CallMethodViaReflection;

    /**
     * @covers \ArtARTs36\ULoginApi\Actions\UserAction::createRequest
     */
    public function testCreateRequest(): void
    {
        self::assertInstanceOf(TokenRequest::class, $this->make()->createRequest());
    }

    public function testProcessResponseWithEmptyData()
    {
        self::expectException(GivenInCorrectData::class);

        $this->make()->processResponse([]);
    }

    /**
     * @throws \ReflectionException
     */
    public function testProcessResponseWithNotValidNetwork(): void
    {
        self::expectException(NetworkNotAllowed::class);

        $this->callMethodViaReflection($this->make(), 'getNetworkOfResponse', [
            'network' => 'random',
        ]);
    }

    /**
     * @covers \ArtARTs36\ULoginApi\Actions\UserAction::processResponse
     */
    public function testProcessResponse(): void
    {
        $data = [
            'network' => Network::VK,
            'identity' => 'vk.com/id123456789',
            'first_name' => 'Artem',
            'last_name' => 'Ukrainskiy',
        ];

        $user = $this->make()->processResponse($data);

        self::assertTrue($user->isOfNetwork(Network::VK));
    }

    /**
     * @covers \ArtARTs36\ULoginApi\Actions\UserAction::checkToken
     * @throws \ReflectionException
     */
    public function testCheckToken(): void
    {
        self::assertTrue($this->callMethodViaReflection($this->make(), 'checkToken', md5(555)));

        //

        self::expectException(GivenIncorrectToken::class);

        self::assertTrue($this->callMethodViaReflection($this->make(), 'checkToken', 555));
    }

    /**
     * @return UserAction
     */
    private function make(): UserAction
    {
        return new UserAction(md5('555'));
    }
}
