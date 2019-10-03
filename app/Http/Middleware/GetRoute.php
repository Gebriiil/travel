<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;


use Closure;
use Illuminate\Support\Facades\Auth;

class GetRoute
{
    
    public function handle($request, Closure $next)
    {
        if (!$request->isMethod('get'))
        {
            return redirect(url('/'));
        }

        return $next($request);
    }



}
