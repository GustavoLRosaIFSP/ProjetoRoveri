<x-app-layout>
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

            <p class="text-purple-300 text-lg">
                <strong>Valor Total:</strong>  
                R$ {{ number_format($carteira->valor_total, 2, ',', '.') }}
            </p>

            <p class="text-purple-300 text-lg">
                <strong>Quantidade:</strong> 
                {{ $carteira->investimentos->count() }}
            </p>
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

                            <td class="p-2">
                                R$ {{ number_format($inv->valor_aplicado, 2, ',', '.') }}
                            </td>

                            <td class="p-2">{{ $inv->retorno_percentual }}%</td>

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
                            <td colspan="5" class="p-4 text-center text-gray-400">
                                Nenhum investimento cadastrado.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
</x-app-layout>
