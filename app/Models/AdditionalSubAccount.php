<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class AdditionalSubAccount extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subaccount() : MorphOne{
        return $this->morphOne(SubAccount::class,"accountable");
    }
}
