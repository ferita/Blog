<?php 

Route::get('/', function () { 
	return view('admin.layouts.primary-reverse', [
	            'page' => 'admin.welcome',
	]); 
})->name('admin.welcome');
Route::get('login', 'LoginController@showLoginForm');
Route::post('login', 'LoginController@authenticate');


Route::get('users', 'Admin\UserController@index')->name('admin.users');
Route::get('users/create', 'Admin\UserController@create')->name('admin.create');
Route::post('users/create', 'Admin\UserController@store');
Route::get('users/edit/{id}', 'Admin\UserController@edit');
Route::post('users/edit/{id}', 'Admin\UserController@update');
Route::get('users/delete/{id}', 'Admin\UserController@delete');


Route::get('customers', 'Admin\CustomerController@index');

Route::get('products', 'Admin\ProductController@index');



