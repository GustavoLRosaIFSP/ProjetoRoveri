<x-app-layout>

    <div class="max-w-xl mx-auto mt-10 bg-gray-900 p-6 rounded-xl shadow-lg shadow-purple-900/40">

        <h2 class="text-2xl text-purple-300 font-bold mb-6 text-center">
            Cadastro de Novo Ativo
        </h2>

        @if (session('success'))
            <div class="bg-green-600 text-white px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('ativos.store') }}" method="POST" class="flex flex-col gap-4">
            @csrf

            <div>
                <label class="text-purple-200 font-semibold">Nome do Ativo</label>
                <input type="text" name="nome"
                       class="w-full p-2 mt-1 bg-gray-800 border border-purple-700/40 text-white rounded-lg"
                       required>
            </div>

            <div>
                <label class="text-purple-200 font-semibold">Código (Ticker)</label>
                <input type="text" name="codigo_ticker"
                       class="w-full p-2 mt-1 bg-gray-800 border border-purple-700/40 text-white rounded-lg"
                       required>
            </div>

            <div>
                <label class="text-purple-200 font-semibold">Preço Atual</label>
                <input type="number" step="0.01" name="preco_atual"
                       class="w-full p-2 mt-1 bg-gray-800 border border-purple-700/40 text-white rounded-lg"
                       required>
            </div>

            <div>
                <label class="text-purple-200 font-semibold">Tipo do Ativo</label>
                <select name="tipo" class="w-full p-2 mt-1 bg-gray-800 border border-purple-700/40 text-white rounded-lg" required>
                    <option value="">Selecione...</option>

                    @foreach ($tipos as $t)
                        <option value="{{ $t->value }}">{{ $t->label() }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="text-purple-200 font-semibold">Risco</label>
                <select name="risco" class="w-full p-2 mt-1 bg-gray-800 border border-purple-700/40 text-white rounded-lg" required>
                    <option value="">Selecione...</option>

                    @foreach ($riscos as $r)
                        <option value="{{ $r->value }}">{{ $r->label() }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit"
                    class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-xl transition-all">
                Cadastrar Ativo
            </button>

        </form>

    </div>

</x-app-layout>
