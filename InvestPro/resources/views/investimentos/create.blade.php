<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">
        <a href="{{ route('investimentos.index') }}"
           class="text-purple-400 hover:text-purple-300 transition">
            ← Voltar
        </a>

        <h1 class="text-2xl font-bold text-purple-300 mt-4 mb-6">Adicionar Investimento</h1>

        <div class="bg-gray-900 p-6 rounded-xl shadow-lg border border-purple-700/40">
            <form action="{{ route('investimentos.store') }}" method="POST" class="space-y-6">
                @csrf

                <input type="hidden" name="ativo_id" value="{{ $ativo->id }}">
                <div>
                    <label class="text-purple-300 font-semibold">Ativo Selecionado</label>
                    <input type="text" value="{{ $ativo->nome }} ({{ $ativo->codigo_ticker }})"
                        class="w-full bg-gray-800 text-white p-2 rounded-lg"
                        disabled>
                </div>

                <div>
                    <label class="block text-purple-300 mb-1 font-semibold">Valor Aplicado (R$)</label>
                    <input type="number" name="valor_aplicado" step="0.01" required
                        class="w-full bg-gray-800 border border-purple-700/40 text-white p-2 rounded-lg">
                </div>


                <div class="flex justify-end">
                    <button
                        class="bg-purple-600 hover:bg-purple-700 text-white font-bold px-4 py-2 rounded-lg shadow-lg transition">
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
