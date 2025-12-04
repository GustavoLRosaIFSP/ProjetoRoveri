<?php

namespace App\Models\Enum;

enum Tipo: string
{
    case ACAO = 'Ação';
    case FII = 'FII';
    case ETF = 'ETF';
    case RENDA_FIXA = 'Renda Fixa';

    public function label(): string
    {
        return match($this) {
            self::ACAO => 'Ação',
            self::FII => 'FII',
            self::ETF => 'ETF',
            self::RENDA_FIXA => 'Renda Fixa',
        };
    }
}
