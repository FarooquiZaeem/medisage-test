<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BasicAuth
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
        if (config('basicauth.username') === $request->getUser()
            && config('basicauth.password') === $request->getPassword()) {
            return $next($request);
        }
        return response('Authentication Failed', 401, ['WWW-Authenticate' => 'Basic']);
    }
}
