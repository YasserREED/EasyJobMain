<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateSessionData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Validate critical session data to prevent tampering
        if ($request->session()->has('couponid')) {
            $couponId = $request->session()->get('couponid');
            if (!is_numeric($couponId) || $couponId < 1) {
                $request->session()->forget('couponid');
            }
        }

        if ($request->session()->has('region')) {
            $region = $request->session()->get('region');
            if (!is_numeric($region) || !in_array($region, [1, 2, 3])) {
                $request->session()->forget('region');
            }
        }

        if ($request->session()->has('plan')) {
            $plan = $request->session()->get('plan');
            if (!is_numeric($plan) || !in_array($plan, [1, 2, 3])) {
                $request->session()->forget('plan');
            }
        }

        return $next($request);
    }
}
