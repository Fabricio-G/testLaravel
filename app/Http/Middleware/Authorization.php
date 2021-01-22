<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Response;

class Authorization
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
        if (empty($request->header('Authorization'))) {
            return Response::json(['message' => 'No autorizado'], 401);
        }
        return $next($request);
    }
}
