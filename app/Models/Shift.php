<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class Shift extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function schedule() {
        return $this->belongsTo(Schedule::class, "schedule_id");
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'shift_id', 'id');
    }
}
