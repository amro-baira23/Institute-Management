<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

<<<<<<< HEAD:app/Http/Middleware/ManageTransactionAuthentication.php
class ManageTransactionAuthentication
=======
class ManageAccountingAuthentication
>>>>>>> 928a4515d1fb5b4f825570c251069b7dace30c04:app/Http/Middleware/ManageAccountingAuthentication.php
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
        foreach (Auth::guard('user')->user()->role->permissions as $permission) {
<<<<<<< HEAD:app/Http/Middleware/ManageTransactionAuthentication.php
            if ($permission->name == 'إدارة الصندوق') {
=======
            if ($permission->name == 'إدارة المحاسبة') {
>>>>>>> 928a4515d1fb5b4f825570c251069b7dace30c04:app/Http/Middleware/ManageAccountingAuthentication.php
                return $next($request);
            }
        }

        return error('some thing went wrong', 'you dont have authentication to do it', 401);
    }
}
