<?php

namespace Messerli90\Tests;

require_once __DIR__ . '/../vendor/autoload.php';

use Messerli90\IGDB\IGDB;

class IGDBTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var igdb
     */
    public $igdb;

    public function setUp()
    {
        $TEST_API_KEY = '017ad152466d0ffb55bd8f5b89989491';
        $TEST_URL = 'https://api-2445582011268.apicast.io';
        $this->igdb = new IGDB($TEST_API_KEY, $TEST_URL);
    }

    public function tearDown()
    {
        $this->igdb = null;
    }

    /** @test @expectException */
    public function invalid_api_key_throws_error ()
    {
        $this->expectException('\Exception');

        $this->igdb = new IGDB('nonsense', 'url');
        $game_id = 9630;
        $this->igdb->getGame($game_id);
    }

    /** @test */
    public function get_company_info ()
    {
        $id = 7041;
        $response = $this->igdb->getCompany($id);

        $this->assertEquals($id, $response->id);
        $this->assertNotNull('response');

        $this->assertObjectHasAttribute('name', $response);
        $this->assertObjectHasAttribute('slug', $response);
        $this->assertObjectHasAttribute('url', $response);
    }

    /** @test */
    public function search_companies ()
    {
        $search = 'ubisoft';
        $response = $this->igdb->searchCompanies($search);

        $this->assertNotNull('response');

        $this->assertObjectHasAttribute('name', $response[0]);
        $this->assertObjectHasAttribute('slug', $response[0]);
        $this->assertObjectHasAttribute('url', $response[0]);
    }

    /** @test */
    public function get_character_info ()
    {
        $id = 4534;
        $response = $this->igdb->getCharacter($id);

        $this->assertEquals($id, $response->id);
        $this->assertNotNull('response');

        $this->assertObjectHasAttribute('name', $response);
        $this->assertObjectHasAttribute('slug', $response);
        $this->assertObjectHasAttribute('url', $response);
    }

    /** @test */
    public function search_characters ()
    {
        $search = 'fisher';
        $response = $this->igdb->searchCompanies($search);

        $this->assertNotNull('response');

        $this->assertObjectHasAttribute('name', $response[0]);
        $this->assertObjectHasAttribute('slug', $response[0]);
        $this->assertObjectHasAttribute('url', $response[0]);
    }

    /** @test */
    public function get_franchise_info ()
    {
        $id = 133;
        $response = $this->igdb->getFranchise($id);

        $this->assertEquals($id, $response->id);
        $this->assertNotNull('response');

        $this->assertObjectHasAttribute('name', $response);
        $this->assertObjectHasAttribute('slug', $response);
        $this->assertObjectHasAttribute('url', $response);
    }

    /** @test */
    public function search_franchises ()
    {
        $search = 'Harry Potter';
        $response = $this->igdb->searchFranchises($search);

        $this->assertNotNull('response');

        $this->assertObjectHasAttribute('name', $response[0]);
        $this->assertObjectHasAttribute('slug', $response[0]);
        $this->assertObjectHasAttribute('url', $response[0]);
    }

    /** @test */
    public function get_game_info ()
    {
        $id = 9630;
        $response = $this->igdb->getGame($id);

        $this->assertEquals($id, $response->id);
        $this->assertNotNull('response');

        $this->assertObjectHasAttribute('name', $response);
        $this->assertObjectHasAttribute('slug', $response);
        $this->assertObjectHasAttribute('url', $response);
    }

    /** @test */
    public function search_games ()
    {
        $search = 'fallout';
        $response = $this->igdb->searchGames($search);

        $this->assertNotNull('response');

        $this->assertObjectHasAttribute('name', $response[0]);
        $this->assertObjectHasAttribute('slug', $response[0]);
        $this->assertObjectHasAttribute('url', $response[0]);
    }

    /** @test */
    public function get_game_mode_info ()
    {
        $id = 1;
        $response = $this->igdb->getGameMode($id);

        $this->assertEquals($id, $response->id);
        $this->assertNotNull('response');

        $this->assertObjectHasAttribute('name', $response);
        $this->assertObjectHasAttribute('slug', $response);
        $this->assertObjectHasAttribute('url', $response);
    }

    /** @test */
    public function search_game_modes ()
    {
        $search = 'Single Player';
        $response = $this->igdb->searchGameModes($search);

        $this->assertNotNull('response');

        $this->assertObjectHasAttribute('name', $response[0]);
        $this->assertObjectHasAttribute('slug', $response[0]);
        $this->assertObjectHasAttribute('url', $response[0]);
    }

    /** @test */
    public function get_genre_info ()
    {
        $id = 15;
        $response = $this->igdb->getGenre($id);

        $this->assertEquals($id, $response->id);
        $this->assertNotNull('response');

        $this->assertObjectHasAttribute('name', $response);
        $this->assertObjectHasAttribute('slug', $response);
        $this->assertObjectHasAttribute('url', $response);
    }

    /** @test */
    public function search_genres ()
    {
        $search = 'strategy';
        $response = $this->igdb->searchGenres($search);

        $this->assertNotNull('response');

        $this->assertObjectHasAttribute('name', $response[0]);
        $this->assertObjectHasAttribute('slug', $response[0]);
        $this->assertObjectHasAttribute('url', $response[0]);
    }

    /** @test */
    public function get_keyword_info ()
    {
        $id = 121;
        $response = $this->igdb->getKeyword($id);

        $this->assertEquals($id, $response->id);
        $this->assertNotNull('response');

        $this->assertObjectHasAttribute('name', $response);
        $this->assertObjectHasAttribute('slug', $response);
        $this->assertObjectHasAttribute('url', $response);
    }

    /** @test */
    public function search_keywords ()
    {
        $search = 'sandbox';
        $response = $this->igdb->searchKeywords($search);

        $this->assertNotNull('response');

        $this->assertObjectHasAttribute('name', $response[0]);
        $this->assertObjectHasAttribute('slug', $response[0]);
        $this->assertObjectHasAttribute('url', $response[0]);
    }

    /** @test */
    public function get_person_info ()
    {
        $id = 24354;
        $response = $this->igdb->getPerson($id);

        $this->assertEquals($id, $response->id);
        $this->assertNotNull('response');

        $this->assertObjectHasAttribute('name', $response);
        $this->assertObjectHasAttribute('slug', $response);
        $this->assertObjectHasAttribute('url', $response);
    }

    /** @test */
    public function search_people ()
    {
        $search = 'delaney';
        $response = $this->igdb->searchPeople($search);

        $this->assertNotNull('response');

        $this->assertObjectHasAttribute('name', $response[0]);
        $this->assertObjectHasAttribute('slug', $response[0]);
        $this->assertObjectHasAttribute('url', $response[0]);
    }

    /** @test */
    public function get_platform_info ()
    {
        $id = 49;
        $response = $this->igdb->getPlatform($id);

        $this->assertEquals($id, $response->id);
        $this->assertNotNull('response');

        $this->assertObjectHasAttribute('name', $response);
        $this->assertObjectHasAttribute('slug', $response);
        $this->assertObjectHasAttribute('url', $response);
    }

    /** @test */
    public function search_platforms ()
    {
        $search = 'xbox';
        $response = $this->igdb->searchPlatforms($search);

        $this->assertNotNull('response');

        $this->assertObjectHasAttribute('name', $response[0]);
        $this->assertObjectHasAttribute('slug', $response[0]);
        $this->assertObjectHasAttribute('url', $response[0]);
    }

    /** @test */
    public function get_player_perspective_info ()
    {
        $id = 7;
        $response = $this->igdb->getPlayerPerspective($id);

        $this->assertEquals($id, $response->id);
        $this->assertNotNull('response');

        $this->assertObjectHasAttribute('name', $response);
        $this->assertObjectHasAttribute('slug', $response);
        $this->assertObjectHasAttribute('url', $response);
    }

    /** @test */
    public function search_player_perspective ()
    {
        $search = 'virtual';
        $response = $this->igdb->searchPlayerPerspectives($search);

        $this->assertNotNull('response');

        $this->assertObjectHasAttribute('name', $response[0]);
        $this->assertObjectHasAttribute('slug', $response[0]);
        $this->assertObjectHasAttribute('url', $response[0]);
    }

    /** @test */
    public function get_pulse_info ()
    {
        $id = 20707;
        $response = $this->igdb->getPulse($id);

        $this->assertEquals($id, $response->id);
        $this->assertNotNull('response');

        $this->assertObjectHasAttribute('title', $response);
        $this->assertObjectHasAttribute('summary', $response);
        $this->assertObjectHasAttribute('url', $response);
    }

    /** @test */
    public function fetch_pulses ()
    {
        $response = $this->igdb->fetchPulses();

        $this->assertNotNull('response');

        $this->assertObjectHasAttribute('title', $response[0]);
        $this->assertObjectHasAttribute('summary', $response[0]);
        $this->assertObjectHasAttribute('url', $response[0]);
    }

    /** @test */
    public function get_collection_info ()
    {
        $id = 3;
        $response = $this->igdb->getCollection($id);

        $this->assertEquals($id, $response->id);
        $this->assertNotNull('response');

        $this->assertObjectHasAttribute('name', $response);
        $this->assertObjectHasAttribute('slug', $response);
        $this->assertObjectHasAttribute('url', $response);
    }

    /** @test */
    public function search_collections ()
    {
        $search = 'fallout';
        $response = $this->igdb->searchCollections($search);

        $this->assertNotNull('response');

        $this->assertObjectHasAttribute('name', $response[0]);
        $this->assertObjectHasAttribute('slug', $response[0]);
        $this->assertObjectHasAttribute('url', $response[0]);
    }

    /** @test */
    public function get_theme_info ()
    {
        $id = 39;
        $response = $this->igdb->getTheme($id);

        $this->assertEquals($id, $response->id);
        $this->assertNotNull('response');

        $this->assertObjectHasAttribute('name', $response);
        $this->assertObjectHasAttribute('slug', $response);
        $this->assertObjectHasAttribute('url', $response);
    }

    /** @test */
    public function search_themes ()
    {
        $search = 'warfare';
        $response = $this->igdb->searchThemes($search);

        $this->assertNotNull('response');

        $this->assertObjectHasAttribute('name', $response[0]);
        $this->assertObjectHasAttribute('slug', $response[0]);
        $this->assertObjectHasAttribute('url', $response[0]);
    }
}
