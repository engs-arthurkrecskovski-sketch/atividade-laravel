<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Route;

// TEMA 1 - ATV 1

Route::get('/sobre', function (): string {
    return 'Página sobre';
});

Route::get('/alunos', [AlunoController::class, 'index']);

Route::get('/contato', function (): string {
    return 'Página de contato';
});

// TEMA 1 - ATV 2

Route::get('/produto/{id}', function (string $id): string {
    return 'Produto: '.$id;
});

Route::get('/categoria/{id}', function (string $id): string {
    return 'Categoria: '.$id;
});

Route::get('/usuario/{id}', function (string $id): string {
    return 'Usuário: '.$id;
});

// TEMA 2 - ATV 4

Route::get('/alunos/create', [AlunoController::class, 'create']);

Route::post('/alunos', [AlunoController::class, 'store']);

Route::get('/alunos/{id}', [AlunoController::class, 'show']);

Route::get('/alunos/{id}/edit', [AlunoController::class, 'edit']);

Route::put('/alunos/{id}', [AlunoController::class, 'update']);

Route::delete('/alunos/{id}', [AlunoController::class, 'destroy']);

// ATIVIDADE 17 - DESAFIO

Route::get('/cursos', [CursoController::class, 'index'])
    ->name('cursos.index');
