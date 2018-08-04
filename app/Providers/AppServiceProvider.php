<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        Schema::defaultStringLength(191);
        
      
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Includes\Interfaces\CounterInterface', // интерфейс 
            'App\Includes\Classes\MyCounter' // реализация интерфейса
        );


        $this->app->singleton('AwesomeCounter', function ($app) {
            return new MyCounter;
        });
        //
    }
}
