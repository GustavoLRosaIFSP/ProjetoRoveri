<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Carteira;
use App\Models\Investimento;
use App\Models\Ativo;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $carteira = $user->carteira;

        $patrimonioTotal = $carteira ? $carteira->valor_total : 0;

        $rendimentoTotal = $carteira ? $carteira->calcularRetornoTotal() : 0;

        $rentabilidadePercentual = $patrimonioTotal > 0 ? ($rendimentoTotal / $patrimonioTotal) * 100 : 0;
        
        $inicioMes = Carbon::now()->startOfMonth();
        $carteiraId = $user->carteira->id ?? null;

        if ($carteiraId) {
            $investimentoMes = Investimento::where('carteira_id', $carteiraId)
                ->where('created_at', '>=', $inicioMes)
                ->sum('valor_aplicado');
            
            $operacoesMes = Investimento::where('carteira_id', $carteiraId)
                ->where('created_at', '>=', $inicioMes)
                ->count();
            
            $ativosDistintos = Investimento::where('carteira_id', $carteiraId)
                ->distinct('ativo_id')
                ->count('ativo_id');
            
            $categoriasUnicas = Investimento::where('carteira_id', $carteiraId)
                ->join('ativos', 'investimentos.ativo_id', '=', 'ativos.id')
                ->distinct('ativos.tipo')
                ->count('ativos.tipo');
            
            $alocacaoData = $this->getAlocacaoAtivos($carteiraId);
            
            $ultimosInvestimentos = Investimento::where('carteira_id', $carteiraId)
                ->with('ativo')
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
        } else {
            $investimentoMes = 0;
            $operacoesMes = 0;
            $ativosDistintos = 0;
            $categoriasUnicas = 0;
            $alocacaoData = ['labels' => [], 'valores' => [], 'cores' => []];
            $ultimosInvestimentos = collect();
        }
        
        
        $performanceLabels = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
        $performanceValores = [100, 105, 110, 108, 115, 118, 122, 125, 128, 132, 135, 140];
        
        return view('dashboard', [
            'patrimonioTotal' => $patrimonioTotal,
            'rentabilidadePercentual' => $rentabilidadePercentual,
            'investimentoMes' => $investimentoMes,
            'operacoesMes' => $operacoesMes,
            'ativosDistintos' => $ativosDistintos,
            'categoriasUnicas' => $categoriasUnicas,
            'alocacaoLabels' => $alocacaoData['labels'],
            'alocacaoValores' => $alocacaoData['valores'],
            'alocacaoCores' => $alocacaoData['cores'],
            'performanceLabels' => $performanceLabels,
            'performanceValores' => $performanceValores,
            'ultimosInvestimentos' => $ultimosInvestimentos,
            'rendimentoTotal' => $rendimentoTotal,
        ]);
    }
    
    private function getAlocacaoAtivos($carteiraId) 
    {
        $alocacao = Investimento::where('carteira_id', $carteiraId) 
            ->join('ativos', 'investimentos.ativo_id', '=', 'ativos.id')
            ->selectRaw('ativos.tipo, SUM(investimentos.valor_aplicado) as total')
            ->groupBy('ativos.tipo')
            ->get();
            
        $labels = [];
        $valores = [];
        $cores = [
            'ACAO' => '#4F46E5',
            'FII' => '#10B981',
            'RENDA_FIXA' => '#F59E0B',
            'CRIPTO' => '#EF4444',
        ];
        
        foreach ($alocacao as $item) {
            $labels[] = $this->formatarTipo($item->tipo);
            $valores[] = $item->total;
        }
        
        return [
            'labels' => $labels,
            'valores' => $valores,
            'cores' => array_values($cores)
        ];
    }

    private function formatarTipo($tipo)
    {
        return match($tipo) {
            'ACAO' => 'Ações',
            'FII' => 'Fundos',
            'RENDA_FIXA' => 'Renda Fixa',
            'CRIPTO' => 'Criptomoedas',
            default => $tipo
        };
    }
}