@extends('layouts.sistema')
@section('title', 'Visualizar Aluno')

@section('content')
    <h2>Dados do aluno</h2>

    <p><strong>Nome:</strong> {{ $aluno->nome }}</p>
    <p><strong>Email:</strong> {{ $aluno->email }}</p>
    <p><strong>Curso:</strong> {{ $aluno->curso }}</p>

    <a href="{{ url('/alunos') }}">Voltar</a>
@endsection