<?php

namespace ArtARTs36\ULoginApi;

use ArtARTs36\ULoginApi\Actions\UserAction;
use ArtARTs36\ULoginApi\Contracts\Client;
use ArtARTs36\ULoginApi\Entities\User;

class Api
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function user(string $token): User
    {
        $action = new UserAction($token);

        return $action->processResponse(
            $this->client->execute($action->createRequest())
        );
    }
}
