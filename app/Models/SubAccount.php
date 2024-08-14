<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubAccount extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'sub_accounts';
    protected $guarded = [];


    public function accountable(){
        return $this->morphTo();
    }
    public function transactions(){
        return $this->hasMany(Transaction::class,"subaccount_id","id");
    }

}
