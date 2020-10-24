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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


route::get('/testeo','UsuariosController@index');
route::post('/create','UsuariosController@create');
route::get('/show/{id}','Usuarioscontroller@show');
route::post('/edit/{id}',"Usuarioscontroller@edit");
route::get('/delete/{id}',"Usuarioscontroller@delete");

