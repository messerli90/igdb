IGDB (Internet Game Database)
=========

[![Build Status](https://travis-ci.org/messerli90/igdb.svg?branch=master)](https://travis-ci.org/messerli90/igdb)
[![Built For Laravel](https://img.shields.io/badge/built%20for-laravel-blue.svg)](http://laravel.com)


Laravel PHP Facade/Wrapper for the IGDB API

You need to create an application and create your access token in the [Mashape Marketplace](https://market.mashape.com/igdbcom/internet-game-database).

> This packages is still WiP (Work in Progress), do not try to use in your app. If you'd like to contribute feel free to fork and submit a PR.
>
> 2017/01/02

## Installation

Add `messerli90/igdb` to your `composer.json`.
```
"messerli90/igdb": "dev-master"
```

Run `composer update` to pull down the latest version of the package.

Now open up `app/config/app.php` and add the service provider to your `providers` array.

```php
'providers' => array(
	Messerli90\IGDB\IGDBServiceProvider::class,
)
```

## Configuration
### For Laravel 5
Run `php artisan vendor:publish` and set your API key in the file:

```
/app/config/igdb.php
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

## Run Unit Test
If you have PHPUnit installed in your environment, run:

```bash
$ phpunit
```

If you don't have PHPUnit installed, you can run the following:

```bash
$ composer update
$ ./vendor/bin/phpunit
```

## Format of returned data
The returned JSON is decoded as PHP objects (not Array).


## IGDB API
- [IGDB API Doc](https://market.mashape.com/igdbcom/internet-game-database)
- [Obtain API key from Mashape](https://market.mashape.com/igdbcom/internet-game-database)


##Credits
Built on code from alaouy's [Youtube](https://github.com/alaouy/Youtube).

## Contribute
If you'd like to contribute feel free to fork and submit a PR. I'll be updating the Todo list below with new feature ideas

## TODO

- Improve test coverage
- Image facade
