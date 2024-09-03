<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enrollment>
 */
class EnrollmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $students = Student::all()->pluck('id')->toArray();
        $courses = Course::all()->pluck('id')->toArray();
        
        static $index = 0;

        $pair = array_map(null,$students,$courses);
        $pair = $pair[$index++ %count($pair)];
        return [
            "student_id" => $pair[0] ,
            "course_id" => $pair[1]?? Course::inRandomOrder()->first()->id,
            "created_at" => fake()->dateTimeBetween('-6 month',"-1 month" ),
        ];
    }
}
