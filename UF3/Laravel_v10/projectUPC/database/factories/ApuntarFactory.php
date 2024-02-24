<?php

namespace Database\Factories;

use App\Models\Evento;
use App\Models\Torneo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apuntar>
 */
class ApuntarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Esto creará un nuevo usuario cada vez que se cree un Apuntar
            'events_id' => Evento::factory(), // Esto es opcional y creará un nuevo evento cada vez
            'torneos_id' => Torneo::factory(), // Esto es opcional y creará un nuevo torneo cada vez
            // Si necesitas que events_id o torneos_id puedan ser nulos, puedes usar la función randomElement para hacerlo de forma aleatoria:
            // 'events_id' => $this->faker->randomElement([null, Evento::factory()]),
            // 'torneos_id' => $this->faker->randomElement([null, Torneo::factory()]),
        ];
    }
}
