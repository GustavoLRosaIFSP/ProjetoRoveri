<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'valorAplicado',
        'dataInicio',
        'dataFim',
        'retornoPercentual',
        'ativo_id'
    ];

    public function ativo()
    {
        return $this->belongsTo(Ativo::class);
    }

}

?>
