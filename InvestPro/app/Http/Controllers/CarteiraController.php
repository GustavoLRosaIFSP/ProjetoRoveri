<?php

namespace App\Http\Controllers;

use App\Models\Carteira;
use App\Models\Investimento;
use Illuminate\Http\Request;

class CarteiraController extends Controller
{
    public function index()
    {
        $carteiras = Carteira::where('user_id', auth()->id())->get();
        return view('carteiras.index', compact('carteiras'));
    }

    public function show($id)
    {
        $carteira = Carteira::findOrFail($id);
        return view('carteiras.show', compact('carteira'));
    }

    public function adicionarInvestimento(Request $request, $idCarteira)
    {
        $carteira = Carteira::findOrFail($idCarteira);

        $invest = new Investimento($request->all());
        $invest->carteira_id = $carteira->id;
        $carteira->adicionarInvestimento($invest);

        return redirect()->back()->with('success', 'Investimento adicionado!');
    }

    public function removerInvestimento($idCarteira, $idInvest)
    {
        $carteira = Carteira::findOrFail($idCarteira);

        $carteira->removerInvestimento($idInvest);

        return redirect()->back()->with('success', 'Investimento removido!');
    }

    public function calcularRetornoTotal($idCarteira)
    {
        $carteira = Carteira::findOrFail($idCarteira);

        $total = $carteira->calcularRetornoTotal();

        return response()->json([
            'carteira_id' => $carteira->id,
            'retorno_total' => $total
        ]);
    }
}
