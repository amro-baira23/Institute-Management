<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockDetail extends Model
{
    use HasFactory;

    protected $table = 'stock_details';
    protected $fillable = [
        'item_id',
        'amount',
        'type',
        'date',
    ];

    public function item(){
        return $this->belongsTo(Stock::class,'item_id','id');
    }
}