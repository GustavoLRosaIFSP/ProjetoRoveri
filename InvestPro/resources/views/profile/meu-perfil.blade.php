<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-purple-400 drop-shadow-lg">
            Meu Perfil
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#0d0d16] p-8 rounded-2xl shadow-xl shadow-purple-900/40 border border-purple-700">

                <h3 class="text-xl font-semibold text-purple-300 mb-6">Informações do Usuário</h3>

                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PATCH')

                    {{-- Nome --}}
                    <div class="mb-4">
                        <label class="text-purple-300 font-medium">Nome</label>
                        <input
                            type="text"
                            name="nome"
                            value="{{ old('nome', auth()->user()->nome) }}"
                            class="mt-1 w-full rounded-lg bg-[#1a1a27] border border-purple-700 text-purple-200 p-2"
                            required
                        >
                    </div>

                    {{-- Email --}}
                    <div class="mb-4">
                        <label class="text-purple-300 font-medium">Email</label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', auth()->user()->email) }}"
                            class="mt-1 w-full rounded-lg bg-[#1a1a27] border border-purple-700 text-purple-200 p-2"
                            required
                        >
                    </div>

                    <div class="mb-4">
                        <label class="text-purple-300 font-medium">Perfil de Risco</label>

                        <select 
                            name="risco"
                            class="mt-1 w-full rounded-lg bg-[#1a1a27] border border-purple-700 text-purple-200 p-2"
                            required
                        >
                            @foreach (\App\Models\Enum\Risco::cases() as $risco)
                                <option 
                                    value="{{ $risco->value }}"
                                    {{ $risco->value === auth()->user()->risco ? 'selected' : '' }}
                                >
                                    {{ $risco->label() }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mt-6">
                        <button class="px-6 py-2 bg-purple-600 hover:bg-purple-500 text-white font-semibold rounded-xl shadow-lg shadow-purple-900/40 transition">
                            Salvar Alterações
                        </button>
                    </div>

                </form>


                <hr class="my-8 border-purple-700">

                {{-- Atualizar Senha --}}
                <h3 class="text-xl font-semibold text-purple-300 mb-6">Alterar Senha</h3>

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    @method('PUT')

                    {{-- Senha atual --}}
                    <div class="mb-4">
                        <label class="text-purple-300 font-medium">Senha Atual</label>
                        <input 
                            type="password" 
                            name="current_password"
                            class="mt-1 w-full rounded-lg bg-[#1a1a27] border border-purple-700 text-purple-200 p-2 focus:ring-purple-400 focus:border-purple-500"
                            required
                        >
                    </div>

                    {{-- Nova senha --}}
                    <div class="mb-4">
                        <label class="text-purple-300 font-medium">Nova Senha</label>
                        <input 
                            type="password" 
                            name="password"
                            class="mt-1 w-full rounded-lg bg-[#1a1a27] border border-purple-700 text-purple-200 p-2 focus:ring-purple-400 focus:border-purple-500"
                            required
                        >
                    </div>

                    {{-- Confirmar senha --}}
                    <div class="mb-4">
                        <label class="text-purple-300 font-medium">Confirmar Nova Senha</label>
                        <input 
                            type="password" 
                            name="password_confirmation"
                            class="mt-1 w-full rounded-lg bg-[#1a1a27] border border-purple-700 text-purple-200 p-2 focus:ring-purple-400 focus:border-purple-500"
                            required
                        >
                    </div>

                    <button 
                        class="px-6 py-2 bg-purple-600 hover:bg-purple-500 text-white font-semibold rounded-xl shadow-lg shadow-purple-900/40 transition">
                        Atualizar Senha
                    </button>
                </form>

            </div>
        </div>
    </div>

</x-app-layout>
