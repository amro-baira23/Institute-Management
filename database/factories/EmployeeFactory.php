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
        $shift = Shift::factory()->create();
        $job = JobTitle::all()->pluck("id");
        $persons = Person::factory()->create(
            ["type" => "E"]);
        $user = User::factory()->create();
        return [
            "person_id" => $persons["id"],
            "shift_id" => $shift['id'],
            "job_id" => fake()->randomElement($job->toArray()),
            "account_id" => fake()->randomElement([]),
            "credentials" => "credentials 1 2 3"
        ];
    }
}
