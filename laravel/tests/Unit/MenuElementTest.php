<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;
use App\Models\Menulist;
use App\Models\Menus;
use App\Models\Menurole;

class MenuElementTest extends TestCase
{
    use DatabaseMigrations;

    public function testMenuElementsIndex(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $menulist = new Menulist();
        $menulist->name = 'test2';
        $menulist->save();
        $menulist2 = new Menulist();
        $menulist2->name = 'test3';
        $menulist2->save();
        $menus = new Menus();
        $menus->slug = 'link';
        $menus->menu_id = $menulist2->id;
        $menus->name = 'test2';
        $menus->icon = 'test4';
        $menus->href = 'test3';
        $menus->parent_id = null;
        $menus->sequence = 1;
        $menus->save();
        $response = $this->actingAs($user)->get('/api/menu/element?menu=' . $menulist2->id);
        $response->assertStatus(200)->assertJson([
            'menuToEdit' => [
                [
                    'name' => 'test2'
                ]
            ],
            'thisMenu' => '' . $menulist2->id,
        ]);
    }

    public function testMenuCreate(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'test']);
        $user->assignRole('admin');
        $menulist = new Menulist();
        $menulist->name = 'test2';
        $menulist->save();
        $response = $this->actingAs($user)->get('/api/menu/element/create');
        $response->assertStatus(200)->assertJson([
            'roles' => ['admin', 'test'],
            'menulist' => [
                ['label' => 'test2']
            ],
        ]);
    }

    public function testMenuStore(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $menulist = new Menulist();
        $menulist->name = 'test2';
        $menulist->save();
        $postArray = [
            'menu' => '1',
            'role' => [
                'admin'
            ],
            'name' => 'test2',
            'type' => 'link',
            'href' => 'test3',
            'parent' => '1',
            'icon' => 'test4', 
        ];
        $response = $this->actingAs($user)->post('/api/menu/element/store', $postArray);
        $this->assertDatabaseHas('menu_role',[
            'role_name' => 'admin',
            'menus_id' => 1,
        ]);
        $this->assertDatabaseHas('menus',[
            'slug' => 'link',
            'menu_id' => 1,
            'name' => 'test2',
            'icon' => 'test4',
            'href' => 'test3',
            'parent_id' => 1,
            'sequence' => 1,
        ]);
    }

    public function testMenuEdit(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'test']);
        $user->assignRole('admin');
        $menulist = new Menulist();
        $menulist->name = 'test2';
        $menulist->save();
        $menus = new Menus();
        $menus->slug = 'link';
        $menus->menu_id = 1;
        $menus->name = 'test2menus';
        $menus->icon = 'test4';
        $menus->href = 'test3';
        $menus->parent_id = null;
        $menus->sequence = 1;
        $menus->save();
        $menuRole = new Menurole();
        $menuRole->role_name = 'admin';
        $menuRole->menus_id = $menus->id;
        $menuRole->save();
        $response = $this->actingAs($user)->get('/api/menu/element/edit?id=1' );
        $response->assertStatus(200)->assertJson([
            'roles' => ['admin', 'test'],
            'menulist' => [
                ['label' => 'test2']
            ],
            'menuElement' => ['name'=>'test2menus'],
            'menuroles' => [
                [
                    'role_name' => 'admin',
                    'menus_id' => '' . $menus->id,
                ]
            ],
        ]);
    }

    public function testMenuUpdate(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $menulist = new Menulist();
        $menulist->name = 'test2';
        $menulist->save();
        $menus = new Menus();
        $menus->slug = 'link';
        $menus->menu_id = 1;
        $menus->name = 'test2';
        $menus->icon = 'test4';
        $menus->href = 'test3';
        $menus->parent_id = null;
        $menus->sequence = 1;
        $menus->save();
        $postArray = [
            'id' => '1',
            'menu' => '1',
            'role' => [
                'admin'
            ],
            'name' => 'test22',
            'type' => 'link',
            'href' => 'test33',
            'parent' => '2',
            'icon' => 'test44', 
        ];
        $this->assertDatabaseHas('menus',[
            'slug' => 'link',
            'menu_id' => 1,
            'name' => 'test2',
            'icon' => 'test4',
            'href' => 'test3',
            'parent_id' => null,
            'sequence' => 1,
        ]);
        $response = $this->actingAs($user)->post('/api/menu/element/update', $postArray);
        $this->assertDatabaseHas('menu_role',[
            'role_name' => 'admin',
            'menus_id' => 1,
        ]);
        $this->assertDatabaseHas('menus',[
            'slug' => 'link',
            'menu_id' => 1,
            'name' => 'test22',
            'icon' => 'test44',
            'href' => 'test33',
            'parent_id' => 2,
            'sequence' => 1,
        ]);
    }

    public function testMenuDelete(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $menus = new Menus();
        $menus->slug = 'link';
        $menus->menu_id = 1;
        $menus->name = 'test2';
        $menus->icon = 'test4';
        $menus->href = 'test3';
        $menus->parent_id = 1;
        $menus->sequence = 1;
        $menus->save();
        $menuRole = new Menurole();
        $menuRole->role_name = 'admin';
        $menuRole->menus_id = $menus->id;
        $menuRole->save();
        $this->assertDatabaseHas('menus',['id' => $menus->id]);
        $response = $this->actingAs($user)->get('/api/menu/element/delete?id=' . $menus->id);
        $this->assertDatabaseMissing('menus',['id' => $menus->id]);
        $this->assertDatabaseMissing('menu_role',['menus_id' => $menus->id]);
    }

    public function testMoveUp(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $menulist = new Menulist();
        $menulist->name = 'test2';
        $menulist->save();
        $menus1 = new Menus();
        $menus1->slug = 'link';
        $menus1->menu_id = 1;
        $menus1->name = 'test2';
        $menus1->icon = 'test4';
        $menus1->href = 'test3';
        $menus1->parent_id = null;
        $menus1->sequence = 10;
        $menus1->save();
        $menus2 = new Menus();
        $menus2->slug = 'link';
        $menus2->menu_id = 1;
        $menus2->name = 'test2';
        $menus2->icon = 'test4';
        $menus2->href = 'test3';
        $menus2->parent_id = null;
        $menus2->sequence = 11;
        $menus2->save();
        $menus3 = new Menus();
        $menus3->slug = 'link';
        $menus3->menu_id = 1;
        $menus3->name = 'test2';
        $menus3->icon = 'test4';
        $menus3->href = 'test3';
        $menus3->parent_id = null;
        $menus3->sequence = 12;
        $menus3->save();
        $this->assertDatabaseHas('menus',[
            'id' => $menus1->id,
            'sequence' => 10,
        ]);
        $this->assertDatabaseHas('menus',[
            'id' => $menus2->id,
            'sequence' => 11,
        ]);
        $this->assertDatabaseHas('menus',[
            'id' => $menus3->id,
            'sequence' => 12,
        ]);
        $response = $this->actingAs($user)->get('/api/menu/element/move-up?id=' . $menus2->id);
        $response->assertStatus(200);
        $this->assertDatabaseHas('menus',[
            'id' => $menus1->id,
            'sequence' => 11,
        ]);
        $this->assertDatabaseHas('menus',[
            'id' => $menus2->id,
            'sequence' => 10,
        ]);
        $this->assertDatabaseHas('menus',[
            'id' => $menus3->id,
            'sequence' => 12,
        ]);
    }
  
    public function testMoveDown(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $menulist = new Menulist();
        $menulist->name = 'test2';
        $menulist->save();
        $menus1 = new Menus();
        $menus1->slug = 'link';
        $menus1->menu_id = 1;
        $menus1->name = 'test2';
        $menus1->icon = 'test4';
        $menus1->href = 'test3';
        $menus1->parent_id = null;
        $menus1->sequence = 10;
        $menus1->save();
        $menus2 = new Menus();
        $menus2->slug = 'link';
        $menus2->menu_id = 1;
        $menus2->name = 'test2';
        $menus2->icon = 'test4';
        $menus2->href = 'test3';
        $menus2->parent_id = null;
        $menus2->sequence = 11;
        $menus2->save();
        $menus3 = new Menus();
        $menus3->slug = 'link';
        $menus3->menu_id = 1;
        $menus3->name = 'test2';
        $menus3->icon = 'test4';
        $menus3->href = 'test3';
        $menus3->parent_id = null;
        $menus3->sequence = 12;
        $menus3->save();
        $this->assertDatabaseHas('menus',[
            'id' => $menus1->id,
            'sequence' => 10,
        ]);
        $this->assertDatabaseHas('menus',[
            'id' => $menus2->id,
            'sequence' => 11,
        ]);
        $this->assertDatabaseHas('menus',[
            'id' => $menus3->id,
            'sequence' => 12,
        ]);
        $response = $this->actingAs($user)->get('/api/menu/element/move-down?id=' . $menus2->id);
        $response->assertStatus(200);
        $this->assertDatabaseHas('menus',[
            'id' => $menus1->id,
            'sequence' => 10,
        ]);
        $this->assertDatabaseHas('menus',[
            'id' => $menus2->id,
            'sequence' => 12,
        ]);
        $this->assertDatabaseHas('menus',[
            'id' => $menus3->id,
            'sequence' => 11,
        ]);
    }

}