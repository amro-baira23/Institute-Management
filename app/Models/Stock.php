<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table = 'stocks';
    protected $fillable = [
        'name',
        'amount',
        'source',
        'note',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format("Y-m-d h:i");
    }
}