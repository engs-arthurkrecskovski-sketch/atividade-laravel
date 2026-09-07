@extends('layouts.app')

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
            <label for="curso">Curso:</label>
            <input
                type="text"
                id="curso"
                name="curso"
                value="{{ old('curso', $aluno->curso) }}"
                maxlength="255"
                required
            >
        </p>

        <button type="submit">Salvar alterações</button>
        <a href="{{ url('/alunos') }}">Cancelar</a>
    </form>
@endsection