<x-guest-layout>
    <div class="bg-[#0d0d16] text-purple-300 p-8 rounded-xl shadow-xl shadow-purple-900/40">

        <h2 class="text-2xl font-bold text-center mb-6">Criar Conta</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nome -->
            <div class="mb-4">
                <label class="text-purple-200">Nome</label>
                <input type="text" name="name"
                    class="w-full mt-1 bg-black border border-purple-700 text-purple-200 rounded-lg p-2"
                    required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400" />
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="text-purple-200">Email</label>
                <input type="email" name="email"
                    class="w-full mt-1 bg-black border border-purple-700 text-purple-200 rounded-lg p-2"
                    required />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
            </div>

            <!-- Senha -->
            <div class="mb-4">
                <label class="text-purple-200">Senha</label>
                <input type="password" name="password"
                    class="w-full mt-1 bg-black border border-purple-700 text-purple-200 rounded-lg p-2"
                    required />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
            </div>

            <!-- Confirmar Senha -->
            <div class="mb-4">
                <label class="text-purple-200">Confirmar Senha</label>
                <input type="password" name="password_confirmation"
                    class="w-full mt-1 bg-black border border-purple-700 text-purple-200 rounded-lg p-2"
                    required />
            </div>

            <!-- Botão -->
            <button class="w-full bg-purple-600 hover:bg-purple-500 transition text-white py-2 rounded-lg shadow-lg shadow-purple-900/40">
                Registrar
            </button>

            <p class="text-center text-purple-400 mt-4">
                Já possui conta?
                <a href="{{ route('login') }}" class="text-purple-300 hover:text-purple-400 underline">
                    Faça login
                </a>
            </p>

        </form>
    </div>
</x-guest-layout>
