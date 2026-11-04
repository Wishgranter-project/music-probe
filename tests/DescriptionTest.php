<?php

namespace WishgranterProject\MusicProbe\Tests;

use PHPUnit\Framework\TestCase;
use WishgranterProject\MusicProbe\Description;

class DescriptionTest extends TestCase
{
    public function testStringCastDown()
    {
        $description = new Description(
            $title  = 'Fade to Black',
            $artist = 'Metallica',
            [],
            $album  = 'Ride the Lightning',
            '',
            $genre  = 'Metal',
            [],
            [],
        );

        $this->assertStringContainsStringIgnoringCase($title, $description);
        $this->assertStringContainsStringIgnoringCase($artist, $description);
        $this->assertStringContainsStringIgnoringCase($album, $description);
        $this->assertStringContainsStringIgnoringCase($genre, $description);
    }
}
