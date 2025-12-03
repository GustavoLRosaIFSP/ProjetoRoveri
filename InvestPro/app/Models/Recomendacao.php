<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recomendacao extends Model
{
    public $id;
    public $descricao;
    public $justificativa;
    public $score;
}
