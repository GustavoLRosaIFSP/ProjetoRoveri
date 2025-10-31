<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investimento extends Model
{
    public $id;
    public $valorAplicado;
    public $dataInicio;
    public $dataFim;
    public $retornoPercentual;
}
