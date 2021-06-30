<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Blade::if('role', function ($role) {
            $isAuth = false;
            if ( (auth()->user()) && (auth()->user()->role->name == $role) )        
                $isAuth = true;
        return $isAuth;
        });
    }
}
