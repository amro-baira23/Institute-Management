<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubAccount extends Model
{
    use HasFactory;
    protected $table = 'sub_accounts';
    protected $guarded = [];

    public function name() : Attribute {
        return Attribute::make(
            function(){
                if ($this->accountable_type == AdditionalSubAccount::class)
                    return $this->accountable->name;
                if ($this->accountable_type == Enrollment::class)
                    return $this->accountable->student->person->name;
                if ($this->accountable_type == Teacher::class)
                    return $this->accountable->person->name;
                return null;
            }
        );
    }
    public function accountable(){
        return $this->morphTo();
    }
}
