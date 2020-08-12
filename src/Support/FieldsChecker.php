<?php

namespace ArtARTs36\ULoginApi\Support;

/**
 * Class FieldsChecker
 * @package ArtARTs36\ULoginApi\Support
 */
final class FieldsChecker
{
    /**
     * @param array $keys
     * @param array $data
     * @return bool
     */
    public static function existsKeys(array $keys, array $data): bool
    {
        foreach ($keys as $key) {
            if (!isset($data[$key])) {
                return false;
            }
        }

        return true;
    }
}
