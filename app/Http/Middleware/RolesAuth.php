<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use \App\Models\Role;

class RolesAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user_role = Role::findOrFail(auth()->user()->role->name);
        if ($role == $user_role && Auth::check())
            return $next($request);
    }
}
