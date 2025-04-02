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
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'plot' => $this->faker->paragraph(3),
            'rating' => 10.0,
            'runtime' => '',
            'genre' => '',
            'poster' => '',
            'imdbID' => '',
        ];
    }
}
