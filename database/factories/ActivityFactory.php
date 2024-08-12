<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = User::all()->pluck("id");
        return [
            "user_id" => fake()->randomElement($users->toArray()),
            "operation" => fake()->randomElement(["C","U","D"]),
            "model" => fake()->randomElement(["طالب","أستاذ","موظف","مناوبة","وظيفة","دورة","غرفة","حساب","عملية"]),
            "desc" => "description 123"
        ];
    }
}
