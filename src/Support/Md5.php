<?php

namespace ArtARTs36\ULoginApi\Support;

/**
 * Class Md5
 * @package ArtARTs36\ULoginApi\Support
 */
final class Md5
{
    /**
     * @param string $hash
     * @return bool
     */
    public static function isValid(string $hash): bool
    {
        return (bool) preg_match('/^[a-f0-9]{32}$/', $hash);
    }

    /**
     * @param string $hash
     * @return bool
     */
    public static function isNotValid(string $hash): bool
    {
        return !static::isValid($hash);
    }
}
