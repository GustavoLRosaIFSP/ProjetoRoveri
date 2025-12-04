<?php

namespace App\Models\Enum;

use Illuminate\Database\Eloquent\Model;
enum Categoria : string 
{
    case USUARIO = 'usuario';
    case ADMINISTRADOR = 'administrador';
    
    public function label(): string
    {
        return match($this){
            self::USUARIO => 'Usuario',
            self::ADMINISTRADOR => 'Adminstrador',
        };
    }
}
?>
