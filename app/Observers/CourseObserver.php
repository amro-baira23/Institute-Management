<?php

namespace App\Observers;

use App\Models\Activity;
use App\Models\AdditionalSubAccount;
use App\Models\Course;
use App\Models\Transaction;
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

        $expences_subaccount = AdditionalSubAccount::where("name","الرواتب")->firstOr(function(){
            $subaccount = AdditionalSubAccount::create([
                'name' => "الرواتب",
            ]);
            $subaccount->subaccount()->create([
                "main_account" => "المصاريف",
            ]);
            return $subaccount;
        });
        $expences_subaccount = $expences_subaccount->subaccount;
        Transaction::create([
            "subaccount_id" => $expences_subaccount->id,
            "type" => "P",
            "amount" => $course->salary,
            "note" => $course->subject->name,
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
