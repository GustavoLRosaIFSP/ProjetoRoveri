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
            'ACAO' => $this->risco === 'alto' ? 1.5 : 1.0,
            'FII' => 0.8,
            'RENDA_FIXA' => 0.5,
            'CRIPTO' => 4.0,
            default => 0.0,
        };
    }

    public function getRendimentoMensalAttribute()
    {
        return $this->valor_aplicado * ($this->ativo->rendimento_percentual / 100);
    }
}

