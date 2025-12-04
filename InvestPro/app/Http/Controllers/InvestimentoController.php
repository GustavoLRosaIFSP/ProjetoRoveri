<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
<<<<<<< HEAD
use App\Models\Investimento;
use App\Models\Ativo;
use App\Models\Carteira;
=======
use Carbon\Carbon;
>>>>>>> f29627458a52026712f774bfc900bc0edfe2e5a7
=======
use Carbon\Carbon;
>>>>>>> origin/develop
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
<<<<<<< HEAD
<<<<<<< HEAD
        $usuario = auth()->user();
        $riscoUsuario = $usuario->risco;

        $ativos = Ativo::orderByRaw("CASE WHEN risco = ? THEN 0 ELSE 1 END", [$riscoUsuario])
                    ->orderBy('nome', 'asc')
                    ->get();

        if (request()->wantsJson()) {
            return response()->json($ativos);
        }

        return view('investimentos.index', compact('ativos'));
=======
        $investimentos = Investimento::orderBy('dataFim', 'desc')->get();

        return view('investimento.index', compact('investimentos'));
>>>>>>> f29627458a52026712f774bfc900bc0edfe2e5a7
=======
        $investimentos = Investimento::orderBy('dataFim', 'desc')->get();

        return view('investimento.index', compact('investimentos'));
>>>>>>> origin/develop
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return view('investimentos.create');
=======
        return view('investimento.create');
>>>>>>> f29627458a52026712f774bfc900bc0edfe2e5a7
=======
        return view('investimento.create');
>>>>>>> origin/develop
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
<<<<<<< HEAD
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
            'carteira_id' => $carteira->id,
            'ativo_id' => $ativo->id,

            'snapshot_nome' => $ativo->nome,
            'snapshot_ticker' => $ativo->codigo_ticker,
            'snapshot_preco' => $ativo->preco_atual,
            'snapshot_tipo' => $ativo->tipo,

            'valor_aplicado' => $request->valor_aplicado,
            'quantidade' => $quantidade,
            'data_inicio' => now(),
        ]);

        $carteira->valor_total += $request->valor_aplicado;
        $carteira->quantidade += 1;  
        $carteira->save();

        return redirect()->route('investimentos.index')
                        ->with('success', 'Investimento criado com sucesso!');
=======
=======
>>>>>>> origin/develop
        $validated = $request->validate([
            'valorAplicado' => 'required|numeric',
            'dataInicio' => 'required|date',
            'dataFim' => 'required|date|after_or_equal:dataInicio',
            'retornoPercentual' => 'required|numeric',
            'ativo_id' => 'required|exists:ativos,id'
        ]);

        Investimento::create($validated);

        return redirect()->route('investimento.index')
            ->with('success', 'Investimento cadastrado com sucesso!');
<<<<<<< HEAD
>>>>>>> f29627458a52026712f774bfc900bc0edfe2e5a7
=======
>>>>>>> origin/develop
    }

    /**
     * Display the specified resource.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function show(Investimento $investimento)
    {
        if (request()->wantsJson()) {
            return response()->json($investimento);
        }
        
        return view('investimentos.show', compact('investimento'));
=======
    public function show(string $id): View
    {
        $investimento = Investimento::findOrFail($id);

        return view('investimento.show', compact('investimento'));
>>>>>>> f29627458a52026712f774bfc900bc0edfe2e5a7
=======
    public function show(string $id): View
    {
        $investimento = Investimento::findOrFail($id);

        return view('investimento.show', compact('investimento'));
>>>>>>> origin/develop
    }

    /**
     * Show the form for editing the specified resource.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function edit(Investimento $investimento)
    {
        return view('investimentos.edit', compact('investimento'));
=======
    public function edit(string $id): View
    {
        $investimento = Investimento::findOrFail($id);

        return view('investimento.edit', compact('investimento'));
>>>>>>> f29627458a52026712f774bfc900bc0edfe2e5a7
=======
    public function edit(string $id): View
    {
        $investimento = Investimento::findOrFail($id);

        return view('investimento.edit', compact('investimento'));
>>>>>>> origin/develop
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Investimento $investimento)
    {
        $validated = $request->validate([
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
=======
>>>>>>> origin/develop
            'valorAplicado' => 'required|numeric',
            'dataInicio' => 'required|date',
            'dataFim' => 'required|date|after_or_equal:dataInicio',
            'retornoPercentual' => 'required|numeric',
            'ativo_id' => 'required|exists:ativos,id'
        ]);

        $investimento = Investimento::findOrFail($id);
        $investimento->update($validated);

        return redirect()->route('investimento.index')
<<<<<<< HEAD
>>>>>>> f29627458a52026712f774bfc900bc0edfe2e5a7
=======
>>>>>>> origin/develop
            ->with('success', 'Investimento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Investimento $investimento)
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $investimento->delete();
        
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Investimento excluído com sucesso']);
        }
        
        return redirect()->route('investimentos.index')
            ->with('success', 'Investimento excluído com sucesso!');
=======
=======
>>>>>>> origin/develop
        $investimento = Investimento::findOrFail($id);
        $investimento->delete();

        return redirect()->route('investimento.index')
            ->with('success', 'Investimento excluído com sucesso!');
<<<<<<< HEAD
=======
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

        return redirect()->route('investimento.index')
            ->with('success', "Investimento #{$investimento->id} calculado com sucesso! Valor final: R$ " . number_format($valorFinal, 2, ',', '.'));
    }
    
    public function encerrarInvestimento(){
        
>>>>>>> origin/develop
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

        return redirect()->route('investimento.index')
            ->with('success', "Investimento #{$investimento->id} calculado com sucesso! Valor final: R$ " . number_format($valorFinal, 2, ',', '.'));
    }
    
    public function encerrarInvestimento(){
        
>>>>>>> f29627458a52026712f774bfc900bc0edfe2e5a7
    }

    public function selecionarAtivo(Ativo $ativo)
    {
        return view('investimentos.create', compact('ativo'));
    }

}