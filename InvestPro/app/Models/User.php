<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Enum\Risco;
use App\Models\Enum\Categoria;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nome',
        'email',
        'password',
        'status',
        'criado_em',
        'categoria',
        'risco',
    ];  

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
        'criado_em'         => 'datetime',
        'status'            => 'boolean',
        'categoria'         => Categoria::class,
        'risco'             => Risco::class,
    ];

    public function carteira()
    {
        return $this->hasOne(Carteira::class, 'user_id');
    }

}
