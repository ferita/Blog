<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\User;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use Carbon\Carbon;


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

    public function show($id)
    {
        $this->authorize('view', Order::class);
        $order = Order::findOrFail($id);
        $products = $order->products;
        $customer = Customer::findOrFail($order->customer_id);
        $user = User::where('id', $customer->user_id)->first();
        $email = $user->email;

        return view('admin.layouts.primary-reverse', [
            'page' => 'admin.parts.order_show',
            'order' => $order,
            'products' => $products,
            'customer' => $customer,
            'email' => $email,
            'is_paid' => $order->is_paid,
            'is_shipped' => $order->is_shipped,
            'is_active' => $order->is_active,
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
       
        return view('admin.layouts.primary-reverse', [
            'page' => 'admin.parts.order_create',
            'users' => User::all(),
            'customers' => Customer::all(),
            'products' => Product::all()
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
        
        $this->validate($request, [
            'name' => 'required|max:32|min:3',
            'surname' => 'required|max:32|min:2', 
            'email' => 'required|email',  
            'shipdate' => 'required|date|after:today',
            
        ]); 
    
            $user = User::where('email', $request->email)->firstOrFail();
            $customer = $user->customer;
       
        if (!$customer) {
            $customer = Customer::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'surname' => $request->surname,
                'phone' => $request->phone,
            ]);
        } else {
             if ($request->phone !== null) {
                $customer->phone = $request->phone;
                $customer->save();
            }
        }
        $products_id =  $request->products;
        $order_amount = 0;
      
        foreach ($products_id as $product_id) {
            $price = Product::find($product_id)->price;
            $order_amount += $price;
        } 

        $order = Order::create([
            'customer_id' => $customer->id,
            'address' => $request->address,
            'shipdate' => $request->shipdate,
            'order_amount' => $order_amount,
            'is_paid' => $request->is_paid,
            'is_shipped' => $request->is_shipped,
            'is_active' => $request->is_active,
        ]);
       

        // Заполняем таблицу order_product

        foreach ($products_id as $product_id) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $product_id,
                'quantity' => 1, 
            ]);
        }

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
            'is_paid' => $order->is_paid,
            'is_shipped' => $order->is_shipped,
            'is_active' => $order->is_active,
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