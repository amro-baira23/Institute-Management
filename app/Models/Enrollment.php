<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Enrollment extends Model
{
    use HasFactory;
    protected $guarded = [];
    const UPDATED_AT = NULL;
    const CREATED_AT = NULL;
    
    function student(){
        return $this->belongsTo(Student::class,"student_id");
    }
    function subaccount(){
        return $this->morphOne(SubAccount::class,"accountable");
    }
}
