<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Strings;

class RolesMiddleware
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

        $route = $request->path();
        if ( Auth::check() && (Auth::user()->hasPrivelege($route) ))
        {
            return $next($request);
        }
        

        return redirect('home');
    }
}
