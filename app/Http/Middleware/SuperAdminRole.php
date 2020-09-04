<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Auth;

class SuperAdminRole
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {
        if($request->user()){
            if($request->user()->role == 'superadmin'){
                return $next($request);
            }
            return redirect()->back();
        }
        return redirect()->back();
    }
}
