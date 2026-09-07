@extends('layouts.app')

@section('title', 'Alunos por Curso')

@section('content')
    <h2>Alunos por curso</h2>

    @forelse($cursos as $curso)
        <section>
            <h3>{{ $curso->nome }}</h3>

            <p>Quantidade de alunos: {{ $curso->alunos->count() }}</p>

            @if($curso->alunos->isEmpty())
                <p>Nenhum aluno vinculado a este curso.</p>
            @else
                <ul>
                    @foreach($curso->alunos as $aluno)
                        <li>
                            <a href="{{ url('/alunos/' . $aluno->id) }}">
                                {{ $aluno->nome }}
                            </a>
                            — {{ $aluno->email }}
                        </li>
                    @endforeach
                </ul>
            @endif
        </section>
    @empty
        <p>Nenhum curso cadastrado.</p>
    @endforelse
@endsection