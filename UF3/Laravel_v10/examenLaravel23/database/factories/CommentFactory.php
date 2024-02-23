<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->title,
            'descripcion' => $this->faker->text,
            'fecha' => $this->faker->date,
            'autor' => $this->faker->name,
//            'show_id' => $this->faker->numberBetween(0, 30),
        ];
    }
}
