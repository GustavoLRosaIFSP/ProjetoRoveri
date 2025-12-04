<?php

namespace App\Policies;

use App\Models\Ativo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AtivoPolicy
{
    public function before($user)
    {
        if ($user->categoria !== \App\Models\Enum\Categoria::ADMINISTRADOR) {
            return false;
        }
    }

    public function viewAny($user) { return true; }
    public function create(User $user)
    {
        return $user->categoria === \App\Models\Enum\Categoria::ADMINISTRADOR;
    }
    public function update($user, Ativo $ativo) { return true; }
    public function delete($user, Ativo $ativo) { return true; }


    public function view(User $user, Ativo $ativo): bool
    {
        return false;
    }


    public function restore(User $user, Ativo $ativo): bool
    {
        return false;
    }

    public function forceDelete(User $user, Ativo $ativo): bool
    {
        return false;
    }
}
