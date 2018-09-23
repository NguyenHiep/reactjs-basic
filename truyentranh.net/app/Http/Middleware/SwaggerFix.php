<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SwaggerFix
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (strpos($request->headers->get("Authorization"), "Bearer ") === false) {
            $request->headers->set("Authorization", "Bearer " . $request->headers->get("Authorization"));
        }
        $response = $next($request);
        return $response;
    }
}
