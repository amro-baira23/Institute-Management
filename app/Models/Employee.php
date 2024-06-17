<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $fillable = [
        'person_id',
        'schedule_id',
        'job_name',
        'credentials',
        'salary_amount',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class,"account_id","id");
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class, 'schedule_id', 'id');
    }

    public function jobTitle()
    {
        return $this->belongsTo(JobTitle::class, 'job_title_id', 'id');
    }
}