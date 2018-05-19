<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class MainController extends Controller
{
    public function index()
    {
    	return view('layouts.primary', [
    		'page' => 'pages.main']);
    }

    public function about()
    {
    	return view('layouts.primary', [
    		'page' => 'pages.about']);
    }

    public function contact()
    {
    	return view('layouts.primary', [
    		'page' => 'pages.feedback']);
    }

     public function elements()
    {
    	return view('layouts.secondary', [
    		'page' => 'pages.elements']);
    }

      public function post()
    {
    	return view('layouts.secondary', [
    		'page' => 'pages.post']);
    }

    public function search_results()
    {
    	return view('layouts.primary', [
    		'page' => 'pages.search-results']);
    }

    public function response404() {
     	return response('<h1>404 Not Found</h1>', 404);
    }

    
   //  public function response1() {
   //  	return response('<h1>404 Not Found</h1>', 404)
	  //   //	->header('Content-Type', 'text/plain')
	 	// 	->header('X-Powered-By', 'Laravel 5.6')
			// ->cookie('mycookie', 'val', 60*24);;
   //  }
}
