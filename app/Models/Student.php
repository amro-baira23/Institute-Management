<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'students';
    protected $fillable = [
        'person_id',
        'name_ar',
        'name_en',
        'father_name_ar',
        'father_name_en',
        'mobile_phone_number',
        'line_phone_number',
        'mother_name_ar',
        'mother_name_en',
        'national_number',
        'gender',
        'birth_date',
        'nationality',
        'education_level',
    ];

    public function person(){
        return $this->hasOne(Person::class,'person_id','id');
    }
}