<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Http\Controllers\homepage\HomepageController;

class HomepageControllerTest extends TestCase
{
    //private $testingClass;

    public function setUp() :void {
        parent::setUp();
        //$this->testingClass = new HomepageController();
    }

    public function testHomepage(){
        $response = $this->get( '/' );
        $response->assertStatus(200);
    }
}