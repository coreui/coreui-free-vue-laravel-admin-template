<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Menus\Menus;

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
                $roles =  $user->roles;
            }else{
                $roles = '';
            }
        } catch (Exception $e) {
            $roles = '';
        }   
        $menus = new Menus();
        return response()->json( $menus->get( $roles ) );
    }

}

