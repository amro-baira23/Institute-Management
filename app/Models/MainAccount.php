<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainAccount extends Model
{
    use HasFactory;

    protected $table = 'main_accounts';
    protected $fillable = [
        'name',
    ];

    public function subAccounts()
    {
        return $this->hasMany(SubAccount::class, 'main_account_id', 'id');
    }
}
