<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{
    public function index()
    {
        return 'Lista de alunos';
    }

    public function show($id)
    {
        return 'Exibindo aluno ' . $id;
    }

    public function create()
    {
        return 'Formulário para cadastrar aluno';
    }

    public function store(Request $request)
    {
        return 'Aluno cadastrado com sucesso';
    }

    public function edit($id)
    {
        return 'Formulário para editar aluno ' . $id;
    }

    public function update(Request $request, $id)
    {
        return 'Aluno ' . $id . ' atualizado com sucesso';
    }

    public function destroy($id)
    {
        return 'Aluno ' . $id . ' excluído com sucesso';
    }


    public function porCurso($curso)
{
    $alunos = Aluno::where('curso', $curso)->get();

    return $alunos;
}

public function porNome($nome)
{
    $alunos = Aluno::where('nome', 'like', '%' . $nome . '%')->get();

    return $alunos;
}

public function recentes()
{
    $alunos = Aluno::orderBy('created_at', 'desc')->get();

    return $alunos;
}


public function quantidade()
{
    $quantidade = Aluno::count();

    return $quantidade;
}

}