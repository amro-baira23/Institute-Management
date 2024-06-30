<?php

namespace App\Observers;

use App\Models\Activity;
use App\Models\Stock;

class StockObserver
{
    /**
     * Handle the Stock "created" event.
     *
     * @param  \App\Models\Stock  $stock
     * @return void
     */
    public function created(Stock $stock)
    {
        $user1 = auth()->guard("user")->user();
        if (!$user1)
            return;
        
        Activity::create([
            "user_id" => $user1->id ,
            "operation" => "C",
            "model" => "مادة مخزن",
            "desc" => "تم إضافة مادة مخزن باسم " . $stock->username . " " . "من قبل " . $user1->username
        ]);
    }

    /**
     * Handle the Stock "updated" event.
     *
     * @param  \App\Models\Stock  $stock
     * @return void
     */
    public function updated(Stock $stock)
    {
        $user1 = auth()->guard("user")->user();
        if (!$user1)
            return;
        
        Activity::create([
            "user_id" => $user1->id ,
            "operation" => "U",
            "model" => "مادة مخزن",
            "desc" => "تم تحديث معلومات مادة المخزن " . $stock->username . " " . "من قبل " . $user1->username
        ]);
    }

    /**
     * Handle the Stock "deleted" event.
     *
     * @param  \App\Models\Stock  $stock
     * @return void
     */
    public function deleted(Stock $stock)
    {
        $user1 = auth()->guard("user")->user();
        if (!$user1)
            return;
        
        Activity::create([
            "user_id" => $user1->id ,
            "operation" => "D",
            "model" => "مادة مخزن",
            "desc" => "تم أرشفة معلومات مادة المخزن " . $stock->username . " " . "من قبل " . $user1->username
        ]);
    }

    /**
     * Handle the Stock "restored" event.
     *
     * @param  \App\Models\Stock  $stock
     * @return void
     */
    public function restored(Stock $stock)
    {
        //
    }

    /**
     * Handle the Stock "force deleted" event.
     *
     * @param  \App\Models\Stock  $stock
     * @return void
     */
    public function forceDeleted(Stock $stock)
    {
        //
    }
}
