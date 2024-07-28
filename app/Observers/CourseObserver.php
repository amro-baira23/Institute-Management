<?php

namespace App\Observers;

use App\Models\Activity;
use App\Models\Course;
use App\Models\User;

class CourseObserver
{
    /**
     * Handle the Course "created" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function created(Course $course)
    {
        $user = auth()->guard("user")->user();
        if (!$user)
            return;
        
        Activity::create([
            "user_id" => $user->id ,
            "operation" => "C",
            "model" => "دورة",
            "desc" => "تم انشاء دورة جديدة من قبل " . $user->username . " " . "للمادة " . $course->subject->name 
        ]);
    }

    /**
     * Handle the Course "updated" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function updated(Course $course)
    {
        $user = auth()->guard("user")->user();
        if (!$user)
            return;
        
        Activity::create([
            "user_id" => $user->id ,
            "operation" => "C",
            "model" => "دورة",
            "desc" => "تم تحديث دورة من قبل " . $user->username . " " . "للمادة " . $course->subject->name 
        ]);
    }

    /**
     * Handle the Course "deleted" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function deleted(Course $course)
    {
        $user = auth()->guard("user")->user();
        if (!$user)
            return;
            Activity::create([
                "user_id" => $user->id ,
                "operation" => "C",
                "model" => "دورة",
                "desc" => "تم أرشفة دورة من قبل " . $user->username . " " . "للمادة " . $course->subject->name 
            ]);
    }

    /**
     * Handle the Course "restored" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function restored(Course $course)
    {
        //
    }

    /**
     * Handle the Course "force deleted" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function forceDeleted(Course $course)
    {
        //
    }
}
