<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-purple-300">
            Editar Usuário
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#0d0d16] shadow-md shadow-purple-900/40 rounded-xl p-6">

                <h3 class="text-purple-300 text-lg font-bold mb-4">
                    Editando: {{ $usuario->nome }}
                </h3>

                <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    {{-- Nome --}}
                    <div>
                        <label class="text-purple-200">Nome</label>
                        <input type="text" name="nome"
                            value="{{ old('nome', $usuario->nome) }}"
                            class="w-full mt-1 bg-black border border-purple-700 text-purple-200 rounded-lg p-2">
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="text-purple-200">Email</label>
                        <input type="email" name="email"
                            value="{{ old('email', $usuario->email) }}"
                            class="w-full mt-1 bg-black border border-purple-700 text-purple-200 rounded-lg p-2">
                    </div>

                    {{-- Senha (opcional) --}}
                    <div>
                        <label class="text-purple-200">Senha (preencha apenas se quiser alterar)</label>
                        <input type="password" name="password"
                            class="w-full mt-1 bg-black border border-purple-700 text-purple-200 rounded-lg p-2">
                    </div>

                    {{-- Categoria --}}
                    <div>
                        <label class="text-purple-200">Categoria</label>
                        <select name="categoria"
                            class="w-full mt-1 bg-black border border-purple-700 text-purple-200 rounded-lg p-2">

                            @foreach(\App\Models\Enum\Categoria::cases() as $categoria)
                                <option value="{{ $categoria->value }}"
                                    @selected($usuario->categoria->value === $categoria->value)>
                                    {{ $categoria->label() }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    {{-- Risco --}}
                    <div>
                        <label class="text-purple-200">Risco</label>
                        <select name="risco"
                            class="w-full mt-1 bg-black border border-purple-700 text-purple-200 rounded-lg p-2">

                            @foreach(\App\Models\Enum\Risco::cases() as $risco)
                                <option value="{{ $risco->value }}"
                                    @selected($usuario->risco->value === $risco->value)>
                                    {{ $risco->label() }}
                                </option>
                            @endforeach

                        </select>
                    </div>


                    {{-- Botões --}}
                    <div class="flex justify-between mt-6">
                        <a href="{{ route('usuarios.index') }}"
                           class="px-4 py-2 rounded-lg bg-gray-700 text-purple-200 hover:bg-gray-600 transition">
                            Voltar
                        </a>

                        <button type="submit"
                            class="bg-purple-600 hover:bg-purple-500 transition text-white px-5 py-2 rounded-lg shadow-lg shadow-purple-900/40">
                            Salvar Alterações
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</x-app-layout>
