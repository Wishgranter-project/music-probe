<?php

namespace WishgranterProject\MusicProbe;

/**
 * Describes a piece of music.
 */
interface DescriptionInterface
{
    /**
     * Returns the description as a human readable string.
     *
     * @return string
     */
    public function __toString();

    /**
     * Returns the title of the music.
     *
     * @return string
     *   The title.
     */
    public function getTitle(): string;

    /**
     * Returns the performing artist(s).
     *
     * @return array
     *   Array with the name of the artists/bands.
     */
    public function getArtist(): array;

    /**
     * Returns featured artist(s).
     *
     * Helpful when trying to single out a performance.
     *
     * @return array
     *   Array with the name of the artists/bands.
     */
    public function getFeaturing(): array;

    /**
     * Returns the album associated to this music.
     *
     * @return string|null
     *   The name of the album.
     */
    public function getAlbum(): ?string;

    /**
     * Returns the artist that owns the music.
     *
     * Useful when the performing $artist is just doing a cover.
     *
     * @return string|null
     *   The original artist.
     */
    public function getCover(): ?string;

    /**
     * Returns piece(s) of intelectual property that feature the music.
     *
     * Like a movie or game.
     *
     * @return array
     *   Media featuring the music.
     */
    public function getSoundtrack(): array;

    /**
     * Retunrs genre(s) that fit the music description.
     *
     * @return array
     *   The musical genres.
     */
    public function getGenre(): array;

    /**
     * Returns an array representation of the object.
     *
     * Useful for data transfer.
     *
     * @return array
     *   The object as an array.
     */
    public function toArray();

    /**
     * Instantiate a new object out of an associative array.
     *
     * @param array $array
     *
     * @return DescriptionInterface
     */
    public static function createFromArray(array $array): DescriptionInterface;
}
