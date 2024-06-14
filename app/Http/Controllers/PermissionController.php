<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //Get Permissions Function
    public function getPermissions()
    {
        $permissions = Permission::get();

        return success($permissions, null);
    }

    //Get Permission Information Function
    public function getPermissionInformation(Permission $permission)
    {
        return success($permission, null);
    }
}
