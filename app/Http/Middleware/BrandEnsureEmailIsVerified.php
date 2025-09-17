<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class BrandEnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('brand')->user();
        
        if (!$user || (!$user->hasVerifiedEmail() && !$request->routeIs('brand.verification.*'))) {
            return redirect()->route('brand.verification.notice');
        }

        return $next($request);
    }
}
