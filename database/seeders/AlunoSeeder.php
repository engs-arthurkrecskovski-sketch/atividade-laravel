<?php

namespace Database\Seeders;

use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Database\Seeder;

class AlunoSeeder extends Seeder
{
    public function run(): void
    {
        $alunos = [
            ['Arthur Luiz', 'arthur@email.com', 'Engenharia de Software'],
            ['João Silva', 'joao@email.com', 'Administração'],
            ['Maria Souza', 'maria@email.com', 'Engenharia de Software'],
            ['Pedro Santos', 'pedro@email.com', 'Administração'],
            ['Ana Oliveira', 'ana@email.com', 'Engenharia de Software'],
            ['Lucas Costa', 'lucas@email.com', 'Administração'],
            ['Julia Almeida', 'julia@email.com', 'Engenharia de Software'],
            ['Gabriel Lima', 'gabriel@email.com', 'Administração'],
            ['Beatriz Rocha', 'beatriz@email.com', 'Engenharia de Software'],
            ['Rafael Martins', 'rafael@email.com', 'Administração'],
        ];

        foreach ($alunos as [$nome, $email, $nomeCurso]) {
            $curso = Curso::firstOrCreate([
                'nome' => $nomeCurso,
            ]);

            Aluno::updateOrCreate(
                ['email' => $email],
                [
                    'nome' => $nome,
                    'curso' => $curso->nome,
                    'curso_id' => $curso->id,
                ]
            );
        }
    }
}
