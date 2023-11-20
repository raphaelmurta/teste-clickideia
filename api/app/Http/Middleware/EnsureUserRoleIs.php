<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserRoleIs
{
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->role->value === $role) {
            return $next($request);
        }

        return response()->json(['message' => 'Acesso negado. Permissão insuficiente.'], 403);
    }
}

