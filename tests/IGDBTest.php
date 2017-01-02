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
        $TEST_API_KEY = 'xbHBrXHDBVmshH3pw1DVPhS7WAn1p12FAofjsnz8li0LSV3d7o';
        $this->igdb = new IGDB($TEST_API_KEY);
    }

    public function tearDown()
    {
        $this->youtube = null;
    }

    /** @expectException */
    public function invalid_api_key_throws_error ()
    {
        $this->igdb = new IGDB(['key' => 'nonsense']);
        $game_id = 9630;
        $this->igdb->getGame($game_id);

        $this->expectException('\Exception');
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
}