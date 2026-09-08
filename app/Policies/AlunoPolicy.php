<?php

namespace App\Policies;

use App\Models\Aluno;
use App\Models\User;

class AlunoPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isProfessor();
    }

    public function view(User $user, Aluno $aluno): bool
    {
        return $user->isAdmin() || $user->isProfessor();
    }

    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    public function update(User $user, Aluno $aluno): bool
    {
        return $user->isAdmin() || $user->isProfessor();
    }

    public function delete(User $user, Aluno $aluno): bool
    {
        return $user->isAdmin();
    }

    public function restore(User $user, Aluno $aluno): bool
    {
        return false;
    }

    public function forceDelete(User $user, Aluno $aluno): bool
    {
        return false;
    }
}
