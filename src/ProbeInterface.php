<?php

namespace WishgranterProject\MusicProbe;

interface ProbeInterface
{
    /**
     * Returns this probe's id.
     *
     * @return string
     *   The probe's id.
     */
    public function getId(): string;

    /**
     * Returns a string to identify the source that provides the media.
     *
     * @example 'local', 'youtube', 'soundcloud', 'spotify'.
     *
     * @return string
     *   The id of the source.
     */
    public function getSourceId(): string;

    /**
     * Searches for our description within the source.
     *
     * @param WishgranterProject\MusicProbe\DescriptionInterface $description
     *   A description of a music.
     *
     * @return WishgranterProject\MusicProbe\ResourceInterface[]
     *   An array of Resource objects matching the $description.
     */
    public function search(DescriptionInterface $description): array;
}
