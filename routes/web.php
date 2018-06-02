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

// Route::get('/', function () { // Route - фасад, get - метод
//     return view('welcome');
// });

Route::get('/', 'MainController@index')
	->name('site.main.index'); // запрос get по / перенаправляем на MainController и его метод index()
Route::get('/test', 'MainController@test');

Route::get('/about', 'MainController@about')
	->name('aboutRoute');

Route::get('/elements', 'MainController@elements');

Route::get('/contact', 'MainController@contact');

Route::get('/db', 'MainController@db');

Route::get('/search-results', 'MainController@search_results');
	
Route::get('/login', 'LoginController@showLoginForm')
	->name('login');

Route::post('/login', 'LoginController@authenticate');

Route::get('/logout', 'LoginController@logout');

Route::get('/signup', 'SignupController@showSignupForm');

Route::post('/signup', 'SignupController@postSignupForm');

Route::group(['prefix'=>'post'], function() {
	Route::get('/', 'MainController@post')
	->name('post');
	Route::get('/create', 'PostController@showCreateForm');
	Route::post('/create', 'PostController@create');
	Route::get('/edit/{id}', 'PostController@showEditForm');
	Route::post('/edit/{id}', 'PostController@edit');
	Route::get('/delete/{id}', 'PostController@delete');
});

Route::get('/404', 'MainController@response404');



// Route::view('/404', '404'); // такой формат подходит для статики

// Route::get('/test', function () {  
//     return 'test';
// });

// Route::get('/about/{id?}', 'MainController@about') // id - необязат.


//Auth::routes();

