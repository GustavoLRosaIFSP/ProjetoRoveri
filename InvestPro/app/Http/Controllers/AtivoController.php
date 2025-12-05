<?php

namespace App\Http\Controllers;
new \App\Service\AlphaVantageService();

use App\Models\Ativo;
use App\Models\Enum\Tipo;
use App\Models\Enum\Risco;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AtivoController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ativos = Ativo::orderBy('nome')->get();

        return view('ativos.index', compact('ativos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ativos.create', [
            'tipos' => Tipo::cases(),
            'riscos' => Risco::cases()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $this->authorize('create', Ativo::class);

        $req->validate([
            'nome' => 'required|string',
            'codigo_ticker' => 'required|string|unique:ativos,codigo_ticker',
            'preco_atual' => 'required|numeric',
            'tipo' => 'required|string',
            'risco' => 'required|string',
        ]);

        Ativo::create($req->all());

        return redirect()->route('ativos.index')
            ->with('success', 'Ativo cadastrado com sucesso!');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ativo $ativo)
    {
        return view('ativos.edit', [
            'ativo' => $ativo,
            'tipos' => Tipo::cases(),
            'riscos' => Risco::cases()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, Ativo $ativo)
    {
        $this->authorize('update', $ativo);

        $req->validate([
            'nome' => 'required|string',
            'codigo_ticker' => 'required|string|unique:ativos,codigo_ticker,' . $ativo->id,
            'preco_atual' => 'required|numeric',
            'tipo' => 'required|string',
            'risco' => 'required|string',
        ]);

        $ativo->update($req->all());

        return redirect()->route('ativos.index')
            ->with('success', 'Ativo atualizado com sucesso!');
    }


    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ativo $ativo)
    {
        $ativo->delete();

        if (request()->wantsJson()) {
            return response()->json(['message' => 'Ativo excluído com sucesso']);
        }

        return redirect()->route('ativos.index')
            ->with('success', 'Ativo excluído com sucesso!');
    }
}
