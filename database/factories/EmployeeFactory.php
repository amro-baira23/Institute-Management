<?php

namespace Database\Factories;

use App\Models\JobTitle;
use App\Models\Person;
use App\Models\Shift;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $names = ["احمد","أحمد","محمد","عمر","عمار", "رضوان", "علي", "أسامة","مؤمن", "سعيد", "روان", "عبد الله", "يوشع"];

        $shift = Shift::factory()->create();
        $job = JobTitle::all()->pluck("id");
   
        $user = User::factory()->create();
        return [
            "name" => fake()->randomElement($names) . " " . fake()->randomElement($names),
            "birth_date" => fake()->date(),
            "phone_number" => fake()->numerify("##########"),
            "shift_id" => $shift['id'],
            "job_id" => fake()->randomElement($job->toArray()),
            "account_id" => fake()->randomElement([null,$user]),
            "credentials" => "credentials 1 2 3"
        ];
    }
}
