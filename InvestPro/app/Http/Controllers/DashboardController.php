<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CarteiraController;
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
        
        $saldoDisponivel = $carteira ? $carteira->valor_total : 0;
        $totalInvestido = $carteira ? $carteira->investimentos()->sum('valor_aplicado') : 0;

        $patrimonioTotal =  $saldoDisponivel + $totalInvestido;

        $totalRetorno = 0;
        $investimentos = $carteira->investimentos()->with('ativo')->get();

        foreach ($investimentos as $investimento) {
            $percentual = $investimento->ativo->rendimento_percentual ?? 0;
            $retorno = $investimento->valor_aplicado * ($percentual / 100);
            $totalRetorno += $retorno;
        }

        $rendimentoTotal = $totalRetorno;

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
            'saldoDisponivel' => $saldoDisponivel,
            'patrimonioTotal' => $patrimonioTotal,
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
        $cores = [];
        
        $coresConfig = [
            'ACAO' => '#4F46E5',
            'FII' => '#10B981',
            'RENDA_FIXA' => '#F59E0B',
            'CRIPTO' => '#EF4444',
            'ETF' => '#3B82F6', // Adicione mais cores se necessário
            'BDR' => '#8B5CF6',
        ];
        
        foreach ($alocacao as $item) {
            $labels[] = $this->formatarTipo($item->tipo);
            $valores[] = (float) $item->total;
            $cores[] = $coresConfig[$item->tipo] ?? $this->gerarCorAleatoria($item->tipo);
        }
        
        return [
            'labels' => $labels,
            'valores' => $valores,
            'cores' => $cores
        ];
    }

    private function gerarCorAleatoria($tipo)
    {
        $cores = ['#3B82F6', '#EF4444', '#10B981', '#F59E0B', '#8B5CF6', '#EC4899'];
        return $cores[crc32($tipo) % count($cores)];
    }

    private function formatarTipo(string $tipo)
    {
        return match($tipo) {
            'ACAO' => 'Ações',
            'FII' => 'Fundos',
            'RENDA_FIXA' => 'Renda Fixa',
            'CRIPTO' => 'Criptomoedas',
            'ETF' => 'ETF',
            default => $tipo
        };
    }


}