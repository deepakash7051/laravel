<?php
use App\Post;

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

// Route::get('post/{id}/{name}/{age}','PostController@custom');

// Route::get('contact','PostController@contact');

Route::get('/insert',function(){
	DB::insert('insert into post(title,content) values(?,?)',['php with laravel is awesome', 'laravel is the best thing said by Edwin']);
});

// Route::get('/read',function(){
// 	$result = DB::Select('Select * from post where id=?',[1]);
// 	foreach ($result as $post) {
// 		return $post->title;
// 	}
// });

// Route::get('/update', function(){
// 	$result = DB::Update('Update post set title="wvfber" where id=?',[1]);
// 	return $result;
// });

// Route::get('/delete',function(){
// 	$result = DB::DELETE('delete from post where id=?',[1]);
// 	return $result;
// });

Route::get('/', function () {
    return view('welcome');
});

/*-------------------------------*/
	#ELOQUENT
/*-------------------------------*/
Route::get('/read', function(){
	// $post = POST::all();
	// foreach ($post as $value) {
	// 	return $post;
	// }

	/*  OR  */
	$id = 2;
	$post = POST::find($id);
	return $post;
});

Route::get('/findWhere', function(){
	$post = POST::where('id',3)->orderBy('id','desc')->take(1)->get();
	return $post;
});

Route::get('/findMore', function(){
	$post = Post::findOrFail(3);
	return $post;

	//$post = POST::where('user_count', '<', 50)->firstOrFail();
});

Route::get('/basicInsert', function(){
	$post = new Post();
	$post->title = 'Bootstrap';
	$post->content = 'Bootstrap learnoing is important!';
	$post->save();
});

Route::get('/basicUpdate', function(){
	$post = POST::find(4);
	$post->title = "worked on php";
	$post->content = "Working on PHP using Laravel";
	$post->save();
});

Route::get('/create', function(){
	POST::create(['title'=>'the create method', 'content' => 'Wow I\'m learning alot with edwin']);
});

Route::get('/update', function(){
	POST::where('id',2)->where('user_role',0)->update(['title'=>'Learn laravel', 'content'=>'Learning is awesome with Edwin']);
});

Route::get('/delete', function(){
	$post = Post::find(1);
	$post->delete();
});

Route::get('/delete2', function(){
	POST::destroy([2,3]);
		/*Or we can Use*/
	//POST::where('user_role',0)->delete();
});

Route::get('/softdelete', function(){
	POST::find(2)->delete();
});

Route::get('/readSoftData', function(){
	//$post = POST::withTrashed()->where('id',1)->get();
	$post = POST::onlyTrashed()->where('user_role',0)->get();
	return $post;
});

//restore deleted item
Route::get('/restore', function(){
	POST::withTrashed()->where('id', 1)->restore();
});

//force delete
Route::get('/forceDelete', function(){
	POST::withTrashed()->where('id', 1)->forceDelete();
	//POST::onlyTrashed()->where('id', 1)->forceDelete();
});