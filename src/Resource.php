<?php

namespace WishgranterProject\MusicProbe;

/**
 * {@inheritdoc}
 */
class Resource implements ResourceInterface
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
     * @param string $title
     *   Human readable string describing the resource.
     * @param string|null|array $artist
     *   The performing artist, if available.
     * @param string|null $album
     *   Human readable name of the album.
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
        protected string $probeId,
        protected string $sourceId,
        protected string $id,
        protected string $title,
        protected null|string|array $artist,
        protected null|string $album = '',
        protected null|string $description = '',
        protected null|string $thumbnail = '',
        protected null|string $src = '',
        protected null|string $href = '',
    ) {
        $this->artist = (array) $artist;
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
    public function __isset($var)
    {
        return isset($this->{$var});
    }

    /**
     * {@inheritdoc}
     */
    public function getProbeId(): string
    {
        return $this->probeId;
    }

    /**
     * {@inheritdoc}
     */
    public function getSourceId(): string
    {
        return $this->sourceId;
    }

    /**
     * {@inheritdoc}
     */
    public function getId(): ?string
    {
        return $this->id;
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
    public function getAlbum(): ?string
    {
        return $this->album;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription(): ?string
    {
        return (string) $this->description;
    }

    /**
     * {@inheritdoc}
     */
    public function getThumbnail(): ?string
    {
        return (string) $this->thumbnail;
    }

    /**
     * {@inheritdoc}
     */
    public function getSrc(): ?string
    {
        return (string) $this->src;
    }

    /**
     * {@inheritdoc}
     */
    public function getHref(): ?string
    {
        return (string) $this->href;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        $array = [];

        if (!empty($this->probeId)) {
            $array['probeId'] = $this->probeId;
        }

        if (!empty($this->sourceId)) {
            $array['sourceId'] = $this->sourceId;
        }

        if (!empty($this->id)) {
            $array['id'] = $this->id;
        }

        if (!empty($this->title)) {
            $array['title'] = $this->title;
        }

        if (!empty($this->artist)) {
            $array['artist'] = $this->artist;
        }

        if (!empty($this->album)) {
            $array['album'] = $this->album;
        }

        if (!empty($this->description)) {
            $array['description'] = $this->description;
        }

        if (!empty($this->thumbnail)) {
            $array['thumbnail'] = $this->thumbnail;
        }

        if (!empty($this->src)) {
            $array['src'] = $this->src;
        }

        if (!empty($this->href)) {
            $array['href'] = $this->href;
        }

        return $array;
    }

    /**
     * {@inheritdoc}
     */
    public static function createFromArray(array $array): ResourceInterface
    {
        return new self(
            !empty($array['probeId'])     ? $array['probeId']     : '',
            !empty($array['sourceId'])    ? $array['sourceId']    : '',
            !empty($array['id'])          ? $array['id']          : null,
            !empty($array['title'])       ? $array['title']       : '',
            !empty($array['artist'])      ? $array['artist']      : null,
            !empty($array['album'])       ? $array['album']       : null,
            !empty($array['description']) ? $array['description'] : null,
            !empty($array['thumbnail'])   ? $array['thumbnail']   : null,
            !empty($array['src'])         ? $array['src']         : null,
            !empty($array['href'])        ? $array['href']        : null,
        );
    }
}
