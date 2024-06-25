<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'students';
    protected $guarded = [];

    public function person(){
        return $this->belongsTo(Person::class,'person_id','id');
    }
    
    public function courses(){
        return $this->belongsToMany(Course::class, "enrollments", "student_id");
    }
}