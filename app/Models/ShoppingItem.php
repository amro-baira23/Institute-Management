<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingItem extends Model
{
    use HasFactory;

    protected $table = 'shopping_items';
    protected $fillable = [
        'course_id',
        'item_id',
        'list_name',
        'amount',
        'per_student',
        'bought',
    ];

    public function item()
    {
        return $this->belongsTo(Stock::class, 'item_id', 'id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}