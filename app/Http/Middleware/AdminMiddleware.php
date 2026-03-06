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
        // Keep admin check simple and independent of Spatie tables
        $isAdmin = $user && ($user->role === 'admin');

        if (! $isAdmin) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Forbidden: Admins only.'], 403);
            }

            abort(403, 'Forbidden: Admins only.');
        }

        return $next($request);
    }
}
