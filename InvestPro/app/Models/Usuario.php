<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    // Atributos
    protected $id;
    protected $nome;
    protected $email;
    protected $senha;
    protected $criado_em;
    protected $status;

    protected Categoria $categoria;
    protected Perfil $perfil;


    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha)
    {
        $this->senha = $senha;
        return $this;
    }

    public function getCriadoEm(): int
    {
        return $this->criado_em;
    }

    public function setCriadoEm(int $criado_em)
    {
        $this->criado_em = $criado_em;
        return $this;
    }

    public function getStatus(): bool
    {
        return $this->status;
    }

    public function setStatus(bool $status)
    {
        $this->status = $status;
        return $this;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
        return $this;
    }

    public function getPerfil()
    {
        return $this->perfil;
    }

    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;
        return $this;
    }

    // --- Métodos de comportamento ---

    public function autenticar(): void
    {
        // Lógica de autenticação
        // Exemplo: verificar email e senha
    }

    public function atualizarPerfil(): void
    {
        // Lógica para atualizar dados do usuário
    }
}
