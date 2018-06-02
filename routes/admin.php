<?php 

// 	
Route::get('/', function () { 
return view('layouts.admin.welcome');
});

Route::get('users', function() {
	return view('layouts.admin.users');
});

Route::post('users', function() {
	return view('layouts.admin.users');
});

Route::get('posts', 'PostController@index')
	->name('admin.post.index');


