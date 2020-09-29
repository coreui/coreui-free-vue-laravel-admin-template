<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @return void
     */
    public function testRegularUserCantSeeListOfUsers(){
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/api/users');
        $response->assertStatus(401);
    }

    /**
     * @return void
     */
    public function testRegularUserCantSeeSingleUser(){
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/api/users/' . $user->id );
        $response->assertStatus(401);
    }

    /**
     * @return void
     */
    public function testRegularUserCantOpenEditUserForm(){
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/api/users/'.$user->id . '/edit');
        $response->assertStatus(401);
    }

    /**
     * @return void
     */
    public function testRegularUserCantEditUser(){
        $user = User::factory()->create();
        $response = $this->actingAs($user)->put('/api/users/'.$user->id, $user->toArray());
        $response->assertStatus(401);
    }

    /**
     * @return void
     */
    public function testRegularUserCantDeleteUser(){
        $user = User::factory()->create();
        $response = $this->actingAs($user)->delete('/api/users/'.$user->id);
        $response->assertStatus(401);
    }

    /**
     * @return void
     */
    public function testCanReadListOfUsers()
    {
        $userOne = User::factory()->admin()->create();
        $roleAdmin = Role::create(['name' => 'admin']);
        $userOne->assignRole($roleAdmin);
        $userTwo = User::factory()->create();
        $response = $this->actingAs($userOne, 'api')->get('/api/users');
        $response->assertStatus(200)->assertJson([
            'users' => [
                [
                    'name' => $userOne->name,
                    'email' => $userOne->email,
                ],
                [
                    'name' => $userTwo->name,
                    'email'=> $userTwo->email
                ]
                ],
            'you' => $userOne->id
        ]);
    }

    /**
     * @return void
     */
    public function testCanReadSingleUsers()
    {
        $userOne = User::factory()->admin()->create();
        $roleAdmin = Role::create(['name' => 'admin']);
        $userOne->assignRole($roleAdmin);
        $userTwo = User::factory()->create();
        $response = $this->actingAs($userOne, 'api')->get('/api/users/' . $userTwo->id );
        $response->assertSee($userTwo->name)->assertSee($userTwo->email);
        $response->assertStatus(200)->assertJson([
            'name' => $userTwo->name,
            'email' => $userTwo->email,  
        ]);
    }

    /**
     * @return void
     */
    public function testCanOpenUserEdition()
    {
        $user = User::factory()->admin()->create();
        $roleAdmin = Role::create(['name' => 'admin']);
        $user->assignRole($roleAdmin);
        $response = $this->actingAs($user, 'api')->get('/api/users/'.$user->id . '/edit');
        $response->assertStatus(200)->assertJson([
            'name' => $user->name,
            'email' => $user->email,  
        ]);
    }

    /**
     * @return void
     */
    public function testCanEditUser()
    {
        $user = User::factory()->admin()->create();
        $roleAdmin = Role::create(['name' => 'admin']);
        $user->assignRole($roleAdmin);
        $user->name = 'Updated name';
        $user->email = 'updated@email.com';
        $response = $this->actingAs($user, 'api')->put('/api/users/'.$user->id, $user->toArray());
        $response->assertStatus(200);
        $this->assertDatabaseHas('users',['id'=> $user->id , 'name' => 'Updated name', 'email' => 'updated@email.com']);
    }

    /**
     * @return void
     */
    public function testCanDeleteUser()
    {
        $user = User::factory()->admin()->create();
        $roleAdmin = Role::create(['name' => 'admin']);
        $user->assignRole($roleAdmin);
        $this->actingAs( $user );
        $response = $this->delete('/api/users/'.$user->id);
        $response->assertStatus(200);
        $this->assertSoftDeleted('users',['id'=> $user->id]);
    }

}
