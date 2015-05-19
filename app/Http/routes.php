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
//authentication before
use Illuminate\Support\Facades\Auth;

$router->group(['middleware' => 'auth'],function(){
    Route::get('/users', 'UserController@home');
    Route::get('/users/addItem', 'UserController@addItem');
    Route::get('/logout', 'UserController@logout');
    Route::post('/users/me/insertWord', 'WordController@insertWord');
});

Route::get('users/login', 'UserController@authentication');
Route::post('/users/confirm', 'UserController@confirm');
Route::post('users/addUser', 'UserController@addUser');
Route::get('/', 'UserController@index');
Route::get('/loadWord', 'WordController@loadWord');

Route::get('users/create', function(){
   App\User::create(array(
        'username'=>'xuancan',
        'password'=> \Illuminate\Support\Facades\Hash::make('123456')
    ));
    var_dump(Auth::attempt(array(
            'username'=>'xuancan',
            'password'=>'123456'
    )));


});
