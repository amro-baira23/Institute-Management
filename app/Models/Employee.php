<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $fillable = [
        'account_id',
        'shift_id',
        'job_id',
        'credentials',
    ];

    protected function serializeDate($date)
    {
        return $date->format('Y-m-d h:i:s');
    }

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
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