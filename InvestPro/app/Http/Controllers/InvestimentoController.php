<?php

namespace App\Http\Controllers;

use App\Models\Investimento;
use Illuminate\Http\Request;

class InvestimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Para API - retorna JSON
        if (request()->wantsJson()) {
            $investimentos = Investimento::all();
            return response()->json($investimentos);
        }
        
        // Para Web - retorna view
        $investimentos = Investimento::all();
        return view('investimentos.index', compact('investimentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('investimentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'valorAplicado' => 'required|numeric|min:0',
            'dataInicio' => 'required|date',
            'dataFim' => 'nullable|date',
            'retornoPercentual' => 'nullable|numeric',
        ]);

        $investimento = Investimento::create($validated);
        
        if ($request->wantsJson()) {
            return response()->json($investimento, 201);
        }
        
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
}