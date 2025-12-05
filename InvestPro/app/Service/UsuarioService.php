<?php

namespace App\Services;

use App\Repositories\UsuarioRepository;
use Illuminate\Support\Facades\Hash;

class UsuarioService
{
    protected $repository;

    public function __construct(UsuarioRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listar()
    {
        return $this->repository->all();
    }

    public function buscar($id)
    {
        return $this->repository->find($id);
    }

    public function criar(array $data)
    {   
        if($this->repository->buscarEmail($data['email'])){
            throw new \Exception("Email já cadastrado");
        }
        $data['senha'] = Hash::make($data['senha']);
        return $this->repository->create($data);
    }

    public function atualizar($id, array $data)
    {
        if (isset($data['senha'])) {
            $data['senha'] = Hash::make($data['senha']);
        }

        return $this->repository->update($id, $data);
    }

    public function excluir($id)
    {
        return $this->repository->delete($id);
    }
}
