<?php

namespace App\Http\Middleware;

use Closure;

class IsSuperAdmin
{
    public function handle($request, Closure $next)
    {
        if (!auth()->user()->admin) {
            return redirect('/');
        }

        return $next($request);
    }
}
