<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTime extends Model
{
    use HasFactory;

    protected $table = 'courses_time';
    protected $fillable = [
        'schedule_id',
        'start',
        'end'
    ];
}