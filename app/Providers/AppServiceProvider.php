<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use \App\Models\Role;

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
            $user_role = Role::where('role_id', auth()->user()->role_id)->value('name');
            if ( (auth()->user()) && ($user_role == $role) )        
                $isAuth = true;
        return $isAuth;
        });
    }
}
