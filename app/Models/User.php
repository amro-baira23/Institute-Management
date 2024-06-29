<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute ;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    
    protected $table = 'users';
    protected $fillable = [
        'username',
        'password',
        'role_id',
        'employee_id',
    ];

    public function employee()
    {
        return $this->HasOne(Employee::class, 'account_id',"id" );
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function isAdmin() : Attribute{
        return  Attribute::make(
            get:  fn () => $this->role->name == "مدير",
        );
    }
    
    public function name() : Attribute{
        return Attribute::make(
            fn() => $this->username
        );
    }

    
 
}