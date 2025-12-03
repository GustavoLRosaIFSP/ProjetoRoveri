<?php

namespace App\Models\Enum;

use Illuminate\Database\Eloquent\Model;
enum Risco{
    case conservador;
    case moderado;
    case arrojado;
}
?>