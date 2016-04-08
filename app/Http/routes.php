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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=>['web']],function(){
Route::get('/login',['as'=>'login','uses'=>'Authcontroller@login']);	
Route::post('/handleLogin',['as'=>'handleLogin','uses'=>'Authcontroller@handleLogin']);	
Route::get('/logout',['as'=>'logout','uses'=>'Authcontroller@logout']);	
Route::resource('users','UsersController',['only'=>['create','store']]);
Route::get('/home',['middleware'=>'auth','as'=>'home','uses'=>'UsersController@home']);
Route::get('/movie/{moviename}',['middleware'=>'auth','as'=>'moviename','uses'=>'UsersController@lists']);
Route::post('/moviereview','UsersController@review');
});
<<<<<<< HEAD



=======
>>>>>>> 5a56bb704c7b0122d97c745552dab41b0bf93810
