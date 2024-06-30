<?php

namespace App\Observers;

use App\Models\Activity;
use App\Models\Student;

class StudentObserver
{
    /**
     * Handle the Student "created" event.
     *
     * @param  \App\Models\Student  $student
     * @return void
     */
    public function created(Student $student)
    {
        $user = auth()->guard("user")->user();
        if (!$user)
            return;
        
        Activity::create([
            "user_id" => $user->id ,
            "operation" => "C",
            "model" => "طالب",
            "desc" => "تم إضافة الطالب " . $student->person->name . " " . "من قبل " . $user->username
        ]);
    }

    /**
     * Handle the Student "updated" event.
     *
     * @param  \App\Models\Student  $student
     * @return void
     */
    public function updated(Student $student)
    {
        $user = auth()->guard("user")->user();
        if (!$user)
            return;
        
        Activity::create([
            "user_id" => $user->id ,
            "operation" => "U",
            "model" => "طالب",
            "desc" => "تم تحديث معلومات الطالب " . $student->person->name . " " . "من قبل " . $user->username
        ]);
    }

    /**
     * Handle the Student "deleted" event.
     *
     * @param  \App\Models\Student  $student
     * @return void
     */
    public function deleted(Student $student)
    {
        $user = auth()->guard("user")->user();
        if (!$user)
            return;
        
        Activity::create([
            "user_id" => $user->id ,
            "operation" => "D",
            "model" => "طالب",
            "desc" => "تم أرشفة معلومات الطالب " . $student->person->name . " " . "من قبل " . $user->username
        ]);
    }

    /**
     * Handle the Student "restored" event.
     *
     * @param  \App\Models\Student  $student
     * @return void
     */
    public function restored(Student $student)
    {
        //
    }

    /**
     * Handle the Student "force deleted" event.
     *
     * @param  \App\Models\Student  $student
     * @return void
     */
    public function forceDeleted(Student $student)
    {
        //
    }
}
