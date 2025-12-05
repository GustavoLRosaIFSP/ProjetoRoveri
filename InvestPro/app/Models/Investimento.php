<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investimento extends Model
{
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
        'retorno_percentual',
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

    public function getValorAplicado(){
        return $this->valorAplicado;
    }

    public function setValorAplicado($valorAplicado){
        $this->valorAplicado = $valorAplicado;
        return $this;
    }

    public function getRendimentoMensalAttribute()
    {
        $percentual = $this->ativo->rendimento_percentual;

        return $this->valor_aplicado * ($percentual / 100);
    }

    public function ativo()
    {
        return $this->belongsTo(Ativo::class, 'ativo_id');
    }

    public function rendimentoPercentual()
    {
        return $this->ativo->rendimento_percentual;
    }

    public function rendimentoMonetario()
    {
        return $this->valor_aplicado * ($this->rendimentoPercentual() / 100);
    }

}

?>
