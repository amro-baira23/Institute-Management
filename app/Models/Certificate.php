<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $table = 'certificates';
    protected $fillable = [
        'certificate',
        'name_ar_x',
        'name_ar_y',
        'name_en_x',
        'name_en_y',
    ];
}