<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    public function run(): void
    {
        $cursos = [
            'Engenharia de Software',
            'Administração',
            'Engenharia Civil',
            'Ciência da Computação',
            'Enfermagem',
        ];

        foreach ($cursos as $nome) {
            Curso::firstOrCreate(['nome' => $nome]);
        }
    }
}
