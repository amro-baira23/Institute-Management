<?php

namespace App\Providers;

use App\Models\AdditionalSubAccount;
use App\Models\Category;
use App\Models\Course;
use App\Models\Employee;
use App\Models\JobTitle;
use App\Models\Role;
use App\Models\Room;
use App\Models\Shift;
use App\Models\Stock;
use App\Models\Student;
use App\Models\SubAccount;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use App\Observers\CategoryObserver;
use App\Observers\CourseObserver;
use App\Observers\EmployeeObserver;
use App\Observers\JobTitleObserver;
use App\Observers\RoleObserver;
use App\Observers\RoomObserver;
use App\Observers\ShiftObserver;
use App\Observers\StockObserver;
use App\Observers\StudentObserver;
use App\Observers\SubjectObserver;
use App\Observers\TeacherObserver;
use App\Observers\UserObserver;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Route::bind("subaccount", function(int $value){
            return SubAccount::where("accountable_type",AdditionalSubAccount::class)->findOrFail($value);
        });

        Course::observe(CourseObserver::class);
        Student::observe(StudentObserver::class);
        Teacher::observe(TeacherObserver::class);
        Employee::observe(EmployeeObserver::class);
        Room::observe(RoomObserver::class);
        Shift::observe(ShiftObserver::class);
        JobTitle::observe(JobTitleObserver::class);
        Category::observe(CategoryObserver::class);
        Subject::observe(SubjectObserver::class);
        Stock::observe(StockObserver::class);
        User::observe(UserObserver::class);
        Role::observe(RoleObserver::class);

    }
}
