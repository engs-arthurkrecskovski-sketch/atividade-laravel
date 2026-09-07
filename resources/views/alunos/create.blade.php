@extends('layouts.app')

@section('title', 'Cadastrar Aluno')

@section('content')
    <h2>Cadastrar aluno</h2>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ url('/alunos') }}" method="POST">
        @csrf

        <p>
            <label for="nome">Nome:</label>
            <input
                type="text"
                id="nome"
                name="nome"
                value="{{ old('nome') }}"
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
                value="{{ old('email') }}"
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
                        @selected(old('curso_id') == $curso->id)
                    >
                        {{ $curso->nome }}
                    </option>
                @endforeach
            </select>
        </p>

        <button type="submit">Cadastrar</button>
        <a href="{{ url('/alunos') }}">Cancelar</a>
    </form>
@endsection