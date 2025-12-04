<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">
        <a href="{{ route('investimentos.index') }}"
           class="text-purple-400 hover:text-purple-300 transition">
            ← Voltar
        </a>

        <h1 class="text-2xl font-bold text-purple-300 mt-4 mb-6">Editar Investimento</h1>

        <div class="bg-gray-900 p-6 rounded-xl shadow-lg border border-purple-700/40">
            <form action="{{ route('investimentos.update', $investimento->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Nome -->
                <div>
                    <label class="block text-purple-300 mb-1 font-semibold">Nome</label>
                    <input type="text" name="nome" required
                           value="{{ $investimento->nome }}"
                           class="w-full bg-gray-800 border border-purple-700/40 text-white p-2 rounded-lg">
                </div>

                <!-- Categoria -->
                <div>
                    <label class="block text-purple-300 mb-1 font-semibold">Categoria</label>
                    <input type="text" name="categoria" required
                           value="{{ $investimento->categoria }}"
                           class="w-full bg-gray-800 border border-purple-700/40 text-white p-2 rounded-lg">
                </div>

                <!-- Rendimento -->
                <div>
                    <label class="block text-purple-300 mb-1 font-semibold">Rendimento (R$)</label>
                    <input type="number" step="0.01" name="rendimento" required
                           value="{{ $investimento->rendimento }}"
                           class="w-full bg-gray-800 border border-purple-700/40 text-white p-2 rounded-lg">
                </div>

                <div class="flex justify-between">
                    <button type="submit"
                        class="bg-purple-600 hover:bg-purple-700 text-white font-bold px-4 py-2 rounded-lg shadow-lg transition">
                        Atualizar
                    </button>

                    <form action="{{ route('investimentos.destroy', $investimento->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button
                            class="bg-red-600 hover:bg-red-700 text-white font-bold px-4 py-2 rounded-lg shadow-lg transition">
                            Excluir
                        </button>
                    </form>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
