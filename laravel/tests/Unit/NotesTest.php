<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NotesTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @return void
     */
    public function testCanReadListOfNotes()
    {
        $user = factory('App\User')->create();
        $noteOne = factory('App\Models\Notes')->create();
        $noteTwo = factory('App\Models\Notes')->create();
        $response = $this->actingAs($user, 'api')->get('/api/notes');
        $response->assertStatus(200)->assertJson([
            [
            'title' => $noteOne->title,
            'content' => $noteOne->content,
            ]
        ]);
    }

    /**
     * @return void
     */
    public function testCanReadSingleNote()
    {
        $userOne = factory('App\User')->create();
        $note = factory('App\Models\Notes')->create();
        $noteTwo = factory('App\Models\Notes')->create();
        $response = $this->actingAs($userOne, 'api')->get('/api/notes/' . $note->id );
        $response->assertStatus(200)->assertJson([
            'title' => $note->title,
            'content' => $note->content,
        ]);
    }

    /**
     * @return void
     */
    public function testCanOpenNoteCreateForm()
    {
        $user = factory('App\User')->create();
        $status = factory('App\Models\Status')->create();
        $response = $this->actingAs($user, 'api')->get('/api/notes/create');
        $response->assertStatus(200)->assertJson([
            [
                'value' => $status->id,
                'label' => $status->name,
            ]
        ]);
    }

    /**
     * @return void
     */
    public function testCanCreateNewNote()
    {
        $user = factory('App\User')->create();
        $note = factory('App\Models\Notes')->create();
        $response = $this->actingAs($user)->post('/api/notes',  $note->toArray());
        $this->assertDatabaseHas('notes',['title' => $note->title, 'content' => $note->content]);
    }

    /**
     * @return void
     */
    public function testCanOpenNoteEdition()
    {
        $user = factory('App\User')->create();
        $note = factory('App\Models\Notes')->create();
        $response = $this->actingAs($user)->get('/api/notes/'.$note->id . '/edit');
        $response->assertStatus(200)->assertJson([ 'note' => [
            'title' => $note->title,
            'content' => $note->content,
        ]]);
    }

    /**
     * @return void
     */
    public function testCanEditNote()
    {
        $user = factory('App\User')->create();
        $note = factory('App\Models\Notes')->create();
        $note->title = 'Updated title';
        $note->content = 'Updated content';
        $this->actingAs($user)->put('/api/notes/'.$user->id, $note->toArray());
        $this->assertDatabaseHas('notes',['id'=> $note->id , 'title' => 'Updated title', 'content' => 'Updated content']);
    }

    /**
     * @return void
     */
    public function testCanDeleteNote()
    {
        $user = factory('App\User')->create();
        $note = factory('App\Models\Notes')->create();
        $this->actingAs( $user );
        $this->delete('/api/notes/'.$note->id);
        $this->assertDatabaseMissing('notes',['id'=> $note->id]);
    }

}
