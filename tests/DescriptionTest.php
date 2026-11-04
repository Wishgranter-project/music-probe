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
            [],
            $genre  = 'Metal',
        );

        $this->assertStringContainsStringIgnoringCase($title, $description);
        $this->assertStringContainsStringIgnoringCase($artist, $description);
        $this->assertStringContainsStringIgnoringCase($album, $description);
        $this->assertStringContainsStringIgnoringCase($genre, $description);

        //------------

        $description = new Description(
            $title     = 'Somebody That I Used To Know',
            $artist    = 'Gotye',
            $featuring = ['The Basics', 'Monty Cotton'],
        );

        $this->assertStringContainsStringIgnoringCase($title, $description);
        $this->assertStringContainsStringIgnoringCase($artist, $description);
        $this->assertStringContainsStringIgnoringCase($featuring[0], $description);
        $this->assertStringContainsStringIgnoringCase($featuring[1], $description);

        //------------

        $description = new Description(
            $title     = 'Fade to Black',
            $artist    = 'Disturbed',
            '',
            '',
            $cover     = 'Metallica',
        );

        $this->assertStringContainsStringIgnoringCase($title, $description);
        $this->assertStringContainsStringIgnoringCase($artist, $description);
        $this->assertStringContainsStringIgnoringCase($cover, $description);

        //------------

        $description = new Description(
            $title      = 'Violence',
            $artist     = 'Le Destroy',
            '',
            '',
            '',
            $soundtrack = 'Cyberpunk 2077'
        );

        $this->assertStringContainsStringIgnoringCase($title, $description);
        $this->assertStringContainsStringIgnoringCase($artist, $description);
        $this->assertStringContainsStringIgnoringCase($soundtrack, $description);
    }
}
