@extends('layouts.app')

@section('title', 'Lista de Alunos')

@section('content')
    <h2>Lista de Alunos</h2>

    @if(true)
        <p>Existem alunos cadastrados.</p>
    @else
        <p>Nenhum aluno cadastrado.</p>
    @endif

    @foreach(['Arthur', 'João', 'Maria'] as $aluno)
        <p>Aluno: {{ $aluno }}</p>
    @endforeach

@endsection@extends('layouts.app')

@section('title', 'Lista de Alunos')

@section('content')
    <h2>Lista de Alunos</h2>

    @if(true)
        <p>Existem alunos cadastrados.</p>
    @else
        <p>Nenhum aluno cadastrado.</p>
    @endif

    @foreach(['Arthur', 'João', 'Maria'] as $aluno)
        <p>Aluno: {{ $aluno }}</p>
    @endforeach

@endsection