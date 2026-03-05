<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $isAdmin = $user && ($user->hasRole('admin') || $user->role === 'admin');

        if (! $isAdmin) {
            return response()->json(['message' => 'Forbidden: Admins only.'], 403);
        }

        return $next($request);
    }
}
