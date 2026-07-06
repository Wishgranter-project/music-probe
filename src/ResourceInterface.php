<?php

namespace WishgranterProject\MusicProbe;

/**
 * Describes a resource that can be played.
 */
interface ResourceInterface
{
    /**
     * Constructor.
     *
     * @param string $probeId
     *   The id of the probe that instantiated this object.
     *   See WishgranterProject\MusicProbe\ProbeInterface::getId()
     * @param string $sourceId
     *   The service that provides this media to play.
     *   See WishgranterProject\MusicProbe\ProbeInterface::getSourceId()
     * @param string $id
     *   ID within the source's system.
     * @param string|null $title
     *   Human readable string describing the resource.
     * @param string|null $artist
     *   The performing artist, if available.
     * @param string|null $description
     *   Human readable string describing the resource.
     * @param string|null $thumbnail
     *   An URL to a thumbnail picture, if available.
     * @param string|null $src
     *   An URL to a playable multimedia.
     *   Like a mp4 file for example.
     * @param string|null $href
     *   An URL to the resource's web page.
     */
    public function __construct(
        string $probeId,
        string $sourceId,
        string $id,
        ?string $title,
        ?string $artist,
        ?string $description = '',
        ?string $thumbnail = '',
        ?string $src = '',
        ?string $href = '',
    );

    /**
     * Returns an array representation of the object.
     *
     * Useful for data transfer.
     *
     * @return array
     *   The object as an array.
     */
    public function toArray(): array;

    /**
     * Instantiate an object out of an associative array.
     *
     * @param array $array
     *   Associative array.
     *
     * @return WishgranterProject\MusicProbe\Resource\ResourceInterface
     *   The new object instantiated from the array.
     */
    public static function createFromArray(array $array): ResourceInterface;
}
