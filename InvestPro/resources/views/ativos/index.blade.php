<x-app-layout>

    <div class="max-w-4xl mx-auto mt-10 bg-gray-900 p-6 rounded-xl shadow-lg shadow-purple-900/40">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl text-purple-300 font-bold">
                Lista de Ativos
            </h2>

            @can('create', App\Models\Ativo::class)
                <a href="{{ route('ativos.create') }}"
                   class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-xl">
                    + Novo Ativo
                </a>
            @endcan
        </div>

        @if (session('success'))
            <div class="bg-green-600 text-white px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full text-purple-200">
            <thead>
                <tr class="border-b border-purple-700/30 text-left">
                    <th class="py-2">Nome</th>
                    <th>Ticker</th>
                    <th>Preço</th>
                    <th>Tipo</th>
                    <th>Risco</th>
                    <th class="text-right">Ações</th>
                </tr>
            </thead>

            <tbody>
            @foreach ($ativos as $a)
                <tr class="border-b border-purple-700/10">
                    <td class="py-2">{{ $a->nome }}</td>
                    <td>{{ $a->codigo_ticker }}</td>
                    <td>R$ {{ number_format($a->preco_atual, 2, ',', '.') }}</td>
                    <td>{{ $a->tipo }}</td>
                    <td>{{ $a->risco }}</td>

                    <td class="py-2 text-right flex justify-end gap-2">

                        {{-- BOTÃO EDITAR --}}
                        @can('update', $a)
                            <a href="{{ route('ativos.edit', $a->id) }}"
                               class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-lg">
                                Editar
                            </a>
                        @endcan

                        {{-- BOTÃO EXCLUIR --}}
                        @can('delete', $a)
                            <form action="{{ route('ativos.destroy', $a->id) }}" method="POST"
                                  onsubmit="return confirm('Tem certeza que deseja excluir este ativo?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg">
                                    Excluir
                                </button>
                            </form>
                        @endcan

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

</x-app-layout>
