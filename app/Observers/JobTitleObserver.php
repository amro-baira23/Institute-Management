<?php

namespace App\Observers;

use App\Models\Activity;
use App\Models\JobTitle;

class JobTitleObserver
{
    /**
     * Handle the JobTitle "created" event.
     *
     * @param  \App\Models\JobTitle  $jobTitle
     * @return void
     */
    public function created(JobTitle $jobTitle)
    {
        $user = auth()->guard("user")->user();
        if (!$user)
            return;
        
        Activity::create([
            "user_id" => $user->id ,
            "operation" => "C",
            "model" => "وظيفة",
            "desc" => "تم إضافة الوظيفة " . $jobTitle->name . " " . "من قبل " . $user->username
        ]);
    }

    /**
     * Handle the JobTitle "updated" event.
     *
     * @param  \App\Models\JobTitle  $jobTitle
     * @return void
     */
    public function updated(JobTitle $jobTitle)
    {
        $user = auth()->guard("user")->user();
        if (!$user)
            return;
        
        Activity::create([
            "user_id" => $user->id ,
            "operation" => "U",
            "model" => "وظيفة",
            "desc" => "تم تحديث معلومات الوظيفة " . $jobTitle->name . " " . "من قبل " . $user->username
        ]);
    }

    /**
     * Handle the JobTitle "deleted" event.
     *
     * @param  \App\Models\JobTitle  $jobTitle
     * @return void
     */
    public function deleted(JobTitle $jobTitle)
    {
        $user = auth()->guard("user")->user();
        if (!$user)
            return;
        
        Activity::create([
            "user_id" => $user->id ,
            "operation" => "D",
            "model" => "وظيفة",
            "desc" => "تم أرشفة معلومات الوظيفة " . $jobTitle->name . " " . "من قبل " . $user->username
        ]);
    }

    /**
     * Handle the JobTitle "restored" event.
     *
     * @param  \App\Models\JobTitle  $jobTitle
     * @return void
     */
    public function restored(JobTitle $jobTitle)
    {
        //
    }

    /**
     * Handle the JobTitle "force deleted" event.
     *
     * @param  \App\Models\JobTitle  $jobTitle
     * @return void
     */
    public function forceDeleted(JobTitle $jobTitle)
    {
        //
    }
}
