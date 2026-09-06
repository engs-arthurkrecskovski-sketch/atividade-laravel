<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;

// TEMA 1 - ATV 1

Route::get('/sobre', function () {
    return 'Página sobre';
});

Route::get('/alunos', [AlunoController::class, 'index']);

Route::get('/contato', function () {
    return 'Página de contato';
});


// TEMA 1 - ATV 2

Route::get('/produto/{id}', function ($id) {
    return 'Produto: ' . $id;
});

Route::get('/categoria/{id}', function ($id) {
    return 'Categoria: ' . $id;
});

Route::get('/usuario/{id}', function ($id) {
    return 'Usuário: ' . $id;
});


// TEMA 2 - ATV 4

Route::get('/alunos/create', [AlunoController::class, 'create']);

Route::post('/alunos', [AlunoController::class, 'store']);

Route::get('/alunos/{id}', [AlunoController::class, 'show']);

Route::get('/alunos/{id}/edit', [AlunoController::class, 'edit']);

Route::put('/alunos/{id}', [AlunoController::class, 'update']);

Route::delete('/alunos/{id}', [AlunoController::class, 'destroy']);