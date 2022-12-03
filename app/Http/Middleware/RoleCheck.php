<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleCheck
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (in_array($request->user()->id_role, $roles)) return $next($request);

        if ($request->user()->id_role == 1) return redirect()->route('dashboard');

        return redirect()->route('peminjaman');
    }
}
