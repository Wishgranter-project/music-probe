# Music Probe

A standard interface for searching and retrieving music from different sources.

This package provides the interfaces and abstractions.

Actual implementations can be found here:

- [wishgranter-project/youtube-probe](https://github.com/Wishgranter-project/youtube-probe)
- [wishgranter-project/local-files-probe](https://github.com/Wishgranter-project/local-files-probe)

<br><br>

## 1. How it is supposed to work.

Well, first we need to describe the music we are looking for: Title, artist, 
album, cover, genre, soundtrack and featured guests.

```php
use WishgranterProject\MusicProbe\Description;

// Title and artist, simple.
$description = Description::createFromArray([
    'title'  => 'Stolen Waters',
    'artist' => 'Cain\'s Offering',
]);

// Album.
$description = Description::createFromArray([
    'title'  => 'Blind Evil',
    'artist' => 'Dream Evil',
    'album'  => 'Old medal in metal',
]);

// Title and media featuring the music.
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

// Aiming for a specific performance in collaboration.
$description = Description::createFromArray([
    'title'     => 'Somebody That I Used to Know',
    'artist'    => 'Gotye',
    'featuring' => ['The Basics', 'Monty Cotton'],
]);
```

<br><br>

## 2. Search

Now that we defined what we are looking for, we can use it to search for 
matching media (see implementations above).

```php
/** @var WishgranterProject\MusicProbe\ProbeInterface */
$probe;

$resources = $probe->search($description);
foreach ($resources as $r) {
    echo "$r->title $r->thumbnail $r->href ...";
}
```

<br><br>

## License

MIT
