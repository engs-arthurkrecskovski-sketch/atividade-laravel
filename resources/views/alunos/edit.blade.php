@extends('layouts.sistema')

@section('title', 'Editar Aluno')

@section('content')
    <h2>Editar aluno</h2>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ url('/alunos/' . $aluno->id) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label for="nome">Nome:</label>
            <input
                type="text"
                id="nome"
                name="nome"
                value="{{ old('nome', $aluno->nome) }}"
                maxlength="255"
                required
            >
        </p>

        <p>
            <label for="email">Email:</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $aluno->email) }}"
                maxlength="255"
                required
            >
        </p>

        <p>
            <label for="curso_id">Curso:</label>
            <select id="curso_id" name="curso_id" required>
                <option value="">Selecione um curso</option>

                @foreach($cursos as $curso)
                    <option
                        value="{{ $curso->id }}"
                        @selected(old('curso_id', $aluno->curso_id) == $curso->id)
                    >
                        {{ $curso->nome }}
                    </option>
                @endforeach
            </select>
        </p>

        <button type="submit">Salvar alterações</button>
        <a href="{{ url('/alunos') }}">Cancelar</a>
    </form>
@endsection