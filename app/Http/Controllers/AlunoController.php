<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlunoRequest;
use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AlunoController extends Controller
{
    public function index(): View
    {
        $alunos = Aluno::orderBy('nome')->get();

        return view('alunos.index', compact('alunos'));
    }

    public function show(int $id): View
    {
        $aluno = Aluno::findOrFail($id);

        return view('alunos.show', compact('aluno'));
    }

    public function create(): View
    {
        $cursos = Curso::orderBy('nome')->get();

        return view('alunos.create', compact('cursos'));
    }

    public function store(AlunoRequest $request): RedirectResponse
    {
        $dados = $request->validated();
        $curso = Curso::findOrFail($dados['curso_id']);
        $dados['curso'] = $curso->nome;

        $request->user()->alunos()->create($dados);

        return redirect('/alunos')
            ->with('sucesso', 'Aluno cadastrado com sucesso!');
    }

    public function edit(int $id): View
    {
        $aluno = Aluno::findOrFail($id);
        $cursos = Curso::orderBy('nome')->get();

        return view('alunos.edit', compact('aluno', 'cursos'));
    }

    public function update(AlunoRequest $request, int $id): RedirectResponse
    {
        $aluno = Aluno::findOrFail($id);

        $dados = $request->validated();
        $curso = Curso::findOrFail($dados['curso_id']);
        $dados['curso'] = $curso->nome;

        $aluno->update($dados);

        return redirect('/alunos')
            ->with('sucesso', 'Aluno atualizado com sucesso!');
    }

    public function destroy(int $id): RedirectResponse
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();

        return redirect('/alunos')
            ->with('sucesso', 'Aluno excluído com sucesso!');
    }

    public function porCurso(string $curso): Collection
    {
        return Aluno::where('curso', $curso)->get();
    }

    public function porNome(string $nome): Collection
    {
        return Aluno::where('nome', 'like', '%'.$nome.'%')->get();
    }

    public function recentes(): Collection
    {
        return Aluno::orderBy('created_at', 'desc')->get();
    }

    public function quantidade(): int
    {
        return Aluno::count();
    }
}
