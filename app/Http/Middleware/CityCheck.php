<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CityCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd('Middleware reached');
        //  dd($request->all());
       $allowedCities = ['lahore', 'islamabad'];

        if (!in_array(strtolower($request->city), $allowedCities)) {
            die('Your city is not valid.');
        }
        return $next($request);
    }
}
