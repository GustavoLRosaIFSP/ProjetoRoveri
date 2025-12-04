<?php

namespace App\Http\Controllers;

use App\Models\Carteira;
use App\Models\Investimento;
use Illuminate\Http\Request;

class CarteiraController extends Controller
{
    /**
     * Exibe a carteira do usuário logado.
     */
    public function index()
    {
        $carteira = Carteira::with('investimentos')
            ->where('user_id', auth()->id())
            ->first();

        if (!$carteira) {
            $carteira = Carteira::create([
                'user_id'      => auth()->id(),
                'nome'         => 'Minha Carteira',
                'valor_total'  => 0,
                'quantidade'   => 0,
                'rentabilidade'=> 0,
            ]);
        }

        return view('carteira.index', compact('carteira'));
    }

    /**
     * Adiciona um novo investimento à carteira.
     */
    public function adicionarInvestimento(Request $request)
    {
        $request->validate([
            'nome'               => 'required|string|max:255',
            'categoria'          => 'required|string|max:255',
            'valorAplicado'      => 'required|numeric|min:1',
            'retornoPercentual'  => 'required|numeric|min:0',
        ]);

        $carteira = Carteira::where('user_id', auth()->id())->firstOrFail();

        $investimento = new Investimento($request->all());
        $investimento->carteira_id = $carteira->id;
        $investimento->save();

        $carteira->valor_total += $investimento->valorAplicado;
        $carteira->quantidade += 1;
        $carteira->save();

        return back()->with('success', 'Investimento adicionado com sucesso!');
    }

    /**
     * Remove investimento da carteira.
     */
    public function removerInvestimento($idInvest)
    {
        $carteira = Carteira::where('user_id', auth()->id())->firstOrFail();

        $investimento = Investimento::where('id', $idInvest)
            ->where('carteira_id', $carteira->id)
            ->firstOrFail();


        $carteira->valor_total -= $investimento->valorAplicado;
        $carteira->quantidade -= 1;
        $carteira->save();

        $investimento->delete();

        return back()->with('success', 'Investimento removido com sucesso!');
    }

    /**
     * Atualiza o nome da carteira.
     */
    public function updateNome(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255'
        ]);

        $carteira = Carteira::where('user_id', auth()->id())->firstOrFail();
        $carteira->update(['nome' => $request->nome]);

        return back()->with('success', 'Nome da carteira atualizado!');
    }

    /**
     * Retorna o valor de retorno total da carteira.
     */
    public function calcularRetornoTotal()
    {
        $carteira = Carteira::where('user_id', auth()->id())->firstOrFail();

        return response()->json([
            'carteira_id'    => $carteira->id,
            'retorno_total'  => $carteira->calcularRetornoTotal()
        ]);
    }
}

