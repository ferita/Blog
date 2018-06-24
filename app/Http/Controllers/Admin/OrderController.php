<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\User;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller 

{
	public function index()
	{  
        $this->authorize('view', Order::class);
		$orders = Order::orderby('id', 'DESC')
				->get();

		return view('admin.layouts.primary-reverse', [
            'page' => 'admin.orders',
            'orders' => $orders
        ]); 
	}

	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $this->authorize('create', Order::class);
        $customers = Customer::all();
        $products = Product::all();
        return view('admin.layouts.primary-reverse', [
            'page' => 'admin.parts.order_create',
            'customers' => $customers,
            'products' => $products
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
        $this->authorize('create', Order::class);
        $user = User::where('email', $request->email)->firstOrFail();
        $customer = Customer::where('user_id', $user->id)->firstOrFail();
        $order = Order::create([
            'customer_id' => $customer->id,
            'address' => $request->address,
            'shipdate' => $request->shipdate,
            'order_amount' => $request->amount,
            'is_paid' => $request->is_paid,
            'is_shipped' => $request->is_shipped,
            'is_active' => $request->is_active,
        ]);
      
    	return redirect()->route('admin.orders');
    }

	public function edit($id = null)
	{
        $this->authorize('update', Order::class);
		$order = Order::findOrFail($id);
        $customer = Customer::findOrFail($order->customer_id);
        $user = User::where('id', $customer->user_id)->first();
        $email = $user->email;

		if ($order === null or $customer == null) {
			abort(404);
		}
		
		return view('admin.layouts.primary-reverse', [
            'page' => 'admin.parts.order_edit',
            'order' => $order,
            'customer' => $customer,
            'email' => $email,
        ]); 
	}

	public function update (Request $request, $id)
    {
        $this->authorize('update', Order::class);
        $order =  Order::findOrFail($id);
        $order->customer_id = $request->customer_id;
        $order->address = $request->address;
        $order->shipdate = $request->shipdate;
        $order->order_amount = $request->amount;
        $order->is_paid = $request->is_paid;
 		$order->is_shipped = $request->is_shipped;
        $order->is_active = $request->is_active;
        $order->save();

        return redirect()->route('admin.orders');
    }

	public function delete($id)
	{
        $this->authorize('delete', Order::class);
		try {
            $order = Order::findOrFail($id);
        } catch (\Exception $e) {
            return "Заказа с таким id не существует";
        }

        $order->delete();
        
        return redirect()->route('admin.orders');
	}
}