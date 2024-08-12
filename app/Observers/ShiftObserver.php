<?php

namespace App\Observers;

use App\Models\Activity;
use App\Models\Shift;

class ShiftObserver
{
    /**
     * Handle the Shift "created" event.
     *
     * @param  \App\Models\Shift  $shift
     * @return void
     */
    public function created(Shift $shift)
    {
        $user = auth()->guard("user")->user();
        if (!$user)
            return;
        
        Activity::create([
            "user_id" => $user->id ,
            "operation" => "C",
            "model" => "وردية",
            "desc" => "تم إضافة الوردية " . $shift->name . " " . "من قبل " . $user->username
        ]);
    }

    /**
     * Handle the Shift "updated" event.
     *
     * @param  \App\Models\Shift  $shift
     * @return void
     */
    public function updated(Shift $shift)
    {
        $user = auth()->guard("user")->user();
        if (!$user)
            return;
        
        Activity::create([
            "user_id" => $user->id ,
            "operation" => "U",
            "model" => "وردية",
            "desc" => "تم تحديث معلومات الوردية " . $shift->name . " " . "من قبل " . $user->username
        ]);
    }

    /**
     * Handle the Shift "deleted" event.
     *
     * @param  \App\Models\Shift  $shift
     * @return void
     */
    public function deleted(Shift $shift)
    {
        $user = auth()->guard("user")->user();
        if (!$user)
            return;
        
        Activity::create([
            "user_id" => $user->id ,
            "operation" => "D",
            "model" => "وردية",
            "desc" => "تم أرشفة معلومات الوردية " . $shift->name . " " . "من قبل " . $user->username
        ]);
    }

    /**
     * Handle the Shift "restored" event.
     *
     * @param  \App\Models\Shift  $shift
     * @return void
     */
    public function restored(Shift $shift)
    {
        //
    }

    /**
     * Handle the Shift "force deleted" event.
     *
     * @param  \App\Models\Shift  $shift
     * @return void
     */
    public function forceDeleted(Shift $shift)
    {
        //
    }
}
