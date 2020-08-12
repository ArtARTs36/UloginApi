<?php

namespace ArtARTs36\ULoginApi\Support;

/**
 * Class HttpCode
 * @package ArtARTs36\ULoginApi\Support
 */
class HttpCode
{
    public const OK = 200;
    public const CREATED = 201;

    public const NOT_FOUND = 404;
    public const FORBIDDEN = 403;
    public const UNAUTHORIZED = 401;
    public const BAD_REQUEST = 400;

    public const ALLOWED_CODES = [
        self::OK,
        self::CREATED,
    ];

    public const DISALLOWED_CODES = [
        self::NOT_FOUND,
        self::FORBIDDEN,
        self::UNAUTHORIZED,
        self::BAD_REQUEST,
    ];

    /**
     * @param int $code
     * @return bool
     */
    public static function isAllowed(int $code): bool
    {
        return in_array($code, static::ALLOWED_CODES);
    }

    /**
     * @param int $code
     * @return bool
     */
    public static function isDisallowed(int $code): bool
    {
        return in_array($code, static::DISALLOWED_CODES);
    }
}
