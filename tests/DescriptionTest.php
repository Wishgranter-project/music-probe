<?php

declare(strict_types=1);

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

        $this->assertStringContainsStringIgnoringCase($title, (string) $description);
        $this->assertStringContainsStringIgnoringCase($artist, (string) $description);
        $this->assertStringContainsStringIgnoringCase($album, (string) $description);
        $this->assertStringContainsStringIgnoringCase($genre, (string) $description);

        //------------

        $description = new Description(
            $title     = 'Somebody That I Used To Know',
            $artist    = 'Gotye',
            $featuring = ['The Basics', 'Monty Cotton'],
        );

        $this->assertStringContainsStringIgnoringCase($title, (string) $description);
        $this->assertStringContainsStringIgnoringCase($artist, (string) $description);
        $this->assertStringContainsStringIgnoringCase($featuring[0], (string) $description);
        $this->assertStringContainsStringIgnoringCase($featuring[1], (string) $description);

        //------------

        $description = new Description(
            $title     = 'Fade to Black',
            $artist    = 'Disturbed',
            '',
            '',
            $cover     = 'Metallica',
        );

        $this->assertStringContainsStringIgnoringCase($title, (string) $description);
        $this->assertStringContainsStringIgnoringCase($artist, (string) $description);
        $this->assertStringContainsStringIgnoringCase($cover, (string) $description);

        //------------

        $description = new Description(
            $title      = 'Violence',
            $artist     = 'Le Destroy',
            '',
            '',
            '',
            $soundtrack = 'Cyberpunk 2077'
        );

        $this->assertStringContainsStringIgnoringCase($title, (string) $description);
        $this->assertStringContainsStringIgnoringCase($artist, (string) $description);
        $this->assertStringContainsStringIgnoringCase($soundtrack, (string) $description);
    }

    public function testSerializationAndInstantiation()
    {
        $array = [
            'title'  => 'Fade to Black',
            'artist' => 'Metallica',
            'album'  => 'Ride the Lightning',
            'genre'  => 'Metal',
        ];

        $description = Description::createFromArray($array);
        $this->assertEquals($array, $description->toArray());

        //------------

        $array = [
            'title'     => 'Somebody That I Used To Know',
            'artist'    => 'Gotye',
            'featuring' => ['The Basics', 'Monty Cotton'],
        ];

        $description = Description::createFromArray($array);
        $this->assertEquals($array, $description->toArray());

        //------------

        $array = [
            'title'  => 'Fade to Black',
            'artist' => 'Disturbed',
            'cover'  => 'Metallica',
        ];

        $description = Description::createFromArray($array);
        $this->assertEquals($array, $description->toArray());

        //------------

        $array = [
            'title'      => 'Violence',
            'artist'     => 'Le Destroy',
            'soundtrack' => 'Cyberpunk 2077'
        ];

        $description = Description::createFromArray($array);
        $this->assertEquals($array, $description->toArray());
    }
}
