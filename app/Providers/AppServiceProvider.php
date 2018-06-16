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
       // View::share('name', 'Guest'); // это по сути объявление глобальной переменной, на раннем этапе
       // View::share('name', $this->getName());
       // View::share('title', 'Default title');
       // View::share('page', 'login');
        
//         View::composer(['404', 'login'], function ($view) use ($isAuth) {
// первый параметр - views, на которые он распространяется. Работает не на раннем этапе, а в момент рендеринга
// +            if ($isAuth !== true) {
// +                $name =  'guest';
// +            } else {
// +                $name =  'Dima';
// +            }
// +
// +            $view->with('name', $name );
// +        });

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
