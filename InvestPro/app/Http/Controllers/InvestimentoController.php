<?php

namespace App\Http\Controllers;
use App\Models\Ativo;  

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Investimento;
use Illuminate\View\View;

class InvestimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $investimentos = Investimento::orderBy('dataFim', 'desc')->get();

        return view('investimento.index', compact('investimentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $ativos = Ativo::all();
        return view('investimentos.create', compact('ativos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'valorAplicado' => 'required|numeric',
            'dataInicio' => 'required|date',
            'dataFim' => 'required|date|after_or_equal:dataInicio',
            'retornoPercentual' => 'required|numeric',
            'ativo_id' => 'nullable|exists:ativos,id'

        ]);

        Investimento::create($validated);

        return redirect()->route('investimentos.index')
            ->with('success', 'Investimento cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $investimento = Investimento::findOrFail($id);

        return view('investimentos.show', compact('investimento'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $investimento = Investimento::findOrFail($id);
        $ativos = Ativo::all();

        return view('investimentos.edit', compact('investimento', 'ativos'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'valorAplicado' => 'required|numeric',
            'dataInicio' => 'required|date',
            'dataFim' => 'required|date|after_or_equal:dataInicio',
            'retornoPercentual' => 'required|numeric',
            'ativo_id' => 'nullable|exists:ativos,id'
        ]);

        $investimento = Investimento::findOrFail($id);
        $investimento->update($validated);

        return redirect()->route('investimentos.index')
            ->with('success', 'Investimento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $investimento = Investimento::findOrFail($id);
        $investimento->delete();
    }

    public function calculaRetorno(string $id)
    {
        $investimento = Investimento::findOrFail($id);

        $valorAplicado = $investimento->valorAplicado;
        $retornoPercentual = $investimento->retornoPercentual;
        $dataInicio = Carbon::parse($investimento->dataInicio);
        $dataFim = Carbon::parse($investimento->dataFim);

        $dias = $dataInicio->diffInDays($dataFim);

        $totalObtido = $valorAplicado * ($retornoPercentual / 100);

        $valorFinal = $valorAplicado + $totalObtido;

        $investimento->valorFinal = $valorFinal ?? null;
        $investimento->save();

        return redirect()->route('investimentos.index')
            ->with('success', "Investimento #{$investimento->id} calculado com sucesso! Valor final: R$ " . number_format($valorFinal, 2, ',', '.'));
    }
    
    public function encerrarInvestimento(){
        
    }
}