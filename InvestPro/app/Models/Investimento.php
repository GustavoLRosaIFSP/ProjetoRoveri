<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'carteira_id',
        'ativo_id',
        'snapshot_nome',
        'snapshot_ticker',
        'snapshot_preco',
        'snapshot_tipo',
        'valor_aplicado',
        'quantidade',
        'data_inicio',
        'data_fim',
    ];

    public function ativo()
    {
        return $this->belongsTo(Ativo::class);
    }

    public function getRendimentoMensalAttribute()
    {
        $percentual = $this->ativo->rendimento_percentual;

        return $this->valor_aplicado * ($percentual / 100);
    }

}

?>
