<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use App\Models\Menulist;
use App\Models\User;

class MenuTest extends TestCase
{
    use DatabaseMigrations;

    public function testMenuIndex(){
        $user = User::factory()->admin()->create();
        $roleAdmin = Role::create(['name' => 'admin']);
        $user->assignRole($roleAdmin);
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
        $user = User::factory()->admin()->create();
        $roleAdmin = Role::create(['name' => 'admin']);
        $user->assignRole($roleAdmin);
        $response = $this->actingAs($user)->post('/api/menu/menu/store',  ['name' => 'test3']);
        $this->assertDatabaseHas('menulist',['name' => 'test3']);
        $response->assertStatus(200);
    }

    public function testMenuEdit(){
        $user = User::factory()->admin()->create();
        $roleAdmin = Role::create(['name' => 'admin']);
        $user->assignRole($roleAdmin);
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
        $user = User::factory()->admin()->create();
        $roleAdmin = Role::create(['name' => 'admin']);
        $user->assignRole($roleAdmin);
        $menulist = new Menulist();
        $menulist->name = 'test2';
        $menulist->save();
        $this->assertDatabaseHas('menulist',['name' => 'test2']);
        $response = $this->actingAs($user)->post('/api/menu/menu/update',  ['id' => $menulist->id, 'name' => 'test3']);
        $this->assertDatabaseHas('menulist',['name' => 'test3']);
    }

    public function testMenuDelete(){
        $user = User::factory()->admin()->create();
        $roleAdmin = Role::create(['name' => 'admin']);
        $user->assignRole($roleAdmin);
        $menulist = new Menulist();
        $menulist->name = 'test2';
        $menulist->save();
        $this->assertDatabaseHas('menulist',['name' => 'test2']);
        $response = $this->actingAs($user)->get('/api/menu/menu/delete?id=' . $menulist->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('menulist',['name' => 'test2']);
    }

}