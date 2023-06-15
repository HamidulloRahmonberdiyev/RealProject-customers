<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    public function handle(Request $request, Closure $next, $role_admin): Response
    {
        if ($request->user()->role->name !== $role_admin) {
            abort(403);
        }   
        return $next($request);
    }
}
