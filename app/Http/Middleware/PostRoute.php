<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;


use Closure;
use Illuminate\Support\Facades\Auth;

class PostRoute
{
    
    public function handle($request, Closure $next)
    {
        if (!$request->isMethod('post'))
        {
            return redirect(url('/'));
        }

        return $next($request);
    }



}
