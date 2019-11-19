<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class MenuTest extends TestCase
{
    use DatabaseMigrations;

    /*
        Testing: Route::get('menu', 'MenuController@index');
    */
    public function testEditMenu(){
        $user = factory('App\User')->states('admin')->create();
        $response = $this->actingAs($user, 'api')->get('/api/menu/edit');
        $response->assertStatus(200)->assertJson(['roles' => ['guest', 'user', 'admin']]);
    }

    /*
        Testing: Route::get('menu/selected', 'MenuController@menuSelected')->name('menu.selected');
    */
    public function testMenuSelected(){
        DB::table('menus')->insert([
            'href' => '/href',
            'slug' => 'link',
            'menu_id' => 1,
            'sequence' => 1,
            'name' => 'name',
            'icon' => NULL,
        ]);
        $lastId = DB::getPdo()->lastInsertId();
        DB::table('menu_role')->insert([
            'role_name' => 'guest',
            'menus_id' => $lastId,
        ]);
        $user = factory('App\User')->states('admin')->create();
        $response = $this->actingAs($user, 'api')->get('/api/menu/edit/selected?role=guest');
        $response->assertStatus(200)->assertJson([
            'role' => 'guest',
            'menuToEdit' => [
                [
                    'id' => '1',
                    'slug' => 'link',
                    'name' => 'name',
                    'href' => '/href',
                    'hasIcon' => true,
                    'icon' => NULL,
                    'iconType' => 'coreui',
                    'assigned' => true,
                ]
            ]
        ]);
    }

    /*
        Testing: Route::get('menu/selected/switch', 'MenuController@switch');
    */
    public function testMenuSwitch(){
        $menuElement = factory('App\Menurole')->create();
        $user = factory('App\User')->states('admin')->create();
        $response = $this->actingAs($user, 'api')->get('/api/menu/edit/selected/switch?role=guest&id=' . $menuElement->menus_id);
        $this->assertDatabaseMissing('menu_role',['menus_id' => $menuElement->menus_id, 'role_name' => 'guest']);
        $response = $this->actingAs($user, 'api')->get('/api/menu/edit/selected/switch?role=guest&id=' . $menuElement->menus_id);
        $this->assertDatabaseHas('menu_role',['menus_id' => $menuElement->menus_id, 'role_name' => 'guest']);
    }

}