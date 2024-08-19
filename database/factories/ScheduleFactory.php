<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $time = Carbon::now();
        $time = $time->setTime(8,0);
        $times = [$time,$time->addHours(2),$time->addHours(4),$time->addHours(6),$time->addHours(8),$time->addHours(10)];
        
        static $index = 0;
        return [
            "start" => $times[$index++ %count($times)],
            "end" => $time->addHours(2)
        ];
    }
}
