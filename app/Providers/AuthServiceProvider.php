<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\User' => 'App\Policies\UserPolicy',
        'App\Models\Customer' => 'App\Policies\CustomerPolicy',
        'App\Models\Product' => 'App\Policies\ProductPolicy',
        'App\Models\Category' => 'App\Policies\CategoryPolicy',
        'App\Models\Order' => 'App\Policies\OrderPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin_dashboard', function ($user) {
            return $user->status === 3 or $user->status ===2;
        });
    }
}
