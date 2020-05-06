<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EditMenuViewService;
use App\Services\RolesService;
use App\Models\Menurole;
use App\Models\Menulist;
use App\Models\Menus;

class MenuEditController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of roles.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function index()
    {
        //$roles = explode(',', env("APP_ROLES", 'guest,user,admin'));
        $rolesService = new RolesService();
        $roles = $rolesService->get();
        return response()->json( array('roles' => $roles) );
    }

    public function menuSelected(Request $request){
        $sidebar = new EditMenuViewService();
        return response()->json( array(
            'role' => $request->input('role'),
            'menuToEdit' => $sidebar->getDataForView($request->input('role')),
        ) );
    }

    public function switch(Request $request){
        $menuRole = Menurole::where('role_name', '=', $request->input('role'))
        ->where('menus_id', '=', $request->input('id'))
        ->first();
        if($menuRole){
            $menuRole->delete();
        }else{
            $menuRole = new Menurole();
            $menuRole->role_name = $request->input('role');
            $menuRole->menus_id = $request->input('id');
            $menuRole->save();
        }
        return response()->json( array('success' => true) );
    }
    */

    public function index(){
        return response()->json( array( 'menulist'  => Menulist::all() ) );
    }

    /*
    public function create(){
        return view('dashboard.editmenu.menu.create',[]);
    }
    */

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|min:1|max:64'
        ]);
        $menulist = new Menulist();
        $menulist->name = $request->input('name');
        $menulist->save();
        return response()->json( array('success' => true) );
    }

    public function edit(Request $request){
        return response()->json( array(
            'menulist'  => Menulist::where('id', '=', $request->input('id'))->first()
        ));
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'id'   => 'required',
            'name' => 'required|min:1|max:64'
        ]);
        $menulist = Menulist::where('id', '=', $request->input('id'))->first();
        $menulist->name = $request->input('name');
        $menulist->save();
        return response()->json( array('success' => true) );
    }

    public function delete(Request $request){
        $menus = Menus::where('menu_id', '=', $request->input('id'))->first();
        if(!empty($menus)){
            return response()->json( array('success' => false) );
        }else{
            Menulist::where('id', '=', $request->input('id'))->delete();
            return response()->json( array('success' => true) );
        }
    }
}
