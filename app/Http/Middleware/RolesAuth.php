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
    /**
     * Maximum of 3 Roles
     * -Super Admin
     * -Admin
     * -User
     */
    public function handle(Request $request, Closure $next, ...$required_roles)
    {
        $user_role = Role::where('role_id', auth()->user()->role_id)->value('name');
        $isAuth = false;
        foreach($required_roles as $required_role)
        {
            if(auth()->user() && $user_role == $required_role)
            {
                $isAuth = true;
                break 1;
            }
        }
        
        if ($isAuth)
            return $next($request);
        else
            return back();
        
    }
}
