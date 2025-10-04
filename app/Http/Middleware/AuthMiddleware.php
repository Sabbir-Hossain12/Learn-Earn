<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {

        if (!auth()->check() || (!auth()->user()->hasRole('admin') && !auth()->user()->hasRole('teacher'))) {
            return redirect()->route('admin.login');
        }
        return $next($request);
    }
}
