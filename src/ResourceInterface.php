<?php

namespace WishgranterProject\MusicProbe;

/**
 * Describes a resource that can be played.
 */
interface ResourceInterface
{
    /**
     * Returns the id of the probe that instantiated this object.
     *
     * See WishgranterProject\MusicProbe\ProbeInterface::getId()
     *
     * @return string
     *   The probe's id.
     */
    public function getProbeId(): string;

    /**
     * Returns the service that provides this media to play.
     *
     * See WishgranterProject\MusicProbe\ProbeInterface::getSourceId()
     *
     * @return string
     *   The source's id.
     */
    public function getSourceId(): string;

    /**
     * Returns the id within the source's system.
     *
     * @return string|null
     *   Id of the resource.
     */
    public function getId(): ?string;

    /**
     * Returns a human readable string describing the resource.
     *
     * @return string
     *   The title.
     */
    public function getTitle(): string;

    /**
     * Returns the performing artist, if available.
     *
     * @return array
     *   The performing artist.
     */
    public function getArtist(): array;

    /**
     * Returns the human readable name of the album.
     *
     * @return null|string
     *   The album name.
     */
    public function getAlbum(): ?string;

    /**
     * Returns a human readable string describing the resource.
     *
     * @return null|string
     *   The description.
     */
    public function getDescription(): ?string;

    /**
     * Returns an URL to a thumbnail picture, if available.
     *
     * @return string|null
     *   Absolute URL.
     */
    public function getThumbnail(): ?string;

    /**
     * Returns an URL to a playable multimedia.
     *
     * Like a mp4 file for example.
     *
     * @return string|null
     *   Absolute URL.
     */
    public function getSrc(): ?string;

    /**
     * An URL to the resource's web page.
     *
     * @return string|null
     *   Absolute URL.
     */
    public function getHref(): ?string;

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
