<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carteira extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'valor_total',
        'quantidade',
        'user_id'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function investimentos()
    {
        return $this->hasMany(Investimento::class, 'carteira_id');
    }


    public function calcularRetornoTotal()
    {
        $totalInvestido = $this->investimentos()->sum('valor_aplicado');
        $valorAtual = $this->valor_total;
        
        return $valorAtual - $totalInvestido;
    }

    public function calcularRetornoPercentual()
    {
        $totalInvestido = $this->investimentos()->sum('valor_aplicado');
        
        if ($totalInvestido <= 0) {
            return 0;
        }
        
        $retornoTotal = $this->calcularRetornoTotal();
        return ($retornoTotal / $totalInvestido) * 100;
    }
}
