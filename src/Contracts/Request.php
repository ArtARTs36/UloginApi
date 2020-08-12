<?php

namespace ArtARTs36\ULoginApi\Contracts;

/**
 * Interface Request
 * @package ArtARTs36\ULoginApi\Contracts
 */
interface Request
{
    public const METHOD_GET = 'GET';

    /**
     * @return string
     */
    public function url(): string;

    /**
     * @return string
     */
    public function method(): string;
}
