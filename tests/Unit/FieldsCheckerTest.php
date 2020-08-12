<?php

namespace ArtARTs36\ULoginApi\Tests\Unit;

use ArtARTs36\ULoginApi\Support\FieldsChecker;
use PHPUnit\Framework\TestCase;

/**
 * Class FieldsCheckerTest
 * @package ArtARTs36\ULoginApi\Tests\Unit
 */
final class FieldsCheckerTest extends TestCase
{
    /**
     * @covers \ArtARTs36\ULoginApi\Support\FieldsChecker::existsKeys
     */
    public function testExistsKeys(): void
    {
        $keys = [
            'key1',
            'key2',
            'key3',
        ];

        $data = [
            'key1' => 'value1',
            'key2' => 'value2',
        ];

        self::assertFalse(FieldsChecker::existsKeys($keys, $data));

        //

        $data['key3'] = 'value3';

        self::assertTrue(FieldsChecker::existsKeys($keys, $data));
    }
}
