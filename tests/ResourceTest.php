<?php

namespace WishgranterProject\MusicProbe\Tests;

use PHPUnit\Framework\TestCase;
use WishgranterProject\MusicProbe\Resource;

class ResourceTest extends TestCase
{
    public function testSerializationAndInstantiation()
    {
        $array = [
            'probeId'     => 'magicProbe',
            'sourceId'    => 'magicSource',
            'id'          => 'id-of-the-resource',
            'title'       => 'Mirror Mirror',
            'artist'      => 'Blind Guardian',
            'album'       => 'Nightfall in Middle-Earth',
            'description' => 'Turgon, builds the city of Gondolin',
            'thumbnail'   => 'https://magic-source.com/thumb.jpg',
            'src'         => 'https://magic-source.com/mirror-mirror.mp3',
            'href'        => 'https://magic-source.com/mirror-mirror.html',
        ];

        $description = Resource::createFromArray($array);
        $this->assertEquals($array, $description->toArray());

        //----------

        $array = [
            'probeId'     => 'magicProbe',
            'sourceId'    => 'magicSource',
            'id'          => 'id-of-the-resource',
            'title'       => 'Nightfall',
            'artist'      => 'Blind Guardian',
        ];

        $description = Resource::createFromArray($array);
        $this->assertEquals($array, $description->toArray());
    }
}
