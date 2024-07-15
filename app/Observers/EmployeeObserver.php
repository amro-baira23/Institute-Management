<?php

namespace App\Observers;

use App\Models\Activity;
use App\Models\Employee;

class EmployeeObserver
{
    /**
     * Handle the Employee "created" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function created(Employee $employee)
    {
        $user = auth()->guard("user")->user();
        if (!$user){
            $employee->subaccount()->create([
                "main_account" => "الموظفين",
            ]);     
            return;
        }
        
        Activity::create([
            "user_id" => $user->id ,
            "operation" => "C",
            "model" => "موظف",
            "desc" => "تم إضافة الموظف " . $employee->name . " " . "من قبل " . $user->username
        ]);
    }

    /**
     * Handle the Employee "updated" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function updated(Employee $employee)
    {
        $user = auth()->guard("user")->user();
        if (!$user)
            return;
        
        Activity::create([
            "user_id" => $user->id ,
            "operation" => "U",
            "model" => "موظف",
            "desc" => "تم تحديث معلومات الموظف " . $employee->name . " " . "من قبل " . $user->username
        ]);
    }

    /**
     * Handle the Employee "deleted" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function deleted(Employee $employee)
    {
        $user = auth()->guard("user")->user();
        if (!$user)
            return;
        
        Activity::create([
            "user_id" => $user->id ,
            "operation" => "D",
            "model" => "موظف",
            "desc" => "تم أرشفة معلومات الموظف " . $employee->name . " " . "من قبل " . $user->username
        ]);
    }

    /**
     * Handle the Employee "restored" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function restored(Employee $employee)
    {
        //
    }

    /**
     * Handle the Employee "force deleted" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function forceDeleted(Employee $employee)
    {
        //
    }
}
