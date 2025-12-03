<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ativo extends Model
{
    protected $fillable = [
        'nome', 
        'codigo_ticker',
        'preco_atual'
    ];

    public function investimentos()
    {
        return $this->hasMany(Investimento::class);
    }
}

