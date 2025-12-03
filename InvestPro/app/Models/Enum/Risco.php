<?php

namespace App\Models\Enum;

enum Risco: string
{
    case CONSERVADOR = 'conservador';
    case MODERADO = 'moderado';
    case ARROJADO = 'arrojado';
    
    public function label(): string
    {
        return match($this) {
            self::CONSERVADOR => 'Conservador',
            self::MODERADO => 'Moderado',
            self::ARROJADO => 'Arrojado',
        };
    }
}