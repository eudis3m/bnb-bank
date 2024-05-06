<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   /* public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }*/

  /*  public function handle(Request $request, Closure $next):Response
{
return $next($request)
//Acrescente as 3 linhas abaixo
->header('Access-Control-Allow-Origin', "*")
->header('Access-Control-Allow-Methods', "PUT, POST, DELETE, GET, OPTIONS")
->header('Access-Control-Allow-Headers', "Access-Control-Allow-Headers':'Content-Type, Origin,  X-Requested-With, Accept, x-client-key, x-client-token, x-client-secret, Authorization");
}*/

public function handle(Request $request, Closure $next)
{
    $response = $next($request);
    $response->headers->set('Access-Control-Allow-Origin', '*');
    $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
    $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, X-Auth-Token, Origin, Authorization');

    return $response;
}
}
