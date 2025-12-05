<x-app-layout>

    <h2 class="text-2xl font-bold text-purple-300 mb-6">Editar Ativo</h2>

    <div class="max-w-3xl mx-auto bg-gray-900 p-6 rounded-xl shadow-lg shadow-purple-900/40">

        <form action="{{ route('ativos.update', $ativo->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-purple-300 mb-1">Nome</label>
                <input type="text" name="nome"
                    value="{{ old('nome', $ativo->nome) }}"
                    class="w-full bg-gray-800 text-white p-2 rounded-xl">
            </div>

            <div class="mb-4">
                <label class="block text-purple-300 mb-1">Ticker</label>
                <input type="text" name="codigo_ticker"
                    value="{{ old('codigo_ticker', $ativo->codigo_ticker) }}"
                    class="w-full bg-gray-800 text-white p-2 rounded-xl">
            </div>

            <div class="mb-4">
                <label class="block text-purple-300 mb-1">Preço Atual</label>
                <input type="number" step="0.01" name="preco_atual"
                    value="{{ old('preco_atual', $ativo->preco_atual) }}"
                    class="w-full bg-gray-800 text-white p-2 rounded-xl">
            </div>

            <div class="mb-4">
                <label class="block text-purple-300 mb-1">Tipo</label>
                <select name="tipo" class="w-full bg-gray-800 text-white p-2 rounded-xl">
                    @foreach ($tipos as $t)
                        <option value="{{ $t->value }}" 
                            {{ $ativo->tipo->value === $t->value ? 'selected' : '' }}>
                            {{ $t->label() }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                 <label class="block text-purple-300 mb-1">Risco</label>
                <select name="risco" class="w-full bg-gray-800 text-white p-2 rounded-xl">
                    @foreach ($riscos as $r)
                        <option value="{{ $r->value }}" 
                            {{ $ativo->risco->value === $r->value ? 'selected' : '' }}>
                            {{ $r->label() }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-xl">
                Salvar Alterações
            </button>
        </form>

    </div>

</x-app-layout>
