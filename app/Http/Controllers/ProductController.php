<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ProductController extends Controller
{
    public function index() 
    {
        $products = DB::table('products')->where('is_active', '1')->simplePaginate(6);

        $categories = Category::all();

        return view('client.layouts.primary-reverse', [
            'page' => 'pages.products',
            'products'=> $products,
            'categories' =>  $categories
        ]);
    }

    public function byCategory($slug)
    {
        $categories = Category::all();
        try {
            $category = Category::where('slug', $slug)
                ->firstOrFail();
        } catch (\Exception $e) {
            abort(404);
        }
        $products = $category->products()
            ->where('is_active', '1')
            ->orderBy('id', 'ASC')
            ->simplePaginate(6);

        return view('client.layouts.primary-reverse', [
            'page' => 'pages.products',
            'title' => 'Товары в категории "' . $category->name . '"',
            'products'=> $products,
            'categories' => $categories
        ]);

    }

    public function productById($id)
    {
        $categories = Category::all();
        try {
            $product = Product::find($id);

        } catch (\Exception $e){
            abort(404);
        }
        
        return  view('client.layouts.primary-reverse', [
            'page' => 'pages.product',
            'title' => $product->name,
            'product' => $product,
            'categories' => $categories
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
