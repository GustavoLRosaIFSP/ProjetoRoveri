<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-purple-300">
            Investir em Ativos
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#0d0d16] shadow-md shadow-purple-900/40 rounded-xl p-6">

                <h3 class="text-purple-300 text-lg font-bold mb-6">
                    Selecione um Ativo para Investir
                </h3>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-purple-200">
                        <thead>
                            <tr class="border-b border-purple-800">
                                <th class="py-3 px-4">Ativo</th>
                                <th class="py-3 px-4">Preço</th>
                                <th class="py-3 px-4">Risco</th>
                                <th class="py-3 px-4">Ação</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($ativos as $ativo)
                                <tr class="border-b border-purple-800/50 hover:bg-purple-900/20 transition">
                                    <td class="py-3 px-4">{{ $ativo->nome }} ({{ $ativo->codigo_ticker }})</td>
                                    <td class="py-3 px-4">R$ {{ number_format($ativo->preco_atual, 2, ',', '.') }}</td>
                                    <td class="py-3 px-4">{{ $ativo->risco->label() }}</td>
                                    <td class="py-3 px-4">
                                        <a href="{{ route('investimentos.selecionar', $ativo->id) }}"
                                           class="bg-purple-600 hover:bg-purple-700 px-3 py-1 rounded-lg text-white text-sm">
                                            Selecionar Ativo
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
