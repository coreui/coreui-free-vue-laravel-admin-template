<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use App\Models\Menulist;

class MenuTest extends TestCase
{
    use DatabaseMigrations;

    public function testMenuIndex(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $menulist = new Menulist();
        $menulist->name = 'test2';
        $menulist->save();
        $response = $this->actingAs($user)->get('/api/menu/menu');
        $response->assertStatus(200)->assertJson([
            'menulist' => [
                [
                    'name' => 'test2'
                ]
            ]
        ]);
    }

    public function testMenuStore(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $response = $this->actingAs($user)->post('/api/menu/menu/store',  ['name' => 'test3']);
        $this->assertDatabaseHas('menulist',['name' => 'test3']);
        $response->assertStatus(200);
    }

    public function testMenuEdit(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $menulist = new Menulist();
        $menulist->name = 'test2';
        $menulist->save();
        $response = $this->actingAs($user)->get('/api/menu/menu/edit?id=' . $menulist->id);
        $response->assertStatus(200)->assertJson([
            'menulist' => [
                'name' => 'test2'
            ]
        ]);
    }

    public function testMenuUpdate(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $menulist = new Menulist();
        $menulist->name = 'test2';
        $menulist->save();
        $this->assertDatabaseHas('menulist',['name' => 'test2']);
        $response = $this->actingAs($user)->post('/api/menu/menu/update',  ['id' => $menulist->id, 'name' => 'test3']);
        $this->assertDatabaseHas('menulist',['name' => 'test3']);
    }

    public function testMenuDelete(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $menulist = new Menulist();
        $menulist->name = 'test2';
        $menulist->save();
        $this->assertDatabaseHas('menulist',['name' => 'test2']);
        $response = $this->actingAs($user)->get('/api/menu/menu/delete?id=' . $menulist->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('menulist',['name' => 'test2']);
    }

}