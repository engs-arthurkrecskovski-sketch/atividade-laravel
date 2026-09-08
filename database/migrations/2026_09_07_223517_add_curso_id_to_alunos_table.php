<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('alunos', function (Blueprint $table) {
            $table->foreignId('curso_id')
                ->nullable()
                ->constrained('cursos')
                ->restrictOnDelete();
        });

        $nomes = DB::table('alunos')
            ->distinct()
            ->pluck('curso');

        foreach ($nomes as $nome) {
            $cursoId = DB::table('cursos')
                ->where('nome', $nome)
                ->value('id');

            if ($cursoId === null) {
                $cursoId = DB::table('cursos')->insertGetId([
                    'nome' => $nome,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            DB::table('alunos')
                ->where('curso', $nome)
                ->update(['curso_id' => $cursoId]);
        }
    }

    public function down(): void
    {
        Schema::table('alunos', function (Blueprint $table) {
            $table->dropConstrainedForeignId('curso_id');
        });
    }
};
