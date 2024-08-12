<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $guarded = [];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format("Y-m-d h:i");
    }

    public function role_permissions()
    {
        return $this->hasMany(RolePermission::class, 'role_id', 'id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions', 'role_id');
    }
}
