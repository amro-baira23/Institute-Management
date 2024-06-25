<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $ids = Category::all()->pluck("id");
        $categories = Category::all()->pluck("name");
        return [
            "name" => fake()->unique()->lexify('???') . " " .fake()->randomElement($categories->toArray()) ,
            "category_id" =>fake()->randomElement($ids->toArray())
        ];
    }
}
