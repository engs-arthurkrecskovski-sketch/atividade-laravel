<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\View\View;

class CursoController extends Controller
{
    public function index(): View
    {
        $cursos = Curso::with('alunos')
            ->orderBy('nome')
            ->get();

        return view('cursos.index', compact('cursos'));
    }
}
