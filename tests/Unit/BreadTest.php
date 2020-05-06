<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\Models\Form;
use App\Models\FormField;
use App\Models\Status;

class BreadTest extends TestCase
{
    use DatabaseMigrations;
    use WithFaker;

    public function helperGetTableColumns($tableName){
        $result = array();
        $columns =  DB::getSchemaBuilder()->getColumnListing( $tableName );
        foreach($columns as $column){
            if($column != 'id'){
                array_push($result, $column);
            }
        }
        return $result;
    }

    public function helperCreateStatusRecord(){
        $status = new Status();
        $status->name = 'Lorem ipsum dolor';
        $status->class = 'primary';
        $status->save();
    }

    public function helperCreateFormField($formId, $columnName = 'test', $relation = false){
        $field = new FormField();
        $field->name = $this->faker->word();
        $field->column_name = $columnName;
        $field->type = 'text';
        $field->browse = 1;
        $field->read = 1;
        $field->edit = 1;
        $field->add = 1;
        if($relation){
            $field->relation_table = 'status';
            $field->relation_column = 'name';
        }
        $field->form_id = $formId;
        $field->save();
    }

    public function helperCreateForm($name = 'test'){
        $form = new Form();
        $form->name = $name;
        $form->table_name = 'example';
        $form->read = 1;
        $form->edit = 1;
        $form->add = 1;
        $form->delete = 1;
        $form->pagination = 5;
        $form->save();
        $this->helperCreateStatusRecord();
        $this->helperCreateStatusRecord();
        $this->helperCreateFormField($form->id, 'name');
        $this->helperCreateFormField($form->id, 'description');
        $this->helperCreateFormField($form->id, 'status_id', true);
    }
    
    public function testIndex(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $this->helperCreateForm('Some test name');
        $response = $this->actingAs($user)->get('/api/bread');
        $response->assertStatus(200)->assertJson([
            [
            'name' => 'Some test name',
            ]
        ]);
    }

    public function testStore(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $postData = array(
            'model'     => 'some_not_existing_table_name',
            'marker'    => 'selectModel'
        );
        $response = $this->actingAs($user)->post('/api/bread', $postData);
        $response->assertStatus(200)->assertJson([
            
                'status' => 'lackcolumns',
            
        ]);
    }

    public function testStore2(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $postData = array(
            'model'     => 'example',
            'marker'    => 'selectModel'
        );
        $columns = $this->helperGetTableColumns('example');
        $response = $this->actingAs($user)->post('/api/bread', $postData);
        $response->assertStatus(200)->assertJson([
            'columns' => ['id', 'created_at', 'updated_at', 'name', 'description', 'status_id'],
        ])->assertJson([
            'model' => 'example',
        ])->assertJson([
            'roles' => ['admin'],
        ])->assertSee('checkbox');
    }

    public function testStore3(){
        $user = factory('App\User')->states('admin')->create();
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $postData = array(
            'model'     => 'example',
            'marker'    => 'createForm',
            'name'      => 'form name 1',
            'pagination'=> '5',
            'read'      => 'true',
            'edit'      => 'true',
            'add'       => 'true',
            'delete'    => 'true'
        );
        $columns = $this->helperGetTableColumns('example');
        foreach($columns as $column){
            $postData[$column . '_name'] = 'some name ' . $column;
            $postData[$column . '_field_type'] = 'text';
            $postData[$column . '_relation_table'] = '';
            $postData[$column . '_relation_column'] = '';
            $postData[$column . '_browse'] = '1';
            $postData[$column . '_read'] = '1';
            $postData[$column . '_edit'] = '1';
            $postData[$column . '_add'] = '1';
        }
        $response = $this->actingAs($user)->post('/api/bread', $postData);
        //$response->assertStatus(200);
        //$response->assertSee('Successfully added form');
        $this->assertDatabaseHas('form',[
            'name' => 'form name 1',
            'pagination' => '5',
            'table_name' => 'example',
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
        ]);
        foreach($columns as $column){
            $this->assertDatabaseHas('form_field',[
                'name' => 'some name ' . $column,
                'type' => 'text',
                'column_name' => $column,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'browse' => 1,
            ]);
        }
    }

    public function testEdit(){
        $this->testStore3();
        $user = factory('App\User')->states('admin')->create();
        //Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $response = $this->actingAs($user)->get('/api/bread/1/edit');
        $response->assertStatus(200)->assertJson([
            'roles'   => ['admin'],
        ])->assertJson([
            "formRoles"=> []
        ])->assertJson([
            'form' => ['name' => 'form name 1']
        ])->assertSee('some name name');
    }

    public function testUpdate(){
        $this->testStore3();
        $user = factory('App\User')->states('admin')->create();
        //Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $postData = array(
            'model'     => 'example',
            'marker'    => 'createForm',
            'name'      => 'Updated Form Name',
            'pagination'=> '7',
        );
        $columns = FormField::where('form_id', '=', 1)->get();
        foreach($columns as $column){
            $postData[$column->id . '_name'] = 'updated name ' . $column->column_name;
            $postData[$column->id . '_field_type'] = 'updated';
            $postData[$column->id . '_relation_table'] = '';
            $postData[$column->id . '_relation_column'] = '';
        }
        $response = $this->actingAs($user)->put('/api/bread/1', $postData);
        $this->assertDatabaseHas('form',[
            'name' => 'Updated Form Name',
            'pagination' => '7',
            'table_name' => 'example',
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
        ]);
        foreach($columns as $column){
            $this->assertDatabaseHas('form_field',[
                'name' => 'updated name ' . $column->column_name,
                'type' => 'updated',
                'column_name' => $column->column_name,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'browse' => 0,
            ]);
        }
    }

    public function testShow(){
        $this->testStore3();
        $user = factory('App\User')->states('admin')->create();
        //Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $response = $this->actingAs($user)->get('/api/bread/1');
        $response->assertStatus(200)->assertJson([
            'form' => ['name' => 'form name 1']
        ])->assertSee('some name name');
    }

    /*
    public function testDelete(){
        $this->testStore3();
        $user = factory('App\User')->states('admin')->create();
        //Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $response = $this->actingAs($user)->delete('/bread/1');
        $response->assertStatus(200);
        $response->assertSee('Are you sure?');
    }
    */

    public function testDelete2(){
        $this->testStore3();
        $user = factory('App\User')->states('admin')->create();
        //Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $form = Form::first();
        $response = $this->actingAs($user)->delete('/api/bread/1');
        $this->assertDatabaseMissing('form',['id' =>  $form->id ]);
        $this->assertDatabaseMissing('form_field',['form_id' => $form->id ]);
    }
}