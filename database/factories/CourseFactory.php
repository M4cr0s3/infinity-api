<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'title' => fake()->title,
            'description' => fake()->paragraph(2),
            'start_at' => fake()->date,
            'price' => random_int(0, 30000),
            'duration' => strval(mt_rand(0, 12 * 10) / 10),
            'schedule' => fake()->paragraph(1),
            'about' => fake()->paragraph(2),
            'requirements' => fake()->paragraph(1),
            'profession_id' => mt_rand(1, 10)
        ];
    }
}
