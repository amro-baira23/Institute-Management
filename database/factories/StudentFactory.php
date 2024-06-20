<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $names = ["احمد","أحمد","محمد","عمر","عمار", "رضوان", "علي", "أسامة","مؤمن", "سعيد", "روان", "عبد الله", "يوشع"];
        $female_names = ["منى", "مريم", "عائشة", "خديجة", "صفية", "ثناء", "وفاء", "سارة"];
        return [
            "father_name" =>  fake()->randomElement($names) . " " . fake()->randomElement($names),
            "mother_name" =>  fake()->randomElement($female_names) . " " . fake()->randomElement($names),
            "name_en" => fake()->firstNameMale(),
            "father_name_en" => fake()->firstNameMale(),
            "mother_name_en" => fake()->firstNameFemale(),
            "line_phone_number" =>fake()->numerify("011#######"),
            "gender" => fake()->randomElement(["M","F"]),
            "national_number" =>fake()->numerify("#############"),
            "education_level" => fake()->randomElement(["ثانوية عامة", "اعدادي", "ثانوية ادبي","ثانوية مهنية",]),
            "nationality" => "syrian"
        ];
    }
}
