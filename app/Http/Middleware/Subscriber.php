<?php

namespace App\Http\Middleware;

use Closure;

class Subscriber
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!auth()->guard('admin')->user()->hasPermissionTo('manage subscribers')){
        
            session()->flash('error_permission',trans('site.added_success'));
            return back();
        }
        return $next($request);
    }
}
