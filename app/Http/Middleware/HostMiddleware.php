<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class HostMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $CompanyId=Session::get('CompanyId');

        if (session()->has('authenticated_user')) {
            $authenticatedUser = session('authenticated_user');

            if($authenticatedUser->company_id = $CompanyId and $authenticatedUser->valid)
            {
                return $next($request);
            }
            // Perform actions based on the authenticated user
        } else {
            return redirect("Hostlogin")->withSuccess('Login details are not valid');
        }

    }
}
