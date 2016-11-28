<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next)
    // {
    //     return $next($request);
    // }
    public function handle($request, Closure $next)
    {
        if(Auth::check()) {
            if (Auth::user()->type == 1 || Auth::user()->type == 0)
            {
                return $next($request);  
            }
            return response('Unauthorized.', 401);
            
        }
        return redirect()->guest('login');
        
    }
}
