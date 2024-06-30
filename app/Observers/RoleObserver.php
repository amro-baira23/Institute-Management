<?php

namespace App\Observers;

use App\Models\Activity;
use App\Models\Role;

class RoleObserver
{
    /**
     * Handle the Role "created" event.
     *
     * @param  \App\Models\Role  $role
     * @return void
     */
    public function created(Role $role)
    {
        $user1 = auth()->guard("user")->user();
        if (!$user1)
            return;
        
        Activity::create([
            "user_id" => $user1->id ,
            "operation" => "C",
            "model" => "دور",
            "desc" => "تم إضافة الدور " . $role->name . " " . "من قبل " . $user1->username
        ]);
    }

    /**
     * Handle the Role "updated" event.
     *
     * @param  \App\Models\Role  $role
     * @return void
     */
    public function updated(Role $role)
    {
        
        $user1 = auth()->guard("user")->user();
        if (!$user1)
            return;
        
        Activity::create([
            "user_id" => $user1->id ,
            "operation" => "U",
            "model" => "دور",
            "desc" => "تم تحديث معلومات الدور " . $role->name . " " . "من قبل " . $user1->username
        ]);
    }

    /**
     * Handle the Role "deleted" event.
     *
     * @param  \App\Models\Role  $role
     * @return void
     */
    public function deleted(Role $role)
    {
        $user1 = auth()->guard("user")->user();
        if (!$user1)
            return;
        
        Activity::create([
            "user_id" => $user1->id ,
            "operation" => "D",
            "model" => "دور",
            "desc" => "تم أرشفة معلومات الدور " . $role->name . " " . "من قبل " . $user1->username
        ]);
    }

    /**
     * Handle the Role "restored" event.
     *
     * @param  \App\Models\Role  $role
     * @return void
     */
    public function restored(Role $role)
    {
        //
    }

    /**
     * Handle the Role "force deleted" event.
     *
     * @param  \App\Models\Role  $role
     * @return void
     */
    public function forceDeleted(Role $role)
    {
        //
    }
}
