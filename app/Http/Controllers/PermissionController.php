<?php

namespace App\Http\Controllers;

use App\Http\Resources\SimpleListResource;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //Get Permissions Function
    public function getPermissions()
    {
        $permission = Permission::query()->when(request("name"),function($query,$name){
            return $query->where("name","LIKE",$name);
        })->get();

        return success(SimpleListResource::collection($permission), null);
    }

    //Get Permission Information Function
    public function getPermissionInformation(Permission $permission)
    {
        return success($permission, null);
    }
}
