<?php

namespace Messerli90\IGDB;


class IGDB
{
    /**
     * @var string
     */
    protected $igdb_key; // from the config file

    /**
     * @var array
     */
    public $APIs = array(
        'games' => 'https://igdbcom-internet-game-database-v1.p.mashape.com/games/',
        'characters' => 'https://igdbcom-internet-game-database-v1.p.mashape.com/characters/',
        'game_engines' => 'https://igdbcom-internet-game-database-v1.p.mashape.com/game_engines/',
        'game_modes' => 'https://igdbcom-internet-game-database-v1.p.mashape.com/game_modes/',
        'keywords' => 'https://igdbcom-internet-game-database-v1.p.mashape.com/keywords/',
        'people' => 'https://igdbcom-internet-game-database-v1.p.mashape.com/people/',
        'platforms' => 'https://igdbcom-internet-game-database-v1.p.mashape.com/platforms/',
        'pulses' => 'https://igdbcom-internet-game-database-v1.p.mashape.com/pulses/',
        'themes' => 'https://igdbcom-internet-game-database-v1.p.mashape.com/themes/',
        'collections' => 'https://igdbcom-internet-game-database-v1.p.mashape.com/collections/',
        'player_perspectives' => 'https://igdbcom-internet-game-database-v1.p.mashape.com/player_perspectives/',
        'reviews' => 'https://igdbcom-internet-game-database-v1.p.mashape.com/reviews/',
        'franchises' => 'https://igdbcom-internet-game-database-v1.p.mashape.com/franchises/',
        'genres' => 'https://igdbcom-internet-game-database-v1.p.mashape.com/genres/',
        'release_dates' => 'https://igdbcom-internet-game-database-v1.p.mashape.com/release_dates/'
    );

    /**
     * @var array
     */
    public $page_info = array();

    /**
     * Constructor
     * $igdb = new IGDB(array('key' => 'KEY HERE'))
     *
     * @param string $key
     * @throws \Exception
     */
    public function __construct($key)
    {
        if (is_string($key) && !empty($key)) {
            $this->igdb_key = $key;
        } else {
            throw new \Exception('IGDB API key is Required, please visit https://market.mashape.com/igdbcom/internet-game-database');
        }
    }

    /**
     * @param $search
     * @param array $fields
     * @param string $order
     * @return \StdClass
     * @throws \Exception
     */
    public function searchGames($search, $fields = ['name', 'slug', 'summary', 'cover'], $order = 'popularity:desc')
    {
        $API_URL = $this->getApi('games');

        $params = array(
            'fields' => implode(',', $fields),
            'order' => $order,
            'search' => $search,
        );

        $apiData = $this->api_get($API_URL, $params);

        return $this->decodeMultiple($apiData);
    }

    /*
     *  Internally used Methods, set visibility to public to enable more flexibility
     */
    /**
     * @param $name
     * @return mixed
     */
    public function getApi($name)
    {
        return $this->APIs[$name];
    }

    /**
     * Using CURL to issue a GET request
     *
     * @param $url
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function api_get($url, $params)
    {
        //boilerplate for CURL
        $tuCurl = curl_init();
        curl_setopt($tuCurl, CURLOPT_URL, $url . (strpos($url, '?') === false ? '?' : '') . http_build_query($params));
        if (strpos($url, 'https') === false) {
            curl_setopt($tuCurl, CURLOPT_PORT, 80);
        } else {
            curl_setopt($tuCurl, CURLOPT_PORT, 443);
        }
        curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($tuCurl, CURLOPT_HTTPHEADER, [
            'X-Mashape-Key: ' . $this->igdb_key,
            'Accept: application/json'
        ]);

        $tuData = curl_exec($tuCurl);
        if (curl_errno($tuCurl)) {
            throw new \Exception('Curl Error : ' . curl_error($tuCurl));
        }
        return $tuData;
    }

}