<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ProductController extends Controller
{
    public function index() 
    {
        $products = DB::table('products')->simplePaginate(6);
        return view('client.layouts.primary-reverse', [
            'page' => 'pages.products',
            'products'=> $products
        ]);
    }

    public function productById($id)
    {

        try {
            $product = Product::find($id);

        } catch (\Exception $e){
            abort(404);
        }
        
        return  view('client.layouts.primary-reverse', [
            'page' => 'pages.product',
            'title' => $product->name,
            'product' => $product
        ]);

    }
    public function productBySlug($slug)
    {
        try {
            $product = Product::where('slug', $slug)
                ->active()
                ->intime()
                ->firstOrFail();

        } catch (\Exception $e){
            abort(404);
        }

        return  view('client.layouts.primary-reverse', [
            'page' => 'pages.product',
            'title' => $product->name,
            'product' => $product
        ]);

    }
}
