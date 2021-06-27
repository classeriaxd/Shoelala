<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

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
    public function handle(Request $request, Closure $next, $required_role)
    {
        $user_role = Role::where('role_id', auth()->user()->role_id)->value('name');

        if(auth()->user() && $user_role == $required_role)
        {
            return $next($request);
        }
        else
            return back();
        
    }
}
