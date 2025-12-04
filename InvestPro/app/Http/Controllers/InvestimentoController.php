<?php

namespace App\Http\Controllers;

use App\Models\Investimento;
use App\Models\Ativo;
use App\Models\Carteira;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InvestimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $usuario = auth()->user();
        $riscoUsuario = $usuario->risco;

        $ativos = Ativo::orderByRaw("CASE WHEN risco = ? THEN 0 ELSE 1 END", [$riscoUsuario])
                    ->orderBy('nome', 'asc')
                    ->get();

        if (request()->wantsJson()) {
            return response()->json($ativos);
        }

        return view('investimentos.index', compact('ativos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('investimentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ativo_id' => 'required|exists:ativos,id',
            'valor_aplicado' => 'required|numeric|min:0.01',
        ]);

        $ativo = Ativo::findOrFail($request->ativo_id);

        $quantidade = $request->valor_aplicado / $ativo->preco_atual;

        $carteira = Carteira::firstOrCreate(
            ['user_id' => auth()->id()],
            ['nome' => 'Minha Carteira', 'valor_total' => 0, 'quantidade' => 0]
        );

        Investimento::create([
            'carteira_id'      => $carteira->id,
            'ativo_id'         => $ativo->id,

            'snapshot_nome'    => $ativo->nome,
            'snapshot_ticker'  => $ativo->codigo_ticker,
            'snapshot_preco'   => $ativo->preco_atual,
            'snapshot_tipo'    => $ativo->tipo,

            'valor_aplicado'   => $request->valor_aplicado,
            'quantidade'       => $quantidade,
            'data_inicio'      => now(),
        ]);

        $carteira->valor_total += $request->valor_aplicado;
        $carteira->quantidade += 1;
        $carteira->save();

        return redirect()->route('investimentos.index')
                        ->with('success', 'Investimento criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Investimento $investimento)
    {
        if (request()->wantsJson()) {
            return response()->json($investimento);
        }

        return view('investimentos.show', compact('investimento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Investimento $investimento)
    {
        return view('investimentos.edit', compact('investimento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Investimento $investimento)
    {
        $validated = $request->validate([
            'valorAplicado' => 'required|numeric|min:0',
            'dataInicio' => 'required|date',
            'dataFim' => 'nullable|date',
            'retornoPercentual' => 'nullable|numeric',
        ]);

        $investimento->update($validated);

        if ($request->wantsJson()) {
            return response()->json($investimento);
        }

        return redirect()->route('investimentos.index')
            ->with('success', 'Investimento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Investimento $investimento)
    {
        $investimento->delete();

        if (request()->wantsJson()) {
            return response()->json(['message' => 'Investimento excluído com sucesso']);
        }

        return redirect()->route('investimentos.index')
            ->with('success', 'Investimento excluído com sucesso!');
    }

    /**
     * Selecionar ativo para criar investimento
     */
    public function selecionarAtivo(Ativo $ativo)
    {
        return view('investimentos.create', compact('ativo'));
    }
}
