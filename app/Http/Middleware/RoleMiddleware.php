<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use App\Models\RolePermission;
use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public
    function handle($request, Closure $next)
    {
        $name = $request->route()->action['as'];
        $role = $request->user()->role_id;
        $permission = Permission::where('permission', $name)->first();

        if ($permission) {
            $permissionRole = RolePermission::where('role_id', $role)->where('permission_id', $permission->id)->first();
            if ($permissionRole) {
                return $next($request);
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
}
