<?php

namespace App\Observers;

use App\Models\Activity;
use App\Models\Room;

class RoomObserver
{
    /**
     * Handle the Room "created" event.
     *
     * @param  \App\Models\Room  $room
     * @return void
     */
    public function created(Room $room)
    {
        $user = auth()->guard("user")->user();
        if (!$user)
            return;
        
        Activity::create([
            "user_id" => $user->id ,
            "operation" => "C",
            "model" => "غرفة",
            "desc" => "تم إضافة الغرفة " . $room->name . " " . "من قبل " . $user->username
        ]);
    }

    /**
     * Handle the Room "updated" event.
     *
     * @param  \App\Models\Room  $room
     * @return void
     */
    public function updated(Room $room)
    {
        $user = auth()->guard("user")->user();
        if (!$user)
            return;
        
        Activity::create([
            "user_id" => $user->id ,
            "operation" => "U",
            "model" => "غرفة",
            "desc" => "تم تحديث الغرفة " . $room->name . " " . "من قبل " . $user->username
        ]);
    
    }

    /**
     * Handle the Room "deleted" event.
     *
     * @param  \App\Models\Room  $room
     * @return void
     */
    public function deleted(Room $room)
    {
        $user = auth()->guard("user")->user();
        if (!$user)
            return;
        
        Activity::create([
            "user_id" => $user->id ,
            "operation" => "D",
            "model" => "غرفة",
            "desc" => "تم أرشفة الغرفة " . $room->name . " " . "من قبل " . $user->username
        ]);
    }

    /**
     * Handle the Room "restored" event.
     *
     * @param  \App\Models\Room  $room
     * @return void
     */
    public function restored(Room $room)
    {
        //
    }

    /**
     * Handle the Room "force deleted" event.
     *
     * @param  \App\Models\Room  $room
     * @return void
     */
    public function forceDeleted(Room $room)
    {
        //
    }
}
