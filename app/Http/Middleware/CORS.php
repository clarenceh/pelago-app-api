<?php
/**
 * Created by PhpStorm.
 * User: clarence
 * Date: 22/4/2016
 * Time: 下午2:08
 */

namespace App\Http\Middleware;

use Closure;

use Log;

class CORS {

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Log::debug('In CORS middleware, request method: ' . $request->method());
        
        return $next($request)->header('Access-Control-Allow-Origin' , '*')
            ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With');
    }

}