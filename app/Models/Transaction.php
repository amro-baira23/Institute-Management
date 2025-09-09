<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $guarded = [];

    public function type() : Attribute{
        return Attribute::make(function($value){
            if ($value == "E")
                return "قبض";
            if ($value == "P")
                return "دفع";
        });
    }

    public function subaccount()
    {   
        return $this->belongsTo(SubAccount::class, 'subaccount_id', 'id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }


    public function serializeDate($date){
        return $date->format("Y-m-d h:i");
    }
}
