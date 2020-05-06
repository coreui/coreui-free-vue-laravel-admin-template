<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Menus\GetSidebarMenu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $user = auth()->user();
            if($user && !empty($user)){
                $roles =  $user->menuroles;
            }else{
                $roles = '';
            }
        } catch (Exception $e) {
            $roles = '';
        }
        $menus = new GetSidebarMenu();
        return response()->json($menus->get($roles));
    }

    public function get(Request $request, int $menu_id) {
        $user = Auth::user();
        if($user){
            $roles = $user->roles;
            $menus = [];
            foreach($roles as $role) {
                $menu = $role->menu->whereNull('parent_id')->where('menu_id', $menu_id);
                foreach ($menu as $item) {
                    if ($item->slug == 'dropdown') {
                        $item->elements = $item->children;
                    }
                }
                $menu = (!empty($menu)) ? $menu->toArray() : [];
                $menus = array_merge($menus, $menu);
            }
            return response()->json($menus);
        }else{
            echo "No User";
        }
    }

}

