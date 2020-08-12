<?php

namespace ArtARTs36\ULoginApi\Exceptions;

use Throwable;

/**
 * Class ULoginReturnError
 * @package ArtARTs36\ULoginApi\Exceptions
 */
class ULoginReturnError extends \RuntimeException
{
    /**
     * ULoginReturnError constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = '', $code = 0, Throwable $previous = null)
    {
        $message = $message ?? "ULogin returned error";

        parent::__construct($message, $code, $previous);
    }
}
