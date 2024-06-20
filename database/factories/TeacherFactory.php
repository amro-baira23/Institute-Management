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
        $persons = Person::factory()->create(
            ["type" => "T"]
        );
        return [
            "person_id" => $persons["id"],
            "credentials" => fake()->numerify("credentials ###"),
        ];
    }
}
