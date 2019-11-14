<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'api'], function ($router) {
    Route::get('menu', 'MenuController@index');

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('register', 'AuthController@register'); 

    Route::resource('notes', 'NotesController');
    Route::group(['middleware' => 'admin'], function ($router) {
        Route::resource('users', 'UsersController')->except( ['create', 'store'] );
        Route::get('menu/edit', 'MenuEditController@index');
        Route::get('menu/edit/selected', 'MenuEditController@menuSelected');
        Route::get('menu/edit/selected/switch', 'MenuEditController@switch');
    });
});

