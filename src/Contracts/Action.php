<?php

namespace ArtARTs36\ULoginApi\Contracts;

/**
 * Interface Action
 * @package ArtARTs36\ULoginApi\Contracts
 */
interface Action
{
    /**
     * @return Request
     */
    public function createRequest(): Request;
}
