<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ativo extends Model
{
    public $id;
    public $descricao;
    public $codigoTicker;
    public $precoAtual;
}
