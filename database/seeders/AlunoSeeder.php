<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aluno;

class AlunoSeeder extends Seeder
{
    public function run(): void
    {
        Aluno::create([
            'nome' => 'Arthur Luiz',
            'email' => 'arthur@email.com',
            'curso' => 'Engenharia de Software',
        ]);

        Aluno::create([
            'nome' => 'João Silva',
            'email' => 'joao@email.com',
            'curso' => 'Administração',
        ]);

        Aluno::create([
            'nome' => 'Maria Souza',
            'email' => 'maria@email.com',
            'curso' => 'Engenharia de Software',
        ]);

        Aluno::create([
            'nome' => 'Pedro Santos',
            'email' => 'pedro@email.com',
            'curso' => 'Administração',
        ]);

        Aluno::create([
            'nome' => 'Ana Oliveira',
            'email' => 'ana@email.com',
            'curso' => 'Engenharia de Software',
        ]);

        Aluno::create([
            'nome' => 'Lucas Costa',
            'email' => 'lucas@email.com',
            'curso' => 'Administração',
        ]);

        Aluno::create([
            'nome' => 'Julia Almeida',
            'email' => 'julia@email.com',
            'curso' => 'Engenharia de Software',
        ]);

        Aluno::create([
            'nome' => 'Gabriel Lima',
            'email' => 'gabriel@email.com',
            'curso' => 'Administração',
        ]);

        Aluno::create([
            'nome' => 'Beatriz Rocha',
            'email' => 'beatriz@email.com',
            'curso' => 'Engenharia de Software',
        ]);

        Aluno::create([
            'nome' => 'Rafael Martins',
            'email' => 'rafael@email.com',
            'curso' => 'Administração',
        ]);
    }
}