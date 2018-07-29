<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','LoginController@index');
Route::get('login/logout','LoginController@logout');



Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::group(['prefix' => '', 'middleware' => 'auth'], function(){
    Route::get('home', ['as' => 'app.home', 'uses' => 'AppController@index']);
    Route::get('consulta/{cnpj}',['as' => 'app.consulta', 'uses' => 'AppController@consulta']);
    Route::post('salvar',['as' => 'app.salvar', 'uses' => 'AppController@store']);
    Route::get('listar',['as' => 'app.listar', 'uses' => 'AppController@listar']);
    Route::get('destroy/{id}',['as' => 'app.destroy', 'uses' => 'AppController@destroy']);
});