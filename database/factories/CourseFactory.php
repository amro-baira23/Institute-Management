<?php

namespace Database\Factories;

use App\Models\DayOfWeek;
use App\Models\Room;
use App\Models\Schedule;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $subjects = Subject::all()->pluck('id');
        $rooms = Room::all()->pluck("id");
        $teachers = Teacher::all()->pluck('id');
        
        $schedules = Schedule::factory()->create();
        $days = DayOfWeek::factory()->count(4)
        ->create([
            "schedule_id" => $schedules["id"]
             ]);
        return [
            "schedule_id" => $schedules["id"],
            'subject_id' => fake()->randomElement($subjects->toArray()),
            'teacher_id' => fake()->randomElement($teachers->toArray()),
            'room_id' => fake()->randomElement($rooms->toArray()),
            'start_at' => date("Y-m-d"),
            'end_at' =>  date('Y-m-d', strtotime(date("Y-m-d") . ' +1 month')),
            'minimum_students' => fake()->numberBetween(14,18),
            'status' => fake()->randomElement(["P","C","O"]),
            'salary_type' => fake()->randomElement(["C","S"]),
            'salary_amount' => fake()->randomElement([3000,5000,4600]),
            'cost' => fake()->randomElement(["200","300"]),
            'certificate_cost' => fake()->randomElement(["2000","3000"]),
        ];
    }
}
