<?php

namespace ArtARTs36\ULoginApi\Contracts;

/**
 * Interface Client
 * @package ArtARTs36\ULoginApi\Contracts
 */
interface Client
{
    /**
     * @param Request $request
     * @return array
     */
    public function execute(Request $request): array;
}
