<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Models\Menurole;
use App\Models\RoleHierarchy;

class RolesController extends Controller
{

    /*
        TO REMOVE

    public function test(){
        //JWTAuth::toUser($token);

        $user = auth()->user();
        return response()->json( $user );
    }
    */

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = DB::table('roles')
        ->leftJoin('role_hierarchy', 'roles.id', '=', 'role_hierarchy.role_id')
        ->select('roles.*', 'role_hierarchy.hierarchy')
        ->orderBy('hierarchy', 'asc')
        ->get();
        return response()->json( $roles );
    }

    public function moveUp(Request $request){
        $element = RoleHierarchy::where('role_id', '=', $request->input('id'))->first();
        $switchElement = RoleHierarchy::where('hierarchy', '<', $element->hierarchy)
            ->orderBy('hierarchy', 'desc')->first();
        if(!empty($switchElement)){
            $temp = $element->hierarchy;
            $element->hierarchy = $switchElement->hierarchy;
            $switchElement->hierarchy = $temp;
            $element->save();
            $switchElement->save();
        }
        return response()->json( ['status' => 'success'] );
    }

    public function moveDown(Request $request){
        $element = RoleHierarchy::where('role_id', '=', $request->input('id'))->first();
        $switchElement = RoleHierarchy::where('hierarchy', '>', $element->hierarchy)
            ->orderBy('hierarchy', 'asc')->first();
        if(!empty($switchElement)){
            $temp = $element->hierarchy;
            $element->hierarchy = $switchElement->hierarchy;
            $switchElement->hierarchy = $temp;
            $element->save();
            $switchElement->save();
        }
        return response()->json( ['status' => 'success'] );
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return response()->json( ['status' => 'success'] );  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:1|max:128'
        ]);
        $role = new Role();
        $role->name = $request->input('name');
        $role->save();
        $hierarchy = RoleHierarchy::select('hierarchy')
        ->orderBy('hierarchy', 'desc')->first();
        if(empty($hierarchy)){
            $hierarchy = 0;
        }else{
            $hierarchy = $hierarchy['hierarchy'];
        }
        $hierarchy = ((integer)$hierarchy) + 1;
        $roleHierarchy = new RoleHierarchy();
        $roleHierarchy->role_id = $role->id;
        $roleHierarchy->hierarchy = $hierarchy;
        $roleHierarchy->save();
        //$request->session()->flash('message', 'Successfully created role');
        return response()->json( ['status' => 'success'] );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $role = Role::where('id', '=', $id)->first();
        return response()->json( array('name' => $role->name) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $role = Role::where('id', '=', $id)->first();
        return response()->json( array(
            'id' => $role->id,
            'name' => $role->name
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:1|max:128'
        ]);
        $role = Role::where('id', '=', $id)->first();
        $role->name = $request->input('name');
        $role->save();
        //$request->session()->flash('message', 'Successfully updated role');
        return response()->json( ['status' => 'success'] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id, Request $request)
    {
        $role = Role::where('id', '=', $id)->first();
        $roleHierarchy = RoleHierarchy::where('role_id', '=', $id)->first();
        $menuRole = Menurole::where('role_name', '=', $role->name)->first();
        if(!empty($menuRole)){
            return response()->json( ['status' => 'rejected'] );
        }else{
            $role->delete();
            $roleHierarchy->delete();
            return response()->json( ['status' => 'success'] );
        }
    }
}
