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
<<<<<<< HEAD

=======
>>>>>>> f29627458a52026712f774bfc900bc0edfe2e5a7
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
<<<<<<< HEAD

=======
>>>>>>> f29627458a52026712f774bfc900bc0edfe2e5a7
    public function investimentos()
    {
        return $this->hasMany(Investimento::class);
    }
    public function adicionarInvestimento(Investimento $investimento)
    {
        $this->investimentos()->save($investimento);

        $this->valor_total += $investimento->valorAplicado;
        $this->quantidade++;

        $this->save();
    }
    public function removerInvestimento($id)
    {
        $invest = $this->investimentos()->find($id);

        if (!$invest) {
            return false;
        }

        $this->valor_total -= $invest->valorAplicado;
        $this->quantidade--;

        $this->save();

        $invest->delete();
        return true;
    }
    public function calcularRetornoTotal()
    {
        return $this->investimentos->sum(function ($inv) {
            return $inv->valorAplicado * ($inv->retornoPercentual / 100);
        });
    }
}
