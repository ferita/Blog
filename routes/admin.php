<?php 

Route::get('/', function () {
	if (Gate::denies('admin_dashboard')) {
    	abort(403);
	}

	return redirect()->route('admin.orders');
})->name('admin.welcome');
Route::get('login', 'LoginController@showLoginForm');
Route::post('login', 'LoginController@authenticate');


Route::get('users', 'Admin\UserController@index')->name('admin.users');
Route::get('users/create', 'Admin\UserController@create')->name('admin.user.create');
Route::post('users/create', 'Admin\UserController@store');
Route::get('users/edit/{id}', 'Admin\UserController@edit');
Route::post('users/edit/{id}', 'Admin\UserController@update');
Route::get('users/delete/{id}', 'Admin\UserController@delete');

Route::get('customers', 'Admin\CustomerController@index')->name('admin.customers');;
Route::get('customers/create', 'Admin\CustomerController@create')->name('admin.customer.create');
Route::post('customers/create', 'Admin\CustomerController@store');
Route::get('customers/edit/{id}', 'Admin\CustomerController@edit');
Route::post('customers/edit/{id}', 'Admin\CustomerController@update');
Route::get('customers/delete/{id}', 'Admin\CustomerController@delete');
Route::get('customers/ordersByCustomer/{id}', 'Admin\CustomerController@ordersByCustomer')->name('ordersByCustomer');

Route::get('products', 'Admin\ProductController@index')->name('admin.products');;
Route::get('products/create', 'Admin\ProductController@create')->name('admin.product.create');
Route::post('products/create', 'Admin\ProductController@store');
Route::get('products/edit/{id}', 'Admin\ProductController@edit');
Route::post('products/edit/{id}', 'Admin\ProductController@update');
Route::get('products/delete/{id}', 'Admin\ProductController@delete');

Route::get('categories', 'Admin\CategoryController@index')->name('admin.categories');;
Route::get('categories/create', 'Admin\CategoryController@create')->name('admin.category.create');
Route::post('categories/create', 'Admin\CategoryController@store');
Route::get('categories/edit/{id}', 'Admin\CategoryController@edit');
Route::post('categories/edit/{id}', 'Admin\CategoryController@update');
Route::get('categories/delete/{id}', 'Admin\CategoryController@delete');

Route::get('orders', 'Admin\OrderController@index')->name('admin.orders');;
Route::get('orders/create', 'Admin\OrderController@create')->name('admin.order.create');
Route::post('orders/create', 'Admin\OrderController@store');
Route::get('orders/edit/{id}', 'Admin\OrderController@edit');
Route::post('orders/edit/{id}', 'Admin\OrderController@update');
Route::get('orders/delete/{id}', 'Admin\OrderController@delete');
Route::get('orders/details/{id}', 'Admin\OrderController@show')->name('order.show');

Route::get('settings', 'Admin\SettingController@edit')->name('admin.settings');
Route::post('settings', 'Admin\SettingController@update');

// Route::post('products/create', 'UploadController@processUpload')
//     ->name('site.main.uploadPost');  