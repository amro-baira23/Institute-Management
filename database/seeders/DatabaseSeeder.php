<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\MainAccount;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Person;
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

        $main_accounts = ['المصاريف', 'الإيرادات', 'الطلاب', 'الأساتذة', 'الصندوق', 'رأس المال', 'الموظفين'];
        $permissions = ['إدارة الطلاب', 'إدارة المستودع', 'إدارة الغرف', 'إدارة المواد', 'إدارة أصناف المواد', 'إدارة الحسابات الفرعية', 'إدارة الأساتذة', 'إدارة الدورات', 'إدارة الأدوار', 'إدارة الموظفين'];
        $roles = ["مدير", "ضيف"];

        $person = Person::create([
            'name' => 'أحمد',
            'father_name' => 'عيسى',
            'mother_name' => 'سلوى',
            'gender' => 'Male',
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

        foreach ($main_accounts as $account)
            MainAccount::create([
                'name' => $account
            ]);

        foreach ($permissions as $permission)
            Permission::create([
                'name' => $permission
            ]);


        $admin->permissions()->attach(Permission::all());
        
    }
}
