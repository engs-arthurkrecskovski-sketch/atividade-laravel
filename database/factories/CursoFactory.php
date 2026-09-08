<?php

namespace Database\Factories;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Curso>
 */
class CursoFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->randomElement([
                'Engenharia de Software',
                'Administração',
                'Engenharia Civil',
                'Ciência da Computação',
                'Enfermagem',
            ]),
        ];
    }
}
