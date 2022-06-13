<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 */
class PostFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(rand(2, 7)),
            'description' => $this->faker->paragraph(rand(2, 15))
        ];
    }
}
