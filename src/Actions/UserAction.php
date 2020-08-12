<?php

namespace ArtARTs36\ULoginApi\Actions;

use ArtARTs36\ULoginApi\Contracts\Action;
use ArtARTs36\ULoginApi\Contracts\Request;
use ArtARTs36\ULoginApi\Entities\User;
use ArtARTs36\ULoginApi\Exceptions\GivenInCorrectData;
use ArtARTs36\ULoginApi\Exception\NetworkNotAllowed;
use ArtARTs36\ULoginApi\Exceptions\GivenIncorrectToken;
use ArtARTs36\ULoginApi\Requests\TokenRequest;
use ArtARTs36\ULoginApi\Support\FieldsChecker;
use ArtARTs36\ULoginApi\Support\Md5;
use ArtARTs36\ULoginApi\Support\Network;

/**
 * Class UserAction
 * @package ArtARTs36\ULoginApi\Actions
 */
class UserAction implements Action
{
    public const FIELD_NETWORK = 'network';

    /** @var string */
    private $token;

    /**
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->checkToken($token);
        $this->token = $token;
    }

    /**
     * @return Request
     */
    public function createRequest(): Request
    {
        return new TokenRequest($this->token);
    }

    /**
     * @param array $data
     * @return User
     */
    public function processResponse(array $data): User
    {
        if (!FieldsChecker::existsKeys(User::REQUIRED_FIELDS, $data)) {
            throw new GivenInCorrectData(static::class);
        }

        return new User($this->getNetworkOfResponse($data), $data);
    }

    /**
     * @param array $data
     * @return string
     */
    private function getNetworkOfResponse(array $data): string
    {
        if (!Network::isValid($data[static::FIELD_NETWORK])) {
            throw new NetworkNotAllowed($data[static::FIELD_NETWORK]);
        }

        return (string) $data[static::FIELD_NETWORK];
    }

    /**
     * @param string $token
     * @return bool
     */
    private function checkToken(string $token): bool
    {
        if (Md5::isNotValid($token)) {
            throw new GivenIncorrectToken();
        }

        return true;
    }
}
