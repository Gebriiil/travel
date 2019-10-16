<?php

namespace App\Http\Middleware;

use Closure;

class Hotel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$permission)
    {
        if(!auth()->guard('admin')->user()->hasPermissionTo($permission.' hotels')){
        
            session()->flash('error_permission',trans('site.added_success'));
            return back();
        }
        return $next($request);
    }
}
