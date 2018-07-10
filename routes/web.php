<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'MainController@index')
	->name('site.main.index'); 
Route::get('/test', 'MainController@test');
Route::get('/contacts', 'MainController@contacts')
	->name('contactsRoute');
Route::get('/elements', 'MainController@elements');
Route::get('/feedback', 'MainController@feedback')->name('feedback');
Route::post('/feedback', 'MainController@feedbackPost')->name('feedbackPost');
Route::get('/db', 'MainController@db');
Route::get('/search-results', 'MainController@search_results');


Route::get('/products', 'ProductController@index')
	->name('products.index');
Route::get('/products/{id}', 'ProductController@productById')
	->name('productOne');
Route::get('/products/category/{slug}', 'ProductController@byCategory')
	->name('productByCategory');


Route::get('/cart', 'CartController@index')
	->name('cart.index');
Route::post('/cart', 'CartController@store')
	->name('cart.store');
Route::patch('/cart/{id}', 'CartController@update')
	->name('cart.update');
Route::delete('/cart/{id}', 'CartController@destroy')
	->name('cart.destroy');

Route::get('/order', 'OrderController@index')
	->name('order.index')->middleware('auth');
Route::post('/order', 'OrderController@store')
	->name('order.store');

	
Route::get('/login', 'LoginController@showLoginForm')
	->name('login');
Route::post('/login', 'LoginController@authenticate');
Route::get('/logout', 'LoginController@logout');
Route::get('/signup', 'SignupController@showSignupForm');
Route::post('/signup', 'SignupController@postSignupForm');


Route::get('/lk', 'Cabinet\ServicesController@index')
	->name('lk')->middleware('auth');
Route::get('/lk/orders', 'Cabinet\ServicesController@index')
	->name('lk')->middleware('auth');
Route::get('/lk/orders/cancel/{id}', 'Cabinet\ServicesController@cancel')
	->name('lk.order.cancel')->middleware('auth');
Route::get('/lk/orders/details/{id}', 'Cabinet\ServicesController@show')
	->name('lk.order.show')->middleware('auth');
Route::get('/lk/profile', 'Cabinet\ServicesController@profile')
	->name('lk.profile')->middleware('auth');
Route::post('/lk/profile', 'Cabinet\ServicesController@profileUpdate')
	->middleware('auth');

Route::get('/404', 'MainController@response404')->name('404');
Route::get('/relations', 'MainController@relations');


// Route::group(['prefix'=>'post'], function() {
// 	Route::get('/', 'MainController@post')
// 	->name('post');
// 	Route::get('/create', 'PostController@showCreateForm');
// 	Route::post('/create', 'PostController@create');
// 	Route::get('/edit/{id}', 'PostController@showEditForm');
// 	Route::post('/edit/{id}', 'PostController@edit');
// 	Route::get('/delete/{id}', 'PostController@delete');
// });