<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('users')
            ->where('role', 'aluno')
            ->update(['role' => 'professor']);

        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'professor'])
                ->default('professor')
                ->change();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'professor', 'aluno'])
                ->default('professor')
                ->change();
        });
    }
};
