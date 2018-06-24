<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
//use App\Models\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCreatedMail;
use App\Events\OrderWasCreated;
use App\Models\Order;
use App\Models\Customer;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $customer = Customer::where('user_id', $user->id)->firstOrFail();
        return view('client.layouts.secondary', [
            'page' => 'pages.order',
            'customer'=> $customer
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',  
            'name' => 'required|max:32|min:3',
            'shipdate' => 'required|date|after:today'
        ]);  
        $order = Order::create([
            'customer_id' => $request->customer_id,
            'order_amount' => Cart::total(),
            'shipdate' => $request->shipdate,
            'address' => $request->address,
        ]);
        $order_id = $order->id;

        event(
            new OrderWasCreated($request->all(), $order_id)
        );
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
       // $order = Order::firstOrFail($id);

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
        Cart::update($id, $request->quantity);

       // session()->flash('success_message', 'Количество товаров изменилось');
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success_message', 'Товар удален из корзины');
    }
}
