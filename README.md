# Music Probe

A standard interface for searching and retrieving music from different sources.

This package provides the abstractions and interfaces, actual implementations 
can be found here:

*Coming soon.*

---

## Usage

### 1. Describe what you're looking for

```php
use WishgranterProject\MusicProbe\Description;

// Search by title and artist.
$description = Description::createFromArray([
    'title'  => 'Stolen waters',
    'artist' => 'Cain\'s Offering',
]);

// Or by the game/movie featuring the track.
$description = Description::createFromArray([
    'title'      => 'I don\'t want to set the world on fire',
    'soundtrack' => 'Fallout 3',
]);

// Or search for a cover performed by a different artist.
$description = Description::createFromArray([
    'title'   => 'Fade to Black',
    'artist'  => 'Disturbed',
    'cover'   => 'Metallica',
]);
```

### 2. Search and iterate over results

```php
$resources = $probe->search($description);

foreach ($resources as $r) {
    echo "$r->title $r->thumbnail $r->href ...";
}
```

---

## License

MIT
