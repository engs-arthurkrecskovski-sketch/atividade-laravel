@extends('layouts.sistema')

@section('title', 'Lista de Alunos')

@section('content')
    <h2>Lista de Alunos</h2>

    @if(session('sucesso'))
        <p>{{ session('sucesso') }}</p>
    @endif

    @can('create', \App\Models\Aluno::class)
        <a href="{{ route('alunos.create') }}">Cadastrar aluno</a>
    @endcan

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
                            @can('view', $aluno)
                                <a href="{{ route('alunos.show', $aluno->id) }}">
                                    Visualizar
                                </a>
                            @endcan

                            @can('update', $aluno)
                                <a href="{{ route('alunos.edit', $aluno->id) }}">
                                    Editar
                                </a>
                            @endcan

                            @can('delete', $aluno)
                                <form
                                    action="{{ route('alunos.destroy', $aluno->id) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit">Excluir</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection