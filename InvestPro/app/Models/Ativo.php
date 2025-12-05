<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Enum\Tipo;
use App\Models\Enum\Risco;

class Ativo extends Model
{
    protected $fillable = [
        'nome',
        'codigo_ticker',
        'preco_atual',
        'tipo',
        'risco'
    ];

    protected $casts = [
        'tipo' => Tipo::class,
        'risco' => Risco::class,
    ];

    public function getRendimentoPercentualAttribute()
    {
        return match ($this->tipo) {
            
            Tipo::ACAO => match ($this->risco) {
                Risco::ARROJADO => 0.3,
                Risco::MODERADO => 0.2,
                Risco::CONSERVADOR => 0.1,
            },

            Tipo::FII => 0.3,

            Tipo::RENDA_FIXA => 0.4,

            Tipo::ETF => 0.3,

            default => 0.0,
        };
    }
}

