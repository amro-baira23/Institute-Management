<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Enrollment extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected function serializeDate($date)
    {
        return $date->format('Y-m-d h:i:s');
    }
    function student(){
        return $this->belongsTo(Student::class,"student_id");
    }
    function course(){
        return $this->belongsTo(Course::class,"course_id");
    }

    function subaccount(){
        return $this->morphOne(SubAccount::class,"accountable");
    }
}
