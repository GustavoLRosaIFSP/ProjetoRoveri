<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investimento extends Model
{
    protected $fillable = [
        'valorAplicado',
        'dataInicio'
        'dataFim'
        'retornoPercentual'
        'ativoId'
    ];

    protected $casts =[
        'dataFim' => 'datetime',
        'dataFim' => 'datetime',
        'ativoId' => Ativo::class 
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

    public function setValorAplicado(double $valorAplicado){
        $this->valorAplicado = $valorAplicado;
        return $this;
    }

    public function getDataInicio():DateTime{
        return $this->dataInicio;

    }

    public function setDataInicio(DateTime $dataInicio):DateTime{
        $this->dataInicio = $dataInicio;
        return $this;
    }

    public function getDataFim():DateTime{
        return $this->dataFim;

    }

    public function setDataFim(DateTime $dataFim):DateTime{
        $this->dataFim = $dataFim;
        return $this;
    }

    public function getRetornoPercentual(){
        return $this->retornoPercentual;
    }

    public function setRetornoPercentual(double $retornoPercentual){
        $this->retornoPercentual = $retornoPercentual;
        return $this;
    }

    public function getAtivoId():Ativo{
        return $this->ativoId;
    }

    public function setAtivoId():Ativo{
        $this->ativoId = $ativoId;
        return $this;
    }
 }

?>
