<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class JobTitle extends Model
{
    use HasFactory;

   protected $guarded =[];

   public function employees() : HasOneOrMany{
        return $this->hasMany("employees", "id");
   }
}
