<?php

namespace ArtARTs36\ULoginApi\Exceptions;

use Throwable;

/**
 * Class GivenInCorrectData
 * @package ArtARTs36\ULoginApi\Exceptions
 */
final class GivenInCorrectData extends \LogicException
{
    /**
     * GivenInCorrectData constructor.
     * @param string $action
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($action, $code = 0, Throwable $previous = null)
    {
        $message = "By action {$action} given incorrect data";

        parent::__construct($message, $code, $previous);
    }
}
