<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageCertificateAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('user')->user()->is_admin) {
            return $next($request);
        }
        if(Auth::guard('user')->user()->role->permissions != '[]')
        foreach (Auth::guard('user')->user()->role->permissions as $permission) {
            if ($permission->permission == 'إدارة الشهادات') {
                return $next($request);
            }
        }

        return error('some thing went wrong', 'you dont have authentication to do it', 422);
    }
}