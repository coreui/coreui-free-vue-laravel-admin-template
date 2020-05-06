<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();
        if(empty($user) || !$user->hasRole('admin')){
            return response()->json(['message' => 'Unauthenticated. Admin role required'], 401);
        }
        return $next($request);
    }
}
