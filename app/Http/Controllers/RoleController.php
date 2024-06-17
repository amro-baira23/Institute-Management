<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
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
            'role' => $request->role,
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
            'role' => $request->role,
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
        $roles = Role::with('permissions')->query()->when(request("name"),function($query,$name){
            return $query->where("name",$name);
        })->get();
        return success(SimpleListResource::collection($roles), null);
    }

    //Get Role Information Function
    public function getRoleInformation(Role $role)
    {
        return success($role->with('permissions')->find($role->id), null);
    }

    //Delete Role Function
    public function deleteRole(Role $role){
        $role->delete();

        return success(null, 'this role deleted successfully');
    }
}