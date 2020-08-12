<?php

namespace ArtARTs36\ULoginApi\Exception;

use Throwable;

/**
 * Class NetworkNotAllowed
 * @package ArtARTs36\ULoginApi\Exception
 */
final class NetworkNotAllowed extends \LogicException
{
    /**
     * NetworkNotAllowed constructor.
     * @param string $network
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $network, $code = 0, Throwable $previous = null)
    {
        $message = "{$network} is not allowed!";

        parent::__construct($message, $code, $previous);
    }
}
