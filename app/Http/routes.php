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

Route::get('/contact', function () {
    return "Hi! I am contact.";
});

Route::get('/post/{id}', function ($id) {
	return "Hi! This is a post ".$id;
});

Route::get('/post/{id}/{name}', function ($id, $name) {
	return "Hi! This is a post ".$id.":" .$name;
});

Route::get('admin/post/example',['as' => 'admin.home',function(){
	$url = route('admin.home');
	return $url;
}]);
// Route::get('/', function () {
//     return view('welcome');
// });
