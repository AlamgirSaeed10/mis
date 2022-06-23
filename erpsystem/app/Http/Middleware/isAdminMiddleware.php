<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class isAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
               
        if (session()->has('FullName')) 
        {
            return $next($request);
            
        }
      else
      {
        return redirect('login')->with('error', 'Please Login First');
      }
     
    }
}
