<x-app-layout>
<<<<<<< HEAD
    <div class="max-w-5xl mx-auto py-8">

        <h1 class="text-3xl font-bold text-purple-300 mb-4">Minha Carteira</h1>

        <div class="bg-gray-900 p-6 mb-6 rounded-xl border border-purple-700/40 shadow-lg">
            <div class="mb-4">
                <form action="{{ route('carteira.updateNome') }}" method="POST" class="flex items-center gap-3">
                    @csrf
                    
                    <input type="text"
                        name="nome"
                        value="{{ $carteira->nome }}"
                        class="bg-gray-800 border border-purple-700/40 text-white p-2 rounded-lg w-64"
                        required>

                    <button class="bg-purple-600 hover:bg-purple-700 text-white font-semibold px-4 py-2 rounded-lg">
                        Salvar
                    </button>
                </form>
            </div>
            <p class="text-purple-300 text-lg"><strong>Valor Total:</strong> R$ {{ number_format($carteira->valor_total, 2, ',', '.') }}</p>
            <p class="text-purple-300 text-lg"><strong>Quantidade:</strong> {{ $carteira->investimentos->count()}}</p>
        </div>

        <h2 class="text-2xl text-purple-300 font-bold mb-4">Investimentos</h2>

        <div class="bg-gray-900 p-6 rounded-xl border border-purple-700/40 shadow-lg">
            <table class="w-full text-left text-purple-300">
                <thead>
                    <tr class="border-b border-purple-700/40">
                        <th class="p-2">Nome</th>
                        <th class="p-2">Categoria</th>
                        <th class="p-2">Aplicado</th>
                        <th class="p-2">Retorno (%)</th>
                        <th class="p-2 text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($carteira->investimentos as $inv)
                        <tr class="border-b border-purple-700/20">
                            <td class="p-2">{{ $inv->nome }}</td>
                            <td class="p-2">{{ $inv->categoria }}</td>
                            <td class="p-2">R$ {{ number_format($inv->valorAplicado, 2, ',', '.') }}</td>
                            <td class="p-2">{{ $inv->retorno_percentual }}%</td>
                            <td class="p-2">R$ {{ number_format($inv->rendimento_mensal, 2, ',', '.') }}</td>

                            <td class="p-2 text-center">
                                <form action="{{ route('carteira.remover', $inv->id) }}" method="POST">
                                    @csrf
                                    <button class="text-red-400 hover:text-red-300">
                                        Remover
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-4 text-center text-gray-400">Nenhum investimento cadastrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
=======
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-400 leading-tight">
            Minha Carteira
        </h2>
    </x-slot>

    <style>
        body { background: #0a0a0f; color: #e0e0ff; }
        .card-neon {
            background: #11111a;
            border: 1px solid #2a2a40;
            border-radius: 12px;
            padding: 20px;
            transition: 0.3s;
            box-shadow: 0 0 10px rgba(120, 60, 255, 0.2);
        }
        .card-neon:hover {
            border-color: #8f4cff;
            box-shadow: 0 0 15px rgba(120, 60, 255, 0.4);
        }
        .btn-neon {
            background: #7c3aed;
            border-radius: 10px;
            padding: 10px 18px;
            color: white;
            font-weight: bold;
            box-shadow: 0 0 10px rgba(140, 80, 255, 0.4);
            transition: 0.2s;
        }
        .btn-neon:hover {
            background: #9f6bff;
            box-shadow: 0 0 12px rgba(160, 120, 255, 0.7);
        }
    </style>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="card-neon mb-8">
                <h3 class="text-2xl font-semibold">{{ $carteira->nome }}</h3>

                <p class="text-gray-300 mt-2">
                    Sua carteira principal com resumo financeiro.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

                <div class="card-neon">
                    <h3 class="text-lg font-semibold">Valor Total</h3>
                    <p class="text-3xl mt-2">R$ {{ number_format($carteira->valor_total, 2, ',', '.') }}</p>
                </div>

                <div class="card-neon">
                    <h3 class="text-lg font-semibold">Investimentos</h3>
                    <p class="text-3xl mt-2 text-blue-400">{{ $carteira->investimentos_count }}</p>
                </div>

                <div class="card-neon">
                    <h3 class="text-lg font-semibold">Rentabilidade</h3>
                    <p class="text-3xl mt-2 text-green-400">{{ $carteira->rentabilidade }}%</p>
                </div>

            </div>

        </div>
    </div>

>>>>>>> f29627458a52026712f774bfc900bc0edfe2e5a7
</x-app-layout>
