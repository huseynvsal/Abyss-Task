<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasValidSignature
{
    public function handle(Request $request, Closure $next)
    {
        if (!request()->hasValidSignature()) {
            abort(401);
        }
        return $next($request);
    }
}
