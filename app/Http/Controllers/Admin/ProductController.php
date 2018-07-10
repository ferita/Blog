<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\COntrollers\Controller;

class ProductController extends Controller 

{
	public function index()
	{  
        $this->authorize('view', Product::class);
		$products = Product::orderby('id', 'ASC')
				->get();

		return view('admin.layouts.primary-reverse', [
            'page' => 'admin.products',
            'products' => $products
        ]); 
	}

    
	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Product::class);
        return view('admin.layouts.primary-reverse', [
            'page' => 'admin.parts.product_create',
            'categories' => Category::all(),
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
        $this->authorize('create', Product::class);
    	$product = new Product;
    	$product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->is_active = $request->is_active;
        $product->save();


        return redirect()->route('admin.products');
    }

	public function edit($id = null)
	{
        $this->authorize('update', Product::class);
		$product = Product::find($id);

		if ($product === null) {
			abort(404);
		}
		
		return view('admin.layouts.primary-reverse', [
            'page' => 'admin.parts.product_edit',
            'categories' => Category::all(),
            'product' => $product,
            'name' => $product->name,
            'slug' => $product->slug,
            'description' => $product->description,
            'price' => $product->price,
            'is_active'=> $product->is_active
        ]); 
	}

	public function update (Request $request, $id)
    {
        $this->authorize('update', Product::class);
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
 		$product->is_active = $request->is_active;
        $product->save();

        return redirect()->route('admin.products');
    }

	public function delete($id)
	{
        $this->authorize('delete', Product::class);
		try {
            $product = Product::findOrFail($id);
        } catch (\Exception $e) {
            return "Товара с таким id не существует";
        }

        $product->delete();
        
        return redirect()->route('admin.products');
	}
}