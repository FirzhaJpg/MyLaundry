<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (!Auth::check()) {
            abort(401);
        }

        $roleName = Auth::user()?->role?->name;

        if ($roleName === null || !in_array($roleName, $roles, true)) {
            abort(403);
        }

        return $next($request);
    }
}
