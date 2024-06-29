<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $fillable = [
        'subaccount_id',
        'account',
        'type',
        'amount',
        'note',
    ];

    public function subaccount()
    {
        return $this->belongsTo(SubAccount::class, 'subaccount_id', 'id');
    }

    public function serializeDate($date){
        return $date->format("Y-m-d h:i");
    }
}
