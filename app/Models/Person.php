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
        'father_name',
        'mother_name',
        'gender',
        'phone_number',
        'birth_date',
        'type',
    ];

    public function account($type){
        if($type == 'T'){
            return $this->hasOne(Teacher::class,'person_id','id');
        }
    }
}