<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'teachers';
    protected $fillable = [
        'person_id',
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

    public function courses(){
        return $this->hasMany(Course::class,"teacher_id","id");
    }
}