<?php

namespace App\Http\Controllers;

use App\Models\Carteira;
use App\Models\Investimento;
use Illuminate\Http\Request;

class CarteiraController extends Controller
{
    public function index()
    {
        $carteira = Carteira::where('user_id', auth()->id())->first();

        if (!$carteira) {
            $carteira = Carteira::create([
                'user_id' => auth()->id(),
                'nome' => 'Minha Carteira',
                'valor_total' => 0,
                'rentabilidade' => 0,
            ]);
        }

        return view('carteira.index', compact('carteira'));
    }
    public function adicionarInvestimento(Request $request)
    {
        $carteira = Carteira::where('user_id', auth()->id())->firstOrFail();

        $investimento = new Investimento($request->all());
        $investimento->carteira_id = $carteira->id;
        $investimento->save();

        return back()->with('success', 'Investimento adicionado com sucesso!');
    }
    public function removerInvestimento($idInvest)
    {
        $carteira = Carteira::where('user_id', auth()->id())->firstOrFail();

        $investimento = Investimento::where('id', $idInvest)
            ->where('carteira_id', $carteira->id)
            ->firstOrFail();

        $investimento->delete();

        return back()->with('success', 'Investimento removido com sucesso!');
    }
    public function calcularRetornoTotal()
    {
        $carteira = Carteira::where('user_id', auth()->id())->firstOrFail();

        $total = $carteira->calcularRetornoTotal();

        return response()->json([
            'carteira_id' => $carteira->id,
            'retorno_total' => $total
        ]);
    }
}
