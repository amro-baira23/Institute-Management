<?php

namespace App\Models;

use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = [
        'subject_id',
        'schedule_id',
        'teacher_id',
        'room_id',
        'minimum_students',
        'start_at',
        'end_at',
        'salary_type',
        'salary_amount',
        'cost',
        'status',
    ];

    public function dates() : Attribute{
        return Attribute::make(
            function(mixed $value,array $attributes){
                $days = $this->schedule->days->pluck("day");
                $array = array();
                $range = new DatePeriod(
                    new DateTime($attributes["start_at"]),
                    new DateInterval("P1D"),
                   new DateTime($attributes["end_at"])
                );      
                foreach ($range as $date){
                    if ($days->contains($date->format('N')))
                        $array[] = $date->format("Y-m-d");
                }
                return $array   ;
            }
        );
    }

    protected function serializeDate($date)
    {
        return $date->format('Y-m-d H:i');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id', 'id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
}