<?php

namespace App\Http\Controllers\Cabinet;

use App\Models\User;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\OrderCancelledMail;
use App\Events\OrderWasCancelled;
use Carbon\Carbon;


class ServicesController extends Controller
{
	public function index()
	{
		$customer =  Auth::user()->customer;
		
		$orders = Order::where('customer_id', $customer->id)
				->orderBy('id', 'DESC')
				->get();

		return view('client.layouts.lk-primary-reverse', [
			'title' => 'TheCake - личный кабинет',
            'page' => 'client.orders',
            'orders' => $orders
        ]); 
	}

	public function cancel($id, Request $request)
	{
		$order = Order::findOrFail($id);
		$order->is_active = 0;
		$order->save();

		event(
            new OrderWasCancelled($request->all(), $order)
        );

		return redirect()->route('lk')->with('success_message', "Заказ отменен.");
	}

	public function show($id)
    {
        $order = Order::findOrFail($id);
        $products = $order->products;
        $customer = Customer::findOrFail($order->customer_id);
        $user = User::where('id', $customer->user_id)->first();
        $email = $user->email;

        return view('client.layouts.lk-primary-reverse', [
            'page' => 'parts.order_show',
            'order' => $order,
            'products' => $products,
            'customer' => $customer,
            'email' => $email,
            'is_paid' => $order->is_paid,
            'is_shipped' => $order->is_shipped,
            'is_active' => $order->is_active,
        ]); 
    }

    public function profile()
	{  
		$customer =  Auth::user()->customer;

		if ($customer === null) {
			abort(404);
		}

		return view('client.layouts.lk-primary-reverse', [
            'page' => 'parts.lk-profile-edit',
            'customer' => $customer,
            'name' => $customer->name,
            'surname' => $customer->surname,
            'birthdate' => $customer->birthdate,
            'phone'=>  $customer->phone 
        ]); 
	}

	public function profileUpdate(Request $request)
	{  

		$this->validate($request, [
            'name' => 'required|max:32|min:3',
            'surname' => 'required|max:32|min:2',
            'birthdate' => 'date|before:today'

        ]);

        $customer =  Auth::user()->customer;
        $customer->name = $request->name;
        $customer->surname = $request->surname;
        $customer->birthdate = $request->birthdate;
        $customer->phone = $request->phone;
        $customer->save();

		return redirect()->route('lk.profile')->with('success_message', "Профиль обновлен");
	}


}