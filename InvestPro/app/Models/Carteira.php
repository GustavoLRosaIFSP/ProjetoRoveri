<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carteira extends Usuario
{
    private $id;
    private $nome;
    private $valor_total;
    private $quantidade;
    private $investimentos;


    public function add_investimento(Investimento $investimento){
        $this->investimentos[]=$investimento;
    }

    public function calcularRetornoTotal(){
        
    }

    public function adicionarInvestimento(){

    }

    public function removerInvestimento(){

    }
}
?>
