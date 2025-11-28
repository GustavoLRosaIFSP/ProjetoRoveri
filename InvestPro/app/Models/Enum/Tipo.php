<?php

namespace App\Models\Enum;

use Illuminate\Database\Eloquent\Model;
enum Tipo{
    case acao;
    case fundo;
    case tesouro;
    case bitcoin;
}
?>