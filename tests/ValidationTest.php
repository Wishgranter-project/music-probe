<?php

namespace WishgranterProject\MusicProbe\Tests;

use PHPUnit\Framework\TestCase;
use WishgranterProject\MusicProbe\Helper\Validation;

class ValidationTest extends TestCase
{
    public function testToValidateArrayOfStrings()
    {
        $this->assertTrue(Validation::is([
            'this',
            'is',
            'an',
            'array',
            'of',
            'strings',
        ], 'string[]'));

        //-------------

        $this->assertFalse(Validation::is([
            'this',
            'one',
            'has',
            'an',
            'integer',
            123,
        ], 'string[]'));

        //-------------

        $this->assertFalse(Validation::is('string', 'string[]'));
    }

    public function testToValidateIntegers()
    {
        $this->assertTrue(Validation::is([0, 1, 2, 3], 'int[]'));

        //-------------

        $this->assertFalse(Validation::is(['random string', 1, 2, 3], 'int[]'));

        //-------------

        $this->assertFalse(Validation::is(5, 'int[]'));
    }
}
