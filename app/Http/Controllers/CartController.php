<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
//use App\Models\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.layouts.secondary', [
            'page' => 'pages.cart']);
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
        $duplicates = Cart::search(function($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', " Этот товар уже был добавлен в корзину");
        }
        Cart::add($request->id, $request->name, 1, $request->price)
            ->associate('App\Models\Product');

        return redirect()->route('cart.index')->with('success_message', "Товар добавлен в корзину");
    }

  
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('parts.cart-table') . view('parts.cart-count');
        //response()->json(['success' => true]);
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
