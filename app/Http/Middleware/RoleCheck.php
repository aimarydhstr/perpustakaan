<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleCheck
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if(in_array($request->user()->role_id, $role)) return $next($request);

        return redirect()->back()->withErrors(['name' => 'Anda dilarang mengakses!']);
    }
}
