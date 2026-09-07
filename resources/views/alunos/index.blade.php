@extends('layouts.app')

@section('title', 'Lista de Alunos')

@section('content')
    <h2>Lista de Alunos</h2>

    @if(session('sucesso'))
        <p>{{ session('sucesso') }}</p>
    @endif

    <a href="{{ url('/alunos/create') }}">Cadastrar aluno</a>

    @if($alunos->isEmpty())
        <p>Nenhum aluno cadastrado.</p>
    @else
        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Curso</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alunos as $aluno)
                    <tr>
                        <td>{{ $aluno->nome }}</td>
                        <td>{{ $aluno->email }}</td>
                        <td>{{ $aluno->curso }}</td>
                        <td>
                            <a href="{{ url('/alunos/' . $aluno->id) }}">
                                Visualizar
                            </a>

                            <a href="{{ url('/alunos/' . $aluno->id . '/edit') }}">
                                Editar
                            </a>

                            <form action="{{ url('/alunos/' . $aluno->id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection