<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\FormService;
use App\Models\Form;
use App\Models\FormField;
use App\Services\RolesService;

class BreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        return response()->json( Form::all() );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'model'       => 'required|min:1|max:128',
            'marker'      => 'required'
        ]);
        $formService = new FormService();
        if($request->has('marker') && $request->input('marker') === 'selectModel'){
            $model = DB::getSchemaBuilder()->getColumnListing($request->input('model'));
            if(empty($model)){
                //$request->session()->flash('message', 'Table not detected, or there is no columns in table');
                return response()->json( ['status' => 'lackcolumns'] );
            }else{
                $rolesService = new RolesService();
                return response()->json( [
                    'columns' => $formService->getFormDataByModel( $request->input('model') ),
                    'options' => $formService->getFormOptions(),
                    'model'   => $request->input('model'),
                    'roles'   => $rolesService->get(),
                ] ); 
            }
        }else{
            $validatedData = $request->validate([
                'name'    => 'required|min:1|max:128',
            ]);
            $formId = $formService->addNewForm($request->input('model'), $request->all() );
            //$request->session()->flash('message', 'Successfully added form');
            return response()->json( ['status' => 'success', 'id' => $formId] );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        return response()->json( [
            'form' => Form::find($id),
            'formFields' => FormField::where('form_id', '=', $id)->get(),    
        ] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $formService = new FormService();
        $rolesService = new RolesService();
        return response()->json([
            'form' => Form::find($id),
            'formFields' => FormField::where('form_id', '=', $id)->get(),
            'options' => $formService->getFormOptions(),
            'roles'   => $rolesService->get(),
            'formRoles' => $formService->getBreadRoles($id),    
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'    => 'required|min:1|max:128',
        ]);
        //$model = Models::find($request->input('model'));
        $formService = new FormService();
        $formService->updateForm($id, $request->all());
        return response()->json( ['status' => 'success'] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $form = Form::find($id);
        $formFields = FormField::where('form_id', '=', $id)->delete();
        $form->delete();
        return response()->json( ['status' => 'success'] );
    }
}
