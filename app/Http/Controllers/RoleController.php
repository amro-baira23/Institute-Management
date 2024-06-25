<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Http\Resources\RoleCollection;
use App\Http\Resources\RoleResource;
use App\Http\Resources\SimpleListResource;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //Add Role Function
    public function addRole(RoleRequest $request)
    {
        $role = Role::create([
            'name' => $request->role,
        ]);

        $permissions = explode(',', $request->permissions);

        foreach ($permissions as $permission)
            RolePermission::create([
                'role_id' => $role->id,
                'permission_id' => $permission
            ]);

        return success(null, 'this role created successfully', 201);
    }

    //Edit Role Function
    public function editRole(Role $role, RoleRequest $request)
    {
        $role->update([
            'name' => $request->role,
        ]);

        foreach ($role->role_permissions as $role_permission)
            $role_permission->delete();

        $permissions = explode(',', $request->permissions);

        foreach ($permissions as $permission)
            RolePermission::create([
                'role_id' => $role->id,
                'permission_id' => $permission
            ]);

        return success(null, 'this role updated successfully');
    }

    //Get Roles Function
    public function getRoles()
    {
        $roles = Role::with('permissions')->when(request("name"),function($query,$name){
            return $query->where("name","LIKE","%".$name."%");
        })->simplePaginate(20);
        return new RoleCollection($roles);
    }

    //Get Role Information Function
    public function getRoleInformation(Role $role)
    {
        $role = $role->load("permissions");
        $response = [];
        $response["role"] = $role->only("id","name");
        $response["permissions"] = $role->permissions->pluck("name");
        return success($response, null);
    }

    //Delete Role Function
    public function deleteRole(Role $role){
        $role->delete();

        return success(null, 'this role deleted successfully',204);
    }
}