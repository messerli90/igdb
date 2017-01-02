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
        'companies' => 'https://igdbcom-internet-game-database-v1.p.mashape.com/companies/',
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
     * Get character information
     *
     * @param integer $id
     * @param array $fields
     * @return \StdClass
     * @throws \Exception
     */
    public function getCharacter($id, $fields = ['*'])
    {
        $API_URL = $this->getEndpoint('characters');
        $API_URL .= $id;

        $params = array(
            'fields' => implode(',', $fields)
        );

        $apiData = $this->api_get($API_URL, $params);

        return $this->decodeSingle($apiData);
    }

    /**
     * Search characters by name
     *
     * @param string $search
     * @param array $fields
     * @param integer $limit
     * @param integer $offset
     * @return \StdClass
     * @throws \Exception
     */
    public function searchCharacters($search, $fields = ['*'], $limit = 10, $offset = 0)
    {
        $API_URL = $this->getEndpoint('characters');

        $params = array(
            'fields' => implode(',', $fields),
            'limit' => $limit,
            'offset' => $offset,
            'search' => $search,
        );

        $apiData = $this->api_get($API_URL, $params);

        return $this->decodeMultiple($apiData);
    }

    /**
     * Get company information by ID
     *
     * @param integer $id
     * @param array $fields
     * @return \StdClass
     * @throws \Exception
     */
    public function getCompany($id, $fields = ['*'])
    {
        $API_URL = $this->getEndpoint('companies');
        $API_URL .= $id;

        $params = array(
            'fields' => implode(',', $fields)
        );

        $apiData = $this->api_get($API_URL, $params);

        return $this->decodeSingle($apiData);
    }

    /**
     * Search companies by name
     *
     * @param string $search
     * @param array $fields
     * @param integer $limit
     * @param integer $offset
     * @return \StdClass
     * @throws \Exception
     */
    public function searchCompanies($search, $fields = ['*'], $limit = 10, $offset = 0)
    {
        $API_URL = $this->getEndpoint('companies');

        $params = array(
            'fields' => implode(',', $fields),
            'limit' => $limit,
            'offset' => $offset,
            'search' => $search,
        );

        $apiData = $this->api_get($API_URL, $params);

        return $this->decodeMultiple($apiData);
    }

    /**
     * Get franchise information
     *
     * @param integer $id
     * @param array $fields
     * @return \StdClass
     * @throws \Exception
     */
    public function getFranchise($id, $fields = ['*'])
    {
        $API_URL = $this->getEndpoint('franchises');
        $API_URL .= $id;

        $params = array(
            'fields' => implode(',', $fields)
        );

        $apiData = $this->api_get($API_URL, $params);

        return $this->decodeSingle($apiData);
    }

    /**
     * Search franchises by name
     *
     * @param string $search
     * @param array $fields
     * @param integer $limit
     * @param integer $offset
     * @return \StdClass
     * @throws \Exception
     */
    public function searchFranchises($search, $fields = ['*'], $limit = 10, $offset = 0)
    {
        $API_URL = $this->getEndpoint('franchises');

        $params = array(
            'fields' => implode(',', $fields),
            'limit' => $limit,
            'offset' => $offset,
            'search' => $search,
        );

        $apiData = $this->api_get($API_URL, $params);

        return $this->decodeMultiple($apiData);
    }

    /**
     * Get game mode information by ID
     *
     * @param integer $id
     * @param array $fields
     * @return \StdClass
     * @throws \Exception
     */
    public function getGameMode($id, $fields = ['name', 'slug', 'url'])
    {
        $API_URL = $this->getEndpoint('game_modes');
        $API_URL .= $id;

        $params = array(
            'fields' => implode(',', $fields)
        );

        $apiData = $this->api_get($API_URL, $params);

        return $this->decodeSingle($apiData);
    }

    /**
     * Search game modes by name
     *
     * @param string $search
     * @param array $fields
     * @param integer $limit
     * @param integer $offset
     * @return \StdClass
     * @throws \Exception
     */
    public function searchGameModes($search, $fields = ['name', 'slug', 'url'], $limit = 10, $offset = 0)
    {
        $API_URL = $this->getEndpoint('game_modes');

        $params = array(
            'fields' => implode(',', $fields),
            'limit' => $limit,
            'offset' => $offset,
            'search' => $search,
        );

        $apiData = $this->api_get($API_URL, $params);

        return $this->decodeMultiple($apiData);
    }

    /**
     * Get game information by ID
     *
     * @param integer $id
     * @param array $fields
     * @return \StdClass
     * @throws \Exception
     */
    public function getGame($id, $fields = ['*'])
    {
        $API_URL = $this->getEndpoint('games');
        $API_URL .= $id;

        $params = array(
            'fields' => implode(',', $fields)
        );

        $apiData = $this->api_get($API_URL, $params);

        return $this->decodeSingle($apiData);
    }

    /**
     * Search games by name
     *
     * @param string $search
     * @param array $fields
     * @param integer $limit
     * @param integer $offset
     * @param string $order
     * @return \StdClass
     * @throws \Exception
     */
    public function searchGames($search, $fields = ['*'], $limit = 10, $offset = 0, $order = 'release_dates.date:desc')
    {
        $API_URL = $this->getEndpoint('games');

        $params = array(
            'fields' => implode(',', $fields),
            'limit' => $limit,
            'offset' => $offset,
            'order' => $order,
            'search' => $search,
        );

        $apiData = $this->api_get($API_URL, $params);

        return $this->decodeMultiple($apiData);
    }

    /**
     * Get genre information by ID
     *
     * @param integer $id
     * @param array $fields
     * @return \StdClass
     * @throws \Exception
     */
    public function getGenre($id, $fields = ['name', 'slug', 'url'])
    {
        $API_URL = $this->getEndpoint('genres');
        $API_URL .= $id;

        $params = array(
            'fields' => implode(',', $fields)
        );

        $apiData = $this->api_get($API_URL, $params);

        return $this->decodeSingle($apiData);
    }

    /**
     * Search genres by name
     *
     * @param string $search
     * @param array $fields
     * @param integer $limit
     * @param integer $offset
     * @return \StdClass
     * @throws \Exception
     */
    public function searchGenres($search, $fields = ['name', 'slug', 'url'], $limit = 10, $offset = 0)
    {
        $API_URL = $this->getEndpoint('genres');

        $params = array(
            'fields' => implode(',', $fields),
            'limit' => $limit,
            'offset' => $offset,
            'search' => $search,
        );

        $apiData = $this->api_get($API_URL, $params);

        return $this->decodeMultiple($apiData);
    }

    /**
     * Get keyword information by ID
     *
     * @param integer $id
     * @param array $fields
     * @return \StdClass
     * @throws \Exception
     */
    public function getKeyword($id, $fields = ['name', 'slug', 'url'])
    {
        $API_URL = $this->getEndpoint('keywords');
        $API_URL .= $id;

        $params = array(
            'fields' => implode(',', $fields)
        );

        $apiData = $this->api_get($API_URL, $params);

        return $this->decodeSingle($apiData);
    }

    /**
     * Search keywords by name
     *
     * @param string $search
     * @param array $fields
     * @param integer $limit
     * @param integer $offset
     * @return \StdClass
     * @throws \Exception
     */
    public function searchKeywords($search, $fields = ['name', 'slug', 'url'], $limit = 10, $offset = 0)
    {
        $API_URL = $this->getEndpoint('keywords');

        $params = array(
            'fields' => implode(',', $fields),
            'limit' => $limit,
            'offset' => $offset,
            'search' => $search,
        );

        $apiData = $this->api_get($API_URL, $params);

        return $this->decodeMultiple($apiData);
    }

    /**
     * Get people information by ID
     *
     * @param integer $id
     * @param array $fields
     * @return \StdClass
     * @throws \Exception
     */
    public function getPerson($id, $fields = ['*'])
    {
        $API_URL = $this->getEndpoint('people');
        $API_URL .= $id;

        $params = array(
            'fields' => implode(',', $fields)
        );

        $apiData = $this->api_get($API_URL, $params);

        return $this->decodeSingle($apiData);
    }

    /**
     * Search people by name
     *
     * @param string $search
     * @param array $fields
     * @param integer $limit
     * @param integer $offset
     * @return \StdClass
     * @throws \Exception
     */
    public function searchPeople($search, $fields = ['name', 'slug', 'url'], $limit = 10, $offset = 0)
    {
        $API_URL = $this->getEndpoint('people');

        $params = array(
            'fields' => implode(',', $fields),
            'limit' => $limit,
            'offset' => $offset,
            'search' => $search,
        );

        $apiData = $this->api_get($API_URL, $params);

        return $this->decodeMultiple($apiData);
    }

    /**
     * Get platform information by ID
     *
     * @param integer $id
     * @param array $fields
     * @return \StdClass
     * @throws \Exception
     */
    public function getPlatform($id, $fields = ['name', 'logo', 'slug', 'url'])
    {
        $API_URL = $this->getEndpoint('platforms');
        $API_URL .= $id;

        $params = array(
            'fields' => implode(',', $fields)
        );

        $apiData = $this->api_get($API_URL, $params);

        return $this->decodeSingle($apiData);
    }

    /**
     * Search platforms by name
     *
     * @param string $search
     * @param array $fields
     * @param integer $limit
     * @param integer $offset
     * @return \StdClass
     * @throws \Exception
     */
    public function searchPlatforms($search, $fields = ['name', 'logo', 'slug', 'url'], $limit = 10, $offset = 0)
    {
        $API_URL = $this->getEndpoint('platforms');

        $params = array(
            'fields' => implode(',', $fields),
            'limit' => $limit,
            'offset' => $offset,
            'search' => $search,
        );

        $apiData = $this->api_get($API_URL, $params);

        return $this->decodeMultiple($apiData);
    }

    /**
     * Get player perspective information by ID
     *
     * @param integer $id
     * @param array $fields
     * @return \StdClass
     * @throws \Exception
     */
    public function getPlayerPerspective($id, $fields = ['name', 'slug', 'url'])
    {
        $API_URL = $this->getEndpoint('player_perspectives');
        $API_URL .= $id;

        $params = array(
            'fields' => implode(',', $fields)
        );

        $apiData = $this->api_get($API_URL, $params);

        return $this->decodeSingle($apiData);
    }

    /**
     * Search player perspective by name
     *
     * @param string $search
     * @param array $fields
     * @param integer $limit
     * @param integer $offset
     * @return \StdClass
     * @throws \Exception
     */
    public function searchPlayerPerspectives($search, $fields = ['name', 'slug', 'url'], $limit = 10, $offset = 0)
    {
        $API_URL = $this->getEndpoint('player_perspectives');

        $params = array(
            'fields' => implode(',', $fields),
            'limit' => $limit,
            'offset' => $offset,
            'search' => $search,
        );

        $apiData = $this->api_get($API_URL, $params);

        return $this->decodeMultiple($apiData);
    }

    /**
     * Get pulse information by ID
     *
     * @param integer $id
     * @param array $fields
     * @return \StdClass
     * @throws \Exception
     */
    public function getPulse($id, $fields = ['*'])
    {
        $API_URL = $this->getEndpoint('pulses');
        $API_URL .= $id;

        $params = array(
            'fields' => implode(',', $fields)
        );

        $apiData = $this->api_get($API_URL, $params);

        return $this->decodeSingle($apiData);
    }

    /**
     * Search pulses by title
     *
     * @param array $fields
     * @param integer $limit
     * @param integer $offset
     * @return \StdClass
     * @throws \Exception
     */
    public function fetchPulses($fields = ['*'], $limit = 10, $offset = 0)
    {
        $API_URL = $this->getEndpoint('pulses');

        $params = array(
            'fields' => implode(',', $fields),
            'limit' => $limit,
            'offset' => $offset
        );

        $apiData = $this->api_get($API_URL, $params);

        return $this->decodeMultiple($apiData);
    }

    /**
     * Get collection information by ID
     *
     * @param integer $id
     * @param array $fields
     * @return \StdClass
     * @throws \Exception
     */
    public function getCollection($id, $fields = ['*'])
    {
        $API_URL = $this->getEndpoint('collections');
        $API_URL .= $id;

        $params = array(
            'fields' => implode(',', $fields)
        );

        $apiData = $this->api_get($API_URL, $params);

        return $this->decodeSingle($apiData);
    }

    /**
     * Search collections by name
     *
     * @param string $search
     * @param array $fields
     * @param integer $limit
     * @param integer $offset
     * @return \StdClass
     * @throws \Exception
     */
    public function searchCollections($search, $fields = ['*'], $limit = 10, $offset = 0)
    {
        $API_URL = $this->getEndpoint('collections');

        $params = array(
            'fields' => implode(',', $fields),
            'limit' => $limit,
            'offset' => $offset,
            'search' => $search,
        );

        $apiData = $this->api_get($API_URL, $params);

        return $this->decodeMultiple($apiData);
    }

    /**
     * Get themes information by ID
     *
     * @param integer $id
     * @param array $fields
     * @return \StdClass
     * @throws \Exception
     */
    public function getTheme($id, $fields = ['name', 'slug', 'url'])
    {
        $API_URL = $this->getEndpoint('themes');
        $API_URL .= $id;

        $params = array(
            'fields' => implode(',', $fields)
        );

        $apiData = $this->api_get($API_URL, $params);

        return $this->decodeSingle($apiData);
    }

    /**
     * Search themes by name
     *
     * @param string $search
     * @param array $fields
     * @param integer $limit
     * @param integer $offset
     * @return \StdClass
     * @throws \Exception
     */
    public function searchThemes($search, $fields = ['name', 'slug', 'url'], $limit = 10, $offset = 0)
    {
        $API_URL = $this->getEndpoint('themes');

        $params = array(
            'fields' => implode(',', $fields),
            'limit' => $limit,
            'offset' => $offset,
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
    public function getEndpoint($name)
    {
        return $this->APIs[$name];
    }

    /**
     * Decode the response from IGDB, extract the single resource object.
     * (Don't use this to decode the response containing list of objects)
     *
     * @param  string $apiData the api response from IGDB
     * @throws \Exception
     * @return \StdClass  an IGDB resource object
     */
    public function decodeSingle(&$apiData)
    {
        $resObj = json_decode($apiData);
        if (isset($resObj->status)) {
            $msg = "Error " . $resObj->status . " " . $resObj->message;
            throw new \Exception($msg);
        } else {
            if (!is_array($resObj) || count($resObj) == 0) {
                return false;
            } else {
                return $resObj[0];
            }
        }
    }

    /**
     * Decode the response from IGDB, extract the multiple resource object.
     *
     * @param  string $apiData the api response from IGDB
     * @throws \Exception
     * @return \StdClass  an IGDB resource object
     */
    public function decodeMultiple(&$apiData)
    {
        $resObj = json_decode($apiData);
        if (isset($resObj->status)) {
            $msg = "Error " . $resObj->status . " " . $resObj->message;
            throw new \Exception($msg);
        } else {
            //$itemsArray = $resObj->items;
            if (!is_array($resObj)) {
                return false;
            } else {
                return $resObj;
            }
        }
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