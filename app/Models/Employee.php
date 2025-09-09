<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'employees';
    protected $guarded = [];

    protected function serializeDate($date)
    {
        return $date->format('Y-m-d h:i:s');
    }

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }

    
    function subaccount(){
        return $this->morphOne(SubAccount::class,"accountable");
    }
    
    public function user(){
        return $this->belongsTo(User::class,"account_id","id");
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id', 'id');
    }

    public function jobTitle()
    {
        return $this->belongsTo(JobTitle::class, 'job_id',"id");
    }
}