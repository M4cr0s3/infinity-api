<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mentor>
 */
class MentorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'surname' => fake()->lastName,
            'image_path' => fake()->imageUrl(192, 192),
            'profession_id' => random_int(1, 10),
            'description' => fake()->paragraph(2)
        ];
    }
}
