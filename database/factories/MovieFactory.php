<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->faker->word(),
            "storyline" => $this->faker->paragraph(),
            "language" => $this->faker->randomElement(['English', 'Spanish', 'French', 'German', 'Italian']),
            "release_date" => $this->faker->numberBetween(2010, 2025),
            "box_office" => $this->faker->numberBetween(500000,300000000),
            "rating" => $this->faker->numberBetween(1,10),
            "runtime" => $this->faker->numberBetween(60,240)
        ];
    }
}
