<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOnly extends Middleware
{
   public function AdminOnly(Request $request, Closure $next, ...$guards)
   {
    
      
      if (Auth::user()->role_id != 1) {
         return redirect('/');
      }
    
      return $next($request);


   }
}