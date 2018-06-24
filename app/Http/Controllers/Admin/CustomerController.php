<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\COntrollers\Controller;

class CustomerController extends Controller 

{
	public function index()
	{  
        $this->authorize('view', Customer::class);
		$customers = Customer::orderby('id', 'ASC')
				->get();
		
		return view('admin.layouts.primary-reverse', [
            'page' => 'admin.customers',
            'customers' => $customers
        ]); 
	}
	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $this->authorize('create', Customer::class);
        return view('admin.layouts.primary-reverse', [
            'page' => 'admin.parts.customer_edit',
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {	
        $this->authorize('create', Customer::class);
    	$customer = new Customer;
    	$customer->name = $request->name;
        $customer->surname = $request->surname;
        $customer->birthdate = $request->birthdate;
        $customer->phone = $request->phone;
        $customer->save();

        return redirect()->route('admin.customers');
    }

	public function edit($id)
	{  
        $this->authorize('update', Customer::class);
		$customer = Customer::find($id);

		if ($customer === null) {
			abort(404);
		}

		return view('admin.layouts.primary-reverse', [
            'page' => 'admin.parts.customer_edit',
            'customer' => $customer,
            'name' => $customer->name,
            'surname' => $customer->surname,
            'birthdate' => $customer->birthdate,
            'phone'=>  $customer->phone 
        ]); 
	}

	public function update (Request $request, $id)
    {
        $this->authorize('update', Customer::class);
        $customer = Customer::findOrFail($id); 
        $customer->name = $request->name;
        $customer->surname = $request->surname;
        $customer->birthdate = $request->birthdate;
        $customer->phone = $request->phone;
        $customer->save();
        return redirect()->route('admin.customers');
    }
	
	public function delete($id)
	{  
        $this->authorize('delete', Customer::class);
		try {
			$customer = Customer::findOrFail($id);
		} catch (\Exception $e) {
			return "Покупателя с таким id не существует";
		}

		$customer->delete();
		
		return redirect()->route('admin.customers');
	}
}