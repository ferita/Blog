<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCreatedMail;
use App\Events\OrderWasCreated;
use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderProduct;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = Auth::user();
        // $customer = Customer::where('user_id', $user->id)->firstOrFail();
        return view('client.layouts.secondary', [
            'page' => 'pages.order',
         //   'customer'=> $customer
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
        $customer = Customer::where('user_id', Auth::user()->id)->first();

        if(!$customer) {
            $this->validate($request, [
                'name' => 'required|max:32|min:3',
                'surname' => 'required|max:32|min:2'            
            ]);
            $customer = Customer::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'surname' => $request->surname,
                'phone' => $request->phone,
            ]);
        }
        $this->validate($request, [
            'shipdate' => 'required|date|after:today'
        ]);
        if ($request->phone !== null) {
            $customer->phone = $request->phone;
            $customer->save();
        }
        $order = Order::create([
            'customer_id' => $customer->id,
            'order_amount' => Cart::total(),
            'shipdate' => $request->shipdate,
            'address' => $request->address,
        ]);
        $order_id = $order->id;

        // Mail::to($request->email)->send(new OrderCreatedMail($request->all(), $order_id, $order)); 
        
        // Заполняем таблицу order_product

        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order_id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty
            ]);
        }

        event(
            new OrderWasCreated($request->all(), $order_id, $order)
        );
        Cart::destroy();
        return view('client.layouts.secondary', [
            'page' => 'parts.blank',
            'title' => 'Заказ подтвержден',
            'content' => 'Заказ подтвержден. Спасибо, что выбрали наш магазин!',
            
        ]);
    }

  
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
}
