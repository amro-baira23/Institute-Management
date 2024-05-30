<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';
    protected $fillable = [];

    public function time()
    {
        return $this->hasOne(CourseTime::class, 'schedule_id', 'id');
    }

    public function days()
    {
        return $this->hasMany(DayOfWeek::class, 'schedule_id', 'id');
    }
}