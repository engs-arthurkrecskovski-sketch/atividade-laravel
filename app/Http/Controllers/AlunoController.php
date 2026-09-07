<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        return view('alunos.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'curso' => ['required', 'string', 'max:255'],
        ]);

        Aluno::create($dados);

        return redirect('/alunos')
            ->with('sucesso', 'Aluno cadastrado com sucesso!');
    }

    public function edit(int $id): View
    {
        $aluno = Aluno::findOrFail($id);

        return view('alunos.edit', compact('aluno'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $aluno = Aluno::findOrFail($id);

        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'curso' => ['required', 'string', 'max:255'],
        ]);

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
