<?php

declare(strict_types=1);

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
        $this->validateStringOrArrayOfStrings($artist, 'Artist');
        $this->validateStringOrArrayOfStrings($featuring, 'Featuring');
        $this->validateStringOrArrayOfStrings($soundtrack, 'Soundtrack');
        $this->validateStringOrArrayOfStrings($genre, 'Genre');

        $this->artist     = array_filter((array) $artist);
        $this->featuring  = array_filter((array) $featuring);
        $this->soundtrack = array_filter((array) $soundtrack);
        $this->genre      = array_filter((array) $genre);

        $this->album      = (string) $album;
        $this->cover      = (string) $cover;
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
        $core  = [];

        if ($this->cover) {
            if ($this->artist) {
                $core['artist'] = implode(', ', $this->artist) . ' cover of';
            }

            if ($this->title) {
                $core['title'] = $this->title;
            }

            if ($this->album) {
                $core['album'] = $this->title
                    ? "($this->album)"
                    : $this->album;
            }

            $core['cover'] = 'by ' . $this->cover;
        } else {
            if ($this->title) {
                $core['title'] = $this->title . ' by';
            }

            if ($this->artist) {
                $core['artist'] = implode(', ', $this->artist);
            }

            if ($this->album) {
                $core['album'] = $this->title
                    ? "($this->album)"
                    : $this->album;
            }
        }
        $array['core'] = implode(' ', $core);

        if ($this->featuring) {
            $array['featuring'] = 'featuring ' . implode(', ', $this->featuring);
        }

        if ($this->soundtrack) {
            $array['soundtrack'] = implode(', ', $this->soundtrack) . ' soundtrack';
        }

        if ($this->genre) {
            $array['genre'] = implode(', ', $this->genre);
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

        if (!empty($this->title)) {
            $array['title'] = $this->title;
        }

        if (!empty($this->artist)) {
            $array['artist'] = count($this->artist) > 1
                ? $this->artist
                : reset($this->artist);
        }

        if (!empty($this->featuring)) {
            $array['featuring'] = count($this->featuring) > 1
                ? $this->featuring
                : reset($this->featuring);
        }

        if (!empty($this->album)) {
            $array['album'] = $this->album;
        }

        if (!empty($this->cover)) {
            $array['cover'] = $this->cover;
        }

        if (!empty($this->soundtrack)) {
            $array['soundtrack'] = count($this->soundtrack) > 1
                ? $this->soundtrack
                : reset($this->soundtrack);
        }

        if (!empty($this->genre)) {
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
            !empty($array['album'])      ? $array['album']              : '',
            !empty($array['cover'])      ? $array['cover']              : '',
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
    protected function validateStringOrArrayOfStrings(mixed $value, string $label): void
    {
        if (!(empty($value) || is_string($value) || Validation::is($value, 'string[]'))) {
            throw new \InvalidArgumentException($label . ' must be a string or array of strings');
        }
    }
}
