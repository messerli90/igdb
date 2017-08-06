IGDB (Internet Game Database)
=========

[![Build Status](https://travis-ci.org/messerli90/igdb.svg?branch=master)](https://travis-ci.org/messerli90/igdb)
[![Built For Laravel](https://img.shields.io/badge/built%20for-laravel-blue.svg)](http://laravel.com)
[![License](https://poser.pugx.org/messerli90/igdb/license)](https://packagist.org/packages/messerli90/igdb)
[![Total Downloads](https://poser.pugx.org/messerli90/igdb/downloads)](https://packagist.org/packages/messerli90/igdb)

## Introduction
This packages provides a nice and easy wrapper around the [IGDB API](https://igdb.github.io/api/about/welcome/) for use in your Laravel application.

In order to use the IGDB API, you must have a account and key. You can register your app at [https://api.igdb.com/](https://api.igdb.com/). 

## Installation

Add `messerli90/igdb` to your `composer.json`.
```
"messerli90/igdb": "~1.0"
```
or 
```bash
composer require messerli90/igdb
```

Run `composer update` to pull down the latest version of the package.

Now open up `app/config/app.php` and add the service provider to your `providers` array.

```php
'providers' => array(
    Messerli90\IGDB\IGDBServiceProvider::class,
)
```

Optionally, add the facade to your `aliases` array
```php
'IGDB' => \Messerli90\IGDB\Facades\IGDB::class,
```

## Configuration

Add the `igdb` to your `config/services.php` array
```php
'igdb' => [
    'key' => 'YOUR_IGDB_KEY',
    'url' => 'YOUR_IGDB_URL
]
```

## Usage

```php
// Get Game by ID
$game = IGDB::getGame(9630);

// Customize / limit the returned fields
$games = IGDB::getGame(9630, ['name', 'release_dates', 'esrb', 'genres'], $limit = 10, $offset = 0, $order = 'release_dates.date:desc');

// Search Games by name
$games = IGDB::searchGames('fallout');

// Get Character by ID
$character = IGDB::getCharacter(4534);

// Search Characters by name
$characters = IGDB::searchCharacters('fisher');

// Get Company by ID
$companies = IGDB::getCompany('ubisoft');

// Search Company by name
$company = IGDB::getCompany(7041);

// Get Franchise by ID
$franchise = IGDB::getFranchise(133);

// Search Franchise by name
$franchises = IGDB::searchFranchises('Harry Potter');

// Get Game Mode by Id
$game_mode = IGDB::getGameMode(1);

// Search Game Modes by name
$game_modes = IGDB::searchGameModes('Single Player');

// Get Genre by ID
$genre = IGDB::getGenre(15);

// Search Genres by name
$genres = IGDB::searchGenres('strategy');

// Get Keyword by ID
$keyword = IGDB::getKeyword(121);

// Search Keyword by name
$keywords = IGDB::searchKeywords('sandbox');

// Get Person by ID
$person = IGDB::getPerson(24354);

// Search People by name
$people = IGDB::searchPeople('Delaney');

// Get Platform by ID
$platform = IGDB::getPlatform(49);

// Search Platforms by name
$platforms = IGDB::searchPlatforms('xbox');

// Get Player Perspective by ID
$player_perspective = IGDB::getPlayerPerspective(7);

// Search Player Perspective by name
$player_perspectives = IGDB::searchPlayerPerspectives('Virtual');

// Get Pulse by ID
$pulse = IGDB::getPulse(20707);

// Fetch latest Pulses
$pulses = IGDB::fetchPulses();

// Get Collection / Series by ID
$collection = IGDB::getCollection(3);

// Search Collections / Series by name
$collections = IGDB::searchCollections('fallout');

// Get Theme by ID
$theme = IGDB::getTheme(39);

// Search Themes by name
$themes = IGDB::searchThemes('warfare');

```

## Format of returned data

The returned JSON data is decoded as a PHP object.

## Run Unit Test

If you have PHPUnit installed in your environment, run:

```bash
$ phpunit
```

## IGDB API

- [IGDB API Docs](https://igdb.github.io/api/about/welcome/)
- [Register application and obtain API key](https://api.igdb.com/)


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Michael Messerli](https://twitter.com/michaelmesserli)
- [k4kuz0](https://github.com/k4kuz0)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
