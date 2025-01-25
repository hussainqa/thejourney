<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (session()->has('admin_user')) {
            $authenticatedUser = session('admin_user');


            return $next($request);
            // Perform actions based on the authenticated user
        } else {
            return redirect("Hostlogin")->withSuccess('Login details are not valid');
        }

    }
}
