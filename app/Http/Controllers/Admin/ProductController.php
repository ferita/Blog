<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\COntrollers\Controller;

class ProductController extends Controller 

{
	public function index()
	{
		$products = Product::orderby('id', 'ASC')
				->get();

		return view('admin.layouts.primary-reverse', [
            'page' => 'admin.products',
            'products' => $products
        ]); 
	}
	public function edit($id = null)
	{
		$user = User::find($id);
		

		return  view('admin.layouts.primary-reverse', [
            'page' => 'admin.users',
            'users' => $users
        ]); 
	}

	public function delete($id)
	{
		Post::find($id)->delete();

		return ['result' => 'OK'];
	}
}