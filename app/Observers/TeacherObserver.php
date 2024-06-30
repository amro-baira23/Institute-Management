<?php

namespace App\Observers;

use App\Models\Activity;
use App\Models\Teacher;

class TeacherObserver
{
    /**
     * Handle the Teacher "created" event.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return void
     */
    public function created(Teacher $teacher)
    {
        $user = auth()->guard("user")->user();
        if (!$user)
            return;
        
        Activity::create([
            "user_id" => $user->id ,
            "operation" => "C",
            "model" => "أستاذ",
            "desc" => "تم إضافة الأستاذ " . $teacher->person->name . " " . "من قبل " . $user->username
        ]);
    }

    /**
     * Handle the Teacher "updated" event.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return void
     */
    public function updated(Teacher $teacher)
    {
        $user = auth()->guard("user")->user();
        if (!$user)
            return;
        
        Activity::create([
            "user_id" => $user->id ,
            "operation" => "U",
            "model" => "أستاذ",
            "desc" => "تم تحديث معلومات الأستاذ " . $teacher->person->name . " " . "من قبل " . $user->username
        ]);
    }

    /**
     * Handle the Teacher "deleted" event.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return void
     */
    public function deleted(Teacher $teacher)
    {
        $user = auth()->guard("user")->user();
        if (!$user)
            return;
        
        Activity::create([
            "user_id" => $user->id ,
            "operation" => "D",
            "model" => "أستاذ",
            "desc" => "تم أرشفة معلومات الأستاذ " . $teacher->person->name . " " . "من قبل " . $user->username
        ]);
    }

    /**
     * Handle the Teacher "restored" event.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return void
     */
    public function restored(Teacher $teacher)
    {
        //
    }

    /**
     * Handle the Teacher "force deleted" event.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return void
     */
    public function forceDeleted(Teacher $teacher)
    {
        //
    }
}
