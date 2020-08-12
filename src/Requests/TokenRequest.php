<?php

namespace ArtARTs36\ULoginApi\Requests;

use ArtARTs36\ULoginApi\Contracts\Hostable;
use ArtARTs36\ULoginApi\Contracts\Request;

class TokenRequest implements Request, Hostable
{
    protected $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * @inheritDoc
     */
    public function url(): string
    {
        return 'token.php?token='. $this->token;
    }

    /**
     * @inheritDoc
     */
    public function method(): string
    {
        return static::METHOD_GET;
    }
}
