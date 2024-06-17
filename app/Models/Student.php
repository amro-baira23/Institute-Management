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
        'name_en',
        'father_name_en',
        'line_phone_number',
        'mother_name_en',
        'national_number',
        'nationality',
        'education_level',
    ];

    public function person(){
        return $this->belongsTo(Person::class,'person_id','id');
    }
    
    public function courses(){
        return $this->belongsToMany(Course::class, "enrollments", "student_id");
    }
}