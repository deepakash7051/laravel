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

Route::get('post/{id}/{name}/{age}','PostController@custom');

Route::get('contact','PostController@contact');

Route::get('/insert',function(){
	DB::insert('insert into post(title,content) values(?,?)',['php with laravel', 'laravel is the best thing']);
});

Route::get('/', function () {
    return view('welcome');
});
