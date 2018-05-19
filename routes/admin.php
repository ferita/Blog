<?php 

// Route::prefix('admin')->group(function() {
Route::get('/', function () { 
return view('layouts.admin.welcome');
});

Route::get('users', function() {
	return view('layouts.admin.users');
});

Route::post('users', function() {
	return view('layouts.admin.users');
});


