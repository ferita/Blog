<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\COntrollers\Controller;

class CustomerController extends Controller 

{
	public function index()
	{
		$customers = Customer::orderby('id', 'ASC')
				->get();
		
		return view('admin.layouts.primary-reverse', [
            'page' => 'admin.customers',
            'customers' => $customers
        ]); 
	}


}