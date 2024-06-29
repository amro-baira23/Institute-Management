<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobTitle>
 */
class JobTitleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $names = ["محاسب", "عامل", "مراقب دوام", "مسؤول مستودع"];
        return [
            "name" =>  fake()->unique()->randomElement($names),
            "base_salary" => fake()->randomElement([5000,15000,2000])
        ];
    }
}
