<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubAccount extends Model
{
    use HasFactory;

    protected $table = 'sub_accounts';
    protected $fillable = [
        'main_account_id',
        'name',
    ];
}