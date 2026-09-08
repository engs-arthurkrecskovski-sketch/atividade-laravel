<?php

namespace Tests\Feature;

use App\Models\Aluno;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AlunoPolicyTest extends TestCase
{
    use RefreshDatabase;

    public function test_professor_nao_pode_abrir_cadastro(): void
    {
        $professor = User::factory()->create([
            'role' => 'professor',
        ]);

        $this->actingAs($professor)
            ->get(route('alunos.create'))
            ->assertForbidden();
    }

    public function test_professor_nao_pode_cadastrar_por_post(): void
    {
        $professor = User::factory()->create([
            'role' => 'professor',
        ]);

        $curso = Curso::factory()->create();

        $this->actingAs($professor)
            ->post(route('alunos.store'), [
                'nome' => 'Aluno Teste',
                'email' => 'aluno@example.com',
                'curso_id' => $curso->id,
            ])
            ->assertForbidden();

        $this->assertDatabaseCount('alunos', 0);
    }

    public function test_professor_nao_pode_excluir_por_delete(): void
    {
        $professor = User::factory()->create([
            'role' => 'professor',
        ]);

        $aluno = $this->criarAluno();

        $this->actingAs($professor)
            ->delete(route('alunos.destroy', $aluno->id))
            ->assertForbidden();

        $this->assertDatabaseHas('alunos', [
            'id' => $aluno->id,
        ]);
    }

    public function test_professor_pode_editar_aluno(): void
    {
        $professor = User::factory()->create([
            'role' => 'professor',
        ]);

        $aluno = $this->criarAluno();
        $novoCurso = Curso::factory()->create([
            'nome' => 'Novo Curso',
        ]);

        $this->actingAs($professor)
            ->put(route('alunos.update', $aluno->id), [
                'nome' => 'Nome Atualizado',
                'email' => $aluno->email,
                'curso_id' => $novoCurso->id,
            ])
            ->assertRedirect(route('alunos.index'));

        $this->assertDatabaseHas('alunos', [
            'id' => $aluno->id,
            'nome' => 'Nome Atualizado',
            'curso_id' => $novoCurso->id,
            'curso' => 'Novo Curso',
        ]);
    }

    public function test_admin_pode_cadastrar_e_excluir_aluno(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $curso = Curso::factory()->create();

        $this->actingAs($admin)
            ->post(route('alunos.store'), [
                'nome' => 'Aluno do Admin',
                'email' => 'novo@example.com',
                'curso_id' => $curso->id,
            ])
            ->assertRedirect(route('alunos.index'));

        $this->assertDatabaseHas('alunos', [
            'email' => 'novo@example.com',
            'curso_id' => $curso->id,
            'user_id' => $admin->id,
        ]);

        $aluno = Aluno::where('email', 'novo@example.com')
            ->firstOrFail();

        $this->actingAs($admin)
            ->delete(route('alunos.destroy', $aluno->id))
            ->assertRedirect(route('alunos.index'));

        $this->assertDatabaseMissing('alunos', [
            'id' => $aluno->id,
        ]);
    }

    private function criarAluno(): Aluno
    {
        $curso = Curso::factory()->create();

        return Aluno::create([
            'nome' => 'Aluno Teste',
            'email' => 'aluno@example.com',
            'curso' => $curso->nome,
            'curso_id' => $curso->id,
        ]);
    }
}
