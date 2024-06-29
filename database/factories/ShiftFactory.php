<?php

namespace Database\Factories;

use App\Models\DayOfWeek;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shift>
 */
class ShiftFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $names = ["صباحي", "مسائي"];
        $schedules = Schedule::factory()->create();
        $days = DayOfWeek::factory()->count(4)
        ->create([
            "schedule_id" => $schedules["id"]
             ]);
        return [
            "name" =>  fake()->randomElement($names),
            "schedule_id" => $schedules["id"]
        ];
    }
}
