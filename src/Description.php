<?php

namespace WishgranterProject\MusicProbe;

use WishgranterProject\MusicProbe\Helper\Validation;

/**
 * {@inheritdoc}
 */
class Description implements DescriptionInterface
{
    /**
     * Constructor.
     *
     * @param string $title
     *   The title of the music.
     * @param null|string|string[] $artist
     *   The performing artist(s).
     * @param null|string|string[] $featuring
     *   Featured artist(s), helpful when trying to single out a performance.
     * @param null|string $album
     *   The album associated to this music.
     * @param null|string $cover
     *   The artist that owns the music, in case the performing $artist is just
     *   doing a cover.
     * @param null|string|string[] $soundtrack
     *   Piece(s) of intelectual property that feature the music, like a movie
     *   or game.
     * @param null|string|string[] $genre
     *   Genre(s) that fit the music description.
     */
    public function __construct(
        protected string $title,
        protected null|string|array $artist = [],
        protected null|string|array $featuring = [],
        protected null|string $album = '',
        protected null|string $cover = '',
        protected null|string|array $soundtrack = [],
        protected null|string|array $genre = [],
    ) {
        $this->validateSringOrArrayOfStrings($artist, 'Artist');
        $this->validateSringOrArrayOfStrings($featuring, 'Featuring');
        $this->validateSringOrArrayOfStrings($soundtrack, 'Soundtrack');
        $this->validateSringOrArrayOfStrings($genre, 'Genre');

        $this->artist     = (array) $artist;
        $this->featuring  = (array) $featuring;
        $this->soundtrack = (array) $soundtrack;
        $this->genre      = (array) $genre;
    }

    /**
     * Return read-only values.
     *
     * @param string $var
     *   Name of the property to return.
     *
     * @return mixed
     *   The value if set, null otherwise.
     */
    public function __get($var)
    {
        return isset($this->{$var})
            ? $this->{$var}
            : null;
    }

    /**
     * Checks if a property is set.
     *
     * @param string $var
     *   Name of the property to check.
     *
     * @return bool
     *   True if the property is set.
     */
    public function __isset(string $var): bool
    {
        return isset($this->{$var});
    }

    /**
     * {@inheritdoc}
     */
    public function __toString(): string
    {
        $array = [];

        if ($this->title) {
            $array['title'] = $this->title;
        }

        if ($this->artist) {
            $array['artist'] = $this->cover
                ? 'cover by ' . $this->cover
                : implode(', ', $this->artist);
        }

        if ($this->album) {
            $array['album'] = $this->album;
        }

        if ($this->soundtrack) {
            $array['soundtrack'] = implode(', ', $this->soundtrack) . ' soundtrack';
        }

        return implode(', ', $array);
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * {@inheritdoc}
     */
    public function getArtist(): array
    {
        return $this->artist;
    }

    /**
     * {@inheritdoc}
     */
    public function getFeaturing(): array
    {
        return $this->featuring;
    }

    /**
     * {@inheritdoc}
     */
    public function getAlbum(): ?string
    {
        return $this->album;
    }

    /**
     * {@inheritdoc}
     */
    public function getCover(): ?string
    {
        return $this->cover;
    }

    /**
     * {@inheritdoc}
     */
    public function getSoundtrack(): array
    {
        return $this->soundtrack;
    }

    /**
     * {@inheritdoc}
     */
    public function getGenre(): array
    {
        return $this->genre;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        $array = [];

        if ($this->title) {
            $array['title'] = $this->title;
        }

        if ($this->artist) {
            $array['artist'] = count($this->artist) > 1
                ? $this->artist
                : reset($this->artist);
        }

        if ($this->artist) {
            $array['featuring'] = count($this->featuring) > 1
                ? $this->featuring
                : reset($this->featuring);
        }

        if ($this->album) {
            $array['album'] = $this->album;
        }

        if ($this->cover) {
            $array['cover'] = $this->cover;
        }

        if ($this->soundtrack) {
            $array['soundtrack'] = count($this->soundtrack) > 1
                ? $this->soundtrack
                : reset($this->soundtrack);
        }

        if ($this->genre) {
            $array['genre'] = count($this->genre) > 1
                ? $this->genre
                : reset($this->genre);
        }

        return $array;
    }

    /**
     * {@inheritdoc}
     */
    public static function createFromArray(array $array): DescriptionInterface
    {
        return new self(
            !empty($array['title'])      ? $array['title']              : '',
            !empty($array['artist'])     ? (array) $array['artist']     : [],
            !empty($array['featuring'])  ? (array) $array['featuring']  : [],
            !empty($array['album'])      ? $array['album']              : null,
            !empty($array['cover'])      ? $array['cover']              : null,
            !empty($array['soundtrack']) ? (array) $array['soundtrack'] : [],
            !empty($array['genre'])      ? (array) $array['genre']      : [],
        );
    }


    /**
     * Validates if a value is a string or an array of strings.
     *
     * @param mixed $value
     *   The value to validate.
     * @param string $label
     *   Human readable string to produce an error message.
     */
    protected function validateSringOrArrayOfStrings(mixed $value, string $label): void
    {
        if (!(empty($value) || is_string($value) || Validation::is($value, 'string[]'))) {
            throw new \InvalidArgumentException($label . ' must be a string or array of strings');
        }
    }
}
