<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Student;
use App\Models\SubAccount;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "subaccount_id" => SubAccount::has("accountable")->whereIn("accountable_type",[Student::class,Teacher::class])->inRandomOrder()->first()->id,
            "course_id" => Course::inRandomOrder()->first()->id,
            "note" => "note",
            'amount' => fake()->randomElement(["200","300"]),
            "created_at" => fake()->dateTimeBetween('-6 month',"-1 month" ),
            'type' => fake()->randomElement(["P","E"]),
        ];
    }
}
