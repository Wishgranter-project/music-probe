<?php

namespace WishgranterProject\MusicProbe;

abstract class ProbeAbstract
{
    /**
     * Builds a query out of a description.
     *
     * @param WishgranterProject\MusicProbe\DescriptionInterface $description
     *   The description of a music.
     *
     * @return string
     *   String to query the source.
     */
    public function buildQuery(DescriptionInterface $description): string
    {
        $parts = [];

        if (isset($description->title)) {
            $parts[] = $description->title;
        }

        // It is more likely for the music to be known for the soundtrack than
        // the artist, so we give it precedence.
        if (!empty($description->soundtrack)) {
            $parts[] = $description->soundtrack[0];
        } elseif (!empty($description->artist)) {
            $parts[] = $description->artist[0];
        }

        if ($description->genre) {
            $parts[] = $description->genre[0];
        }

        $query = implode(' ', $parts);

        return $query;
    }
}
