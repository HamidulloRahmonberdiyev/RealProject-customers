<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->role->name == 'admin' || 'manager') {
            return $next($request);
        }
        return abort(403);      
    }
}
