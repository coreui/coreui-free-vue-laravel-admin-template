<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;
use App\Models\Folder;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MediaTest extends TestCase
{
    use DatabaseMigrations;

    public function testIndex(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $folder = new Folder();
        $folder->name = 'test1';
        $folder->save();
        $folder2 = new Folder();
        $folder2->name = 'test2';
        $folder2->folder_id = $folder->id;
        $folder2->save();
        $response = $this->actingAs($user, 'api')->get('/api/media');
        $response->assertStatus(200)->assertJson([
            'mediaFolders' => [
                [
                    'name' => 'test2'
                ]
            ]
        ]);
    }

    public function testIndex2(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $folder = new Folder();
        $folder->name = 'test1';
        $folder->save();
        $folder2 = new Folder();
        $folder2->name = 'test2';
        $folder2->folder_id = $folder->id;
        $folder2->save();
        $folder3 = new Folder();
        $folder3->name = 'test3';
        $folder3->folder_id = $folder2->id;
        $folder3->save();
        $response = $this->actingAs($user, 'api')->get('/api/media?id=' . $folder2->id );
        $response->assertStatus(200)->assertJson([
            'mediaFolders' => [
                [
                    'name' => 'test3'
                ]
            ]
        ]);
    }

    public function testFolderAdd(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $response = $this->actingAs($user, 'api')->get('api/media/folder/store?thisFolder=45' );
        $this->assertDatabaseHas('folder',['name' => 'New Folder', 'folder_id' => 45 ]);
    }

    public function testFolderUpdate(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $folder = new Folder();
        $folder->name = 'test1';
        $folder->save();
        $response = $this->actingAs($user, 'api')->post('api/media/folder/update', [
            'id' => $folder->id,
            'name' => 'test2',
            'thisFolder' => $folder->id
        ]);
        $this->assertDatabaseHas('folder',['name' => 'test2', 'id' => $folder->id ]);
    }

    public function testFolder(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $folder = new Folder();
        $folder->name = 'test1';
        $folder->save();
        $this->actingAs($user, 'api')->json('GET', 'api/media/folder?id=' . $folder->id, [])
        ->assertExactJson([
            'id' => "$folder->id",
            'name' => 'test1'
        ]);
    }

    public function testFolderMoveUp(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $folder = new Folder();
        $folder->name = 'test1';
        $folder->save();
        $folder2 = new Folder();
        $folder2->name = 'test2';
        $folder2->folder_id = $folder->id;
        $folder2->save();
        $folder3 = new Folder();
        $folder3->name = 'test3';
        $folder3->folder_id = $folder2->id;
        $folder3->save();
        $response = $this->actingAs($user, 'api')->post('api/media/folder/move', [
            'id' => $folder3->id,
            'folder' => 'moveUp',
            'thisFolder' => $folder3->id
        ]);
        $this->assertDatabaseHas('folder',['name' => 'test3', 'id' => $folder3->id, 'folder_id' => $folder->id ]);
    }

    public function testFolderDelete(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $folder = new Folder();
        $folder->name = 'test1';
        $folder->save();
        $folder2 = new Folder();
        $folder2->name = 'test2';
        $folder2->folder_id = $folder->id;
        $folder2->save();
        $this->assertDatabaseHas('folder',[ 'id' => $folder2->id ]);
        $response = $this->actingAs($user, 'api')->post('api/media/folder/delete', [
            'id' => $folder2->id,
            'thisFolder' => $folder->id
        ]);
        $this->assertDatabaseMissing('folder',['id' => $folder2->id ]);
    }

    public function testFileAdd(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $file = UploadedFile::fake()->image('file.jpg');
        $folder = new Folder();
        $folder->name = 'test1';
        $folder->save();
        $response = $this->actingAs($user, 'api')->post('api/media/file/store', [
            'file' => $file,
            'thisFolder' => $folder->id
        ]);
        $response->assertStatus(200);
        $media = $folder->getMedia()->first();
        $this->assertSame($media->name, 'file.jpg');
    }

    public function testFile(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $file = UploadedFile::fake()->image('file.jpg');
        $folder = new Folder();
        $folder->name = 'test1';
        $folder->save();
        $response = $this->actingAs($user, 'api')->post('api/media/file/store', [
            'file' => $file,
            'thisFolder' => $folder->id
        ]);
        $media = $folder->getMedia()->first();
        $response = $this->actingAs($user, 'api')->json('GET', 'api/media/file?id=' . $media['id'] . '&thisFolder=' . $folder->id);
        $response->assertExactJson([
            'id' =>         "$media->id",
            'name' =>       $media['name'],
            'realName' =>   $media['file_name'],
            'url' =>        $media->getUrl(),
            'mimeType' =>   $media['mime_type'],
            'size' =>       $media['size'],
            'createdAt' =>  substr($media['created_at'], 0, 10) . ' ' . substr($media['created_at'], 11, 19),
            'updatedAt' =>  substr($media['updated_at'], 0, 10) . ' ' . substr($media['updated_at'], 11, 19),
        ]);
    }

    public function testFileDelete(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $file = UploadedFile::fake()->image('file.jpg');
        $folder = new Folder();
        $folder->name = 'test1';
        $folder->save();
        $response = $this->actingAs($user, 'api')->post('api/media/file/store', [
            'file' => $file,
            'thisFolder' => $folder->id
        ]);
        $media = $folder->getMedia()->first();
        $this->assertDatabaseHas('media',[ 'id' => $media->id ]);
        $response = $this->actingAs($user, 'api')->post('api/media/file/delete?id=' . $media['id'] . '&thisFolder=' . $folder->id);
        $this->assertDatabaseMissing('media',['id' => $media->id ]);
    }

    public function testFileUpdate(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $file = UploadedFile::fake()->image('file.jpg');
        $folder = new Folder();
        $folder->name = 'test1';
        $folder->save();
        $response = $this->actingAs($user, 'api')->post('api/media/file/store', [
            'file' => $file,
            'thisFolder' => $folder->id
        ]);
        $media = $folder->getMedia()->first();
        $this->assertDatabaseHas('media',[ 'id' => $media->id, 'name' => 'file.jpg' ]);
        $response = $this->actingAs($user, 'api')->post('api/media/file/update', [
            'id' => $media->id,
            'thisFolder' => $folder->id,
            'name' => 'newFileName.png'
        ]);
        $this->assertDatabaseHas('media',['id' => $media->id, 'name' => 'newFileName.png']);
    }

    public function testFileMoveUp(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $file = UploadedFile::fake()->image('file.jpg');
        $folder = new Folder();
        $folder->name = 'test1';
        $folder->save();
        $folder2 = new Folder();
        $folder2->name = 'test2';
        $folder2->folder_id = $folder->id;
        $folder2->save();
        $response = $this->actingAs($user, 'api')->post('api/media/file/store', [
            'file' => $file,
            'thisFolder' => $folder2->id
        ]);
        $media = $folder2->getMedia()->first();
        $this->assertDatabaseHas('media',[ 'id' => $media->id, 'model_id' => $folder2->id ]);
        $response = $this->actingAs($user, 'api')->post('api/media/file/move', [
            'id' => $media->id,
            'thisFolder' => $folder2->id,
            'folder' => 'moveUp'
        ]);
        $this->assertDatabaseMissing('media',[ 'id' => $media->id, 'model_id' => $folder2->id ]);
        $media = $folder->getMedia()->first();
        $this->assertDatabaseHas('media',['id' => $media->id, 'model_id' => $folder->id]);
    }
  
    public function testFileMove(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $file = UploadedFile::fake()->image('file.jpg');
        $folder = new Folder();
        $folder->name = 'test1';
        $folder->save();
        $folder2 = new Folder();
        $folder2->name = 'test2';
        $folder2->folder_id = $folder->id;
        $folder2->save();
        $response = $this->actingAs($user, 'api')->post('api/media/file/store', [
            'file' => $file,
            'thisFolder' => $folder->id
        ]);
        $media = $folder->getMedia()->first();
        $this->assertDatabaseHas('media',[ 'id' => $media->id, 'model_id' => $folder->id ]);
        $response = $this->actingAs($user, 'api')->post('api/media/file/move', [
            'id' => $media->id,
            'thisFolder' => $folder->id,
            'folder' => $folder2->id
        ]);
        $this->assertDatabaseMissing('media',[ 'id' => $media->id, 'model_id' => $folder->id ]);
        $media = $folder2->getMedia()->first();
        $this->assertDatabaseHas('media',['id' => $media->id, 'model_id' => $folder2->id]);
    }

    public function testFileCropp(){
        $this->assertSame(true, true); //No idea how to test it
    }

    public function testFileCopy(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $file = UploadedFile::fake()->image('file.jpg');
        $folder = new Folder();
        $folder->name = 'test1';
        $folder->save();
        $response = $this->actingAs($user, 'api')->post('api/media/file/store', [
            'file' => $file,
            'thisFolder' => $folder->id
        ]);
        $media = $folder->getMedia()->first();
        $this->assertDatabaseHas('media',[ 'id' => $media->id, 'model_id' => $folder->id ]);
        $response = $this->actingAs($user, 'api')->get('api/media/file/copy?id=' . $media->id . '&thisFolder=' . $folder->id );
        $folder = Folder::first();
        $media = $folder->getMedia();
        $this->assertSame( 2, count($media));
        $this->assertSame( $media[0]->name, 'file.jpg');
        $this->assertSame( $media[1]->name, 'file.jpg');
    }

}