<?php

namespace ArtARTs36\ULoginApi\Exceptions;

/**
 * Class ExceptionHandler
 * @package ArtARTs36\ULoginApi\Exceptions
 */
class ExceptionHandler
{
    /**
     * @param string $url
     * @param mixed $response
     * @param int $code
     */
    public function handle(string $url, $response, int $code): void
    {
        if (!is_string($response)) {
            throw new ULoginReturnError();
        }

        $response = json_decode($response, true);

        if (!empty($response['error'])) {
            $this->byError($response['error']);
        }
    }

    /**
     * @param mixed $error
     */
    public function byError($error): void
    {
        if ($error === 'invalid token') {
            throw new SendInvalidToken();
        }

        throw new ULoginReturnError();
    }
}
