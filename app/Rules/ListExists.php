<?php

namespace App\Rules;

use App\Models\Permission;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ListExists implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(private $table_name)
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $items = explode(',', $value);
        foreach ($items as $item)
           if (!DB::table($this->table_name)->where("id",$item)->exists()){
               return false;
           }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'أحد العناصر المدخلة غير موجود في قاعدة البيانات.';
    }
}
