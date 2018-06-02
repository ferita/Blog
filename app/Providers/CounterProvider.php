<?php

namespace App\Providers;

use App\Includes\Classes\MyCounter;
use Illuminate\Support\ServiceProvider;

class CounterProvider extends ServiceProvider
{
    
    public function boot()
    {
         
        //
    }

    public function register() // в методе register могут быть только привязки (bind, singleton)
    {	
    	        
        //$this->app->bind('AwesomeCounter', function ($app) {
		//     return new MyCounter;
		// });
    }
}
