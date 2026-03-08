<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agenda>
 */
class AgendaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'date' => fake()->dateTimeBetween('-1 month', '+3 months'),
            'location' => fake()->randomElement([
                'Aula SMKN 8 Surabaya',
                'Lapangan Utama',
                'Ruang Multimedia',
                'Lab Komputer 1',
                'Ruang Rapat',
                'Online (Zoom)',
            ]),
            'description' => fake()->paragraph(),
        ];
    }

    public function upcoming(): static
    {
        return $this->state(fn (array $attributes) => [
            'date' => fake()->dateTimeBetween('now', '+3 months'),
        ]);
    }

    public function past(): static
    {
        return $this->state(fn (array $attributes) => [
            'date' => fake()->dateTimeBetween('-6 months', '-1 day'),
        ]);
    }
}
