<?php

namespace App\Models;

use Database\Factories\CursoFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    /** @use HasFactory<CursoFactory> */
    use HasFactory;

    protected $fillable = [
        'nome',
    ];
}
