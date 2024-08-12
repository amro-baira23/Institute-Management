<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $names = ["احمد","أحمد","محمد","عمر","عمار", "رضوان", "علي", "أسامة","مؤمن", "سعيد", "روان", "عبد الله", "يوشع"];
        return [
            "name" => fake()->randomElement($names) . " " . fake()->randomElement($names),
            "birth_date" => fake()->date(),
            "phone_number" => fake()->numerify("##########"),
            "credentials" => fake()->numerify("credentials ###"),
        ];
    }
}
