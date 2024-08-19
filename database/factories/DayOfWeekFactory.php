<?php

namespace Database\Factories;

use App\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DayOfWeek>
 */
class DayOfWeekFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $schedules = Schedule::get()->pluck("id");

        return [
            "schedule_id" => fake()->randomElement($schedules->toArray()),
            "day" => (string) fake()->numberBetween(0,6),
        ];
    }
}
