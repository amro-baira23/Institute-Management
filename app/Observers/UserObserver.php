<?php

namespace App\Observers;

use App\Models\Activity;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $user1 = auth()->guard("user")->user();
        if (!$user1)
            return;
        
        Activity::create([
            "user_id" => $user1->id ,
            "operation" => "C",
            "model" => "حساب",
            "desc" => "تم إضافة حساب المستخدم " . $user->username . " " . "من قبل " . $user1->username
        ]);
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        $user1 = auth()->guard("user")->user();
        if (!$user1)
            return;
        
        Activity::create([
            "user_id" => $user1->id ,
            "operation" => "U",
            "model" => "حساب",
            "desc" => "تم تحديث معلومات حساب المستخدم " . $user->username . " " . "من قبل " . $user1->username
        ]);
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        $user1 = auth()->guard("user")->user();
        if (!$user1)
            return;
        
        Activity::create([
            "user_id" => $user1->id ,
            "operation" => "D",
            "model" => "حساب",
            "desc" => "تم أرشفة معلومات حساب المستخدم " . $user->username . " " . "من قبل " . $user1->username
        ]);
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
