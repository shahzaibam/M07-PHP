<?php

namespace Database\Factories;

use App\Models\Show;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Show>
 */
class ShowFactory extends Factory
{


    protected $model = Show::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name,
            'duracion' => $this->faker->unique()->safeEmail,
            'fecha' => $this->faker->date,
            'idioma' => $this->faker->languageCode,
            'precio' => $this->faker->randomNumber(3),
            'valoracion' => $this->faker->text(),
        ];
    }
}
