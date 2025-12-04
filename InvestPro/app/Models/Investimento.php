<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investimento extends Model
{
    use HasFactory;

    protected $fillable = [
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
=======
>>>>>>> origin/develop
        'valorAplicado',
        'dataInicio',
        'dataFim',
        'retornoPercentual',
        'ativo_id'
<<<<<<< HEAD
>>>>>>> f29627458a52026712f774bfc900bc0edfe2e5a7
=======
>>>>>>> origin/develop
    ];

    public function ativo()
    {
        return $this->belongsTo(Ativo::class);
    }

<<<<<<< HEAD
<<<<<<< HEAD
    public function getRendimentoMensalAttribute()
    {
        $percentual = $this->ativo->rendimento_percentual;

        return $this->valor_aplicado * ($percentual / 100);
    }

=======
>>>>>>> f29627458a52026712f774bfc900bc0edfe2e5a7
=======
>>>>>>> origin/develop
}

?>
