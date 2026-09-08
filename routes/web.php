<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/', function (): View {
    return view('welcome');
});

Route::get('/sobre', function (): string {
    return 'Página sobre';
});

Route::get('/contato', function (): string {
    return 'Página de contato';
});

Route::get('/produto/{id}', function (string $id): string {
    return 'Produto: '.$id;
});

Route::get('/categoria/{id}', function (string $id): string {
    return 'Categoria: '.$id;
});

Route::get('/usuario/{id}', function (string $id): string {
    return 'Usuário: '.$id;
});

Route::get('/dashboard', function (): View {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', function (): string {
    return 'Área administrativa: acesso permitido!';
})->middleware(['auth', 'role:admin'])->name('admin');

Route::middleware('auth')->group(function (): void {
    Route::get('/alunos', [AlunoController::class, 'index'])
        ->name('alunos.index');

    Route::get('/alunos/create', [AlunoController::class, 'create'])
        ->name('alunos.create');

    Route::post('/alunos', [AlunoController::class, 'store'])
        ->name('alunos.store');

    Route::get('/alunos/{id}', [AlunoController::class, 'show'])
        ->name('alunos.show');

    Route::get('/alunos/{id}/edit', [AlunoController::class, 'edit'])
        ->name('alunos.edit');

    Route::put('/alunos/{id}', [AlunoController::class, 'update'])
        ->name('alunos.update');

    Route::delete('/alunos/{id}', [AlunoController::class, 'destroy'])
        ->name('alunos.destroy');

    Route::get('/cursos', [CursoController::class, 'index'])
        ->name('cursos.index');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';
