<?php

namespace App\Http\Controllers;

use App\Models\Carteira;
use App\Models\Investimento;
use Illuminate\Http\Request;

class CarteiraController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $carteira = Carteira::with('investimentos')
            ->where('user_id', auth()->id())
            ->first();
=======
        $carteira = Carteira::where('user_id', auth()->id())->first();
>>>>>>> f29627458a52026712f774bfc900bc0edfe2e5a7

        if (!$carteira) {
            $carteira = Carteira::create([
                'user_id' => auth()->id(),
                'nome' => 'Minha Carteira',
                'valor_total' => 0,
<<<<<<< HEAD
                'quantidade' => 0
            ]);
        }

        return view('carteira.index', compact('carteira'));
    }
    public function create()
    {
        abort(403, "Você já possui uma carteira. Não é possível criar outra.");
    }

    public function store(Request $request)
    {
        $carteira = Carteira::where('user_id', auth()->id())->firstOrFail();

        $request->validate([
            'nome' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'valorAplicado' => 'required|numeric|min:1',
            'retornoPercentual' => 'required|numeric|min:0'
        ]);

        $precoAtual = $ativo->preco_atual;

        $quantidadeComprada = $request->valorAplicado / $precoAtual;

        $invest = Investimento::create([
            'carteira_id' => $carteira->id,
            'nome' => $request->nome,
            'categoria' => $request->categoria,
            'valorAplicado' => $request->valorAplicado,
            'retornoPercentual' => $request->retornoPercentual,
            'quantidade' => $quantidadeComprada
        ]);

        $carteira->valor_total += $request->valorAplicado;
        $carteira->quantidade += $quantidadeComprada;
        $carteira->save();

        return back()->with('success', 'Investimento adicionado com sucesso!');
    }

    public function removerInvestimento($id)
    {
        $carteira = Carteira::where('user_id', auth()->id())->firstOrFail();

        $invest = Investimento::where('id', $id)
            ->where('carteira_id', $carteira->id)
            ->firstOrFail();

        $invest->delete();

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

    public function remover($id)
    {
        $carteira = auth()->user()->carteira;

        $investimento = $carteira
            ->investimentos()
            ->findOrFail($id);

        $carteira->valor_total -= $investimento->valorAplicado;
        $carteira->quantidade -= $investimento->quantidade;
        $carteira->save();

        $investimento->delete();

        return redirect()->route('carteira.index')
            ->with('success', 'Investimento removido com sucesso!');
    }

=======
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
>>>>>>> f29627458a52026712f774bfc900bc0edfe2e5a7
}
