<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'persons';
    protected $fillable = [
        'name',
        'last_name',
        'phone_number',
        'birth_date',
        'type',
    ];

    public function teacher()
    {
        return $this->hasOne(Teacher::class, 'person_id', 'id');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'person_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'person_id', 'id');
    }
}
