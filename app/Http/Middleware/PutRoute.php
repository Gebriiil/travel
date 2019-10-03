<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;


use Closure;
use Illuminate\Support\Facades\Auth;

class PutRoute
{
    
    public function handle($request, Closure $next)
    {
        if (!$request->isMethod('put'))
        {
            return redirect(url('/'));
        }

        return $next($request);
    }



}
