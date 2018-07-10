<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\COntrollers\Controller;

class CategoryController extends Controller 

{
	public function index()
	{  
        $this->authorize('view', Category::class);
		$categories = Category::orderby('id', 'ASC')
				->get();

		return view('admin.layouts.primary-reverse', [
            'page' => 'admin.categories',
            'categories' => $categories
        ]); 
	}

    
	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Category::class);
        return view('admin.layouts.primary-reverse', [
            'page' => 'admin.parts.category_edit',
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
        $this->authorize('create', Category::class);
    	$category = new Category;
    	$category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();


        return redirect()->route('admin.categories');
    }

	public function edit($id = null)
	{
        $this->authorize('update', Category::class);
		$category = Category::find($id);

		if ($category === null) {
			abort(404);
		}
		
		return view('admin.layouts.primary-reverse', [
            'page' => 'admin.parts.category_edit',
            'category' => $category,
            'name' => $category->name,
            'slug' => $category->slug,
        ]); 
	}

	public function update (Request $request, $id)
    {
        $this->authorize('update', Category::class);
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return redirect()->route('admin.categories');
    }

	public function delete($id)
	{
        $this->authorize('delete', Category::class);
		try {
            $category = Category::findOrFail($id);
        } catch (\Exception $e) {
            return "Категории с таким id не существует";
        }

        $category->delete();
        
        return redirect()->route('admin.categories');
	}
}