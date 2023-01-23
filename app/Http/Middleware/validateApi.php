<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class validateApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if( !$request->header('token') ){
            return response()->json([
                'code' => 403,
                'data' => []
            ]);
        }

        if( $request->header('token') != '$2y$10$.QdqixwrQBZ27KJxg3yIJut3j/tqRVp1TJNHrWtgQPYq7muBw5dh2' ){
            return response()->json([
                'code' => 403,
                'data' => []
            ]);
        }

        return $next($request);
    }
}
