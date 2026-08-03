<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HrAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!session()->has('user')){
            return redirect()->route('loginPage');
        }

        if(session('user')['role'] != 'hr'){
            abort(403);
        }
        return $next($request);
    }
}
