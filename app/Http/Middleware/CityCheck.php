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
        // print_r($request['city']);
        // dd("show message");
        // if($request->city != 'lahore' && $request->city != 'islamabad' ){
        //     die('your city is not valid. ');
        // }
        if (!in_array(strtolower($request->city), ['lahore', 'islamabad'])) {
    die('your city is not valid.');
}
        return $next($request);
    }
}
