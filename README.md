IGDB (Internet Game Database)
=========

Laravel PHP Facade/Wrapper for the IGDB API

You need to create an application and create your access token in the [Mashape Marketplace](https://market.mashape.com/igdbcom/internet-game-database).

## Installation

Add `messerli90/igdb` to your `composer.json`.
```
"messerli90/igdb": "dev-master"
```

Run `composer update` to pull down the latest version of the package.

Now open up `app/config/app.php` and add the service provider to your `providers` array.

```php
'providers' => array(
	'Messerli90\IGDB\IGDBServiceProvider',
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
// Search Games by name
$video = IGDB::searchGames('zelda');

// Customize your return fields
$video = IGDB::searchGames('zelda', ['name', 'release_dates', 'esrb', 'genres']);



```

## (TODO) Run Unit Test
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