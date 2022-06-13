<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WebsiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(rand(1, 4)),
            'url' => $this->faker->url(),
            'description' => $this->faker->paragraph(rand(0, 10))
        ];
    }
}
