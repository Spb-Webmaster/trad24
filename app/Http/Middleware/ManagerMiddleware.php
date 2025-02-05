<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ManagerMiddleware
{
    public function handle(Request $request, Closure $next): Response|string
    {

        if (auth()->check()) {
            $user = auth()->user();
            if ($user->manager) {

                return $next($request);
            }
        }



        return redirect(route('cabinet'));
    }
}
