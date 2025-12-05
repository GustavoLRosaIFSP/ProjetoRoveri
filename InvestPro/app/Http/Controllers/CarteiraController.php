<?php

namespace App\Http\Controllers;

use App\Models\Carteira;
use App\Models\Investimento;
use Illuminate\Http\Request;

class CarteiraController extends Controller
{
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
    public function removerInvestimento(Request $request)
    {
        $carteira = Carteira::where('user_id', auth()->id())->firstOrFail();

        $investimento = Investimento::where('id', $request->idInvest)
            ->where('carteira_id', $carteira->id)
            ->firstOrFail();

        $carteira->valor_total += $investimento->valor_aplicado;

        $carteira->quantidade -= 1;
        $carteira->save();

        $investimento->delete();

        return back()->with('success', 'Investimento removido com sucesso!');
    }

    public function updateNome(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255'
        ]);

        $carteira = Carteira::where('user_id', auth()->id())->firstOrFail();
        $carteira->update(['nome' => $request->nome]);

        return back()->with('success', 'Nome da carteira atualizado!');
    }
    public function calcularRetornoTotal()
    {
        return $this->investimentos->sum(function ($inv) {
            return $inv->valor_aplicado * ($inv->retorno_percentual / 100);
        });
    }

    public function adicionarSaldo(Request $request)
    {
        $request->validate([
            'valor' => 'required|numeric|min:1'
        ]);

        $carteira = Carteira::where('user_id', auth()->id())->firstOrFail();

        $carteira->valor_total += $request->valor;
        $carteira->save();

        return back()->with('success', 'Valor adicionado com sucesso!');
    }

    public function sacarSaldo(Request $request)
    {
        $request->validate([
            'valor' => 'required|numeric|min:1'
        ]);

        $carteira = Carteira::where('user_id', auth()->id())->firstOrFail();

        if ($request->valor > $carteira->valor_total) {
            return back()->with('error', 'Saldo insuficiente.');
        }

        $carteira->valor_total -= $request->valor;
        $carteira->save();

        return back()->with('success', 'Saque realizado com sucesso!');
    }


}

