<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-purple-300">
            Criar Investimento
        </h2>
    </x-slot>

    <div class="py-10 max-w-3xl mx-auto">
        <form action="{{ route('investimentos.store') }}" method="POST" 
            class="bg-[#0d0d16] p-6 rounded-xl shadow-md shadow-purple-900/40 text-purple-200">
            
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Valor Aplicado</label>
                <input type="number" step="0.01" name="valorAplicado" 
                       class="w-full rounded p-2 bg-gray-900 border border-purple-700">
            </div>

            <div class="mb-4">
                <label class="block mb-1">Data Início</label>
                <input type="date" name="dataInicio" 
                       class="w-full rounded p-2 bg-gray-900 border border-purple-700">
            </div>

            <div class="mb-4">
                <label class="block mb-1">Data Fim</label>
                <input type="date" name="dataFim" 
                       class="w-full rounded p-2 bg-gray-900 border border-purple-700">
            </div>

            <div class="mb-4">
                <label class="block mb-1">Retorno (%)</label>
                <input type="number" step="0.01" name="retornoPercentual" 
                       class="w-full rounded p-2 bg-gray-900 border border-purple-700">
            </div>

            <button class="bg-purple-600 px-4 py-2 mt-4 rounded">Salvar</button>
        </form>
    </div>
</x-app-layout>
