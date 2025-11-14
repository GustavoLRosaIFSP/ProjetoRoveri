<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Enum\Categoria;
use App\Models\Enum\Risco;
use DateTime;

class Usuario extends Model
{

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'criado_em',
        'status',
        'categoria',
        'risco',
    ];

    protected $casts = [
        'criado_em' => 'datetime',
        'status' => 'boolean',
        'categoria' => Categoria::class,
        'risco' => Risco::class,
    ];

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

    public function getCriadoEm(): DateTime
    {
        return $this->criado_em;
    }

    public function setCriadoEm(DateTime $criado_em)
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

    public function getCategoria(): Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(Categoria $categoria): static
    {
        $this->categoria = $categoria;
        return $this;
    }

    public function getPerfil(): Risco
    {
        return $this->risco;
    }

    public function setPerfil(Risco $risco): static
    {
        $this->risco = $risco;
        return $this;
    }
}
