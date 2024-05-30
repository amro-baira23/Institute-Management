<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\MainAccount;
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

        User::create([
            'username' => 'admin',
            'password' => Hash::make('123456789'),
            'is_admin' => 1
        ]);

        foreach ($main_accounts as $account)
            MainAccount::create([
                'name'=>$account
            ]);
    }
}