<?php

namespace App\Repositories;

use App\Models\Usuario;

class UsuarioRepository
{
    public function all()
    {
        return Usuario::all();
    }

    public function find($id)
    {
        return Usuario::find($id);
    }

    public function buscarEmail($email)
    {
        return Usuario::where('email', $email)->first();
    }

    public function create(array $data)
    {
        return Usuario::create($data);
    }

    public function update($id, array $data)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) return null;
        
        $usuario->update($data);
        return $usuario;
    }

    public function delete($id)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) return false;

        $usuario->delete();
        return true;
    }
}
