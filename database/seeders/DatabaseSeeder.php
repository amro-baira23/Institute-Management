<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Activity;
use App\Models\Category;
use App\Models\Course;
use App\Models\DayOfWeek;
use App\Models\Employee;
use App\Models\JobTitle;
use App\Models\MainAccount;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Person;
use App\Models\Room;
use App\Models\Schedule;
use App\Models\Stock;
use App\Models\Student;
use App\Models\SubAccount;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $permissions = ['إدارة الطلاب', 'إدارة المستودع', "إدارة الحسابات", 'إدارة المحاسبة', 'إدارة الأساتذة', 'إدارة الدورات', 'إدارة الموظفين', "إدارة الشهادات", "إدارة الصندوق", 'تصدير واستيرات ملفات إكسل'];
        $roles = ["مدير", "ضيف"];

        $person = Person::create([
            'name' => 'أحمد',
            'phone_number' => '0988745545',
            'birth_date' => '1990-06-02',
            'type' => 'S',
        ]);


        $admin = Role::create(["name" => "مدير"]);
        Role::create(["name" => "ضيف"]);

        User::create([
            'username' => 'admin',
            'password' => Hash::make('123456789'),
            "role_id" => 1
        ]);

    

        foreach ($permissions as $permission)
            Permission::create([
                'name' => $permission
            ]);


        $admin->permissions()->attach(Permission::all());

        Category::factory()->count(5)->create();
        Subject::factory()->count(20)->create();
        Room::factory()->count(10)->create();


        Teacher::factory()->count(20)->create();

        Student::factory()->count(20)->create();



        Course::factory()->count(8)->create();
        Stock::factory()->count(20)->create();

        JobTitle::factory()->count(4)->create();
        Employee::factory()->count(20)->create();
        Transaction::factory()->count(50)->create();
        SubAccount::create([
            'main_account'=>'المصاريف',
        ]);
        SubAccount::create([
            'main_account'=>'الإيرادات',
        ]);
        SubAccount::create([
            'main_account'=>'رأس المال',
        ]);
        SubAccount::create([
            'main_account'=>'الصندوق',
        ]);
    }
}
