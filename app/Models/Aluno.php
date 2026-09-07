<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aluno extends Model
{
    protected $table = 'alunos';

    protected $fillable = [
        'nome',
        'email',
        'curso',
        'curso_id',
    ];

    public function cursoRelacionado(): BelongsTo
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
