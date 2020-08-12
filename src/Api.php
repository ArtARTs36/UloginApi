<?php

namespace ArtARTs36\ULoginApi;

use ArtARTs36\ULoginApi\Actions\UserAction;
use ArtARTs36\ULoginApi\Contracts\Client;
use ArtARTs36\ULoginApi\Entities\User;

/**
 * Class Api
 * @package ArtARTs36\ULoginApi
 */
class Api
{
    /** @var Client */
    protected $client;

    /**
     * Api constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $token
     * @return User
     */
    public function user(string $token): User
    {
        $action = new UserAction($token);

        return $action->processResponse(
            $this->client->execute($action->createRequest())
        );
    }
}
