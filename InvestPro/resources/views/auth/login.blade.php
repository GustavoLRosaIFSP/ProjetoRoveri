<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#0d0d16]">
        <div class="w-full max-w-md bg-[#131323] border border-purple-700/40 shadow-xl shadow-purple-900/40 rounded-xl p-8">

            <!-- Título -->
            <h1 class="text-3xl text-purple-400 font-bold text-center drop-shadow mb-6">
                InvestPro — Login
            </h1>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-purple-300" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label class="text-purple-300" for="email" :value="__('Email')" />
                    <x-text-input id="email"
                                  class="block mt-1 w-full bg-[#1a1a2e] border-purple-700 text-purple-200 focus:border-purple-500 focus:ring-purple-500"
                                  type="email" name="email"
                                  :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                </div>

                <!-- Senha -->
                <div class="mt-4">
                    <x-input-label class="text-purple-300" for="password" :value="__('Senha')" />
                    <x-text-input id="password"
                                  class="block mt-1 w-full bg-[#1a1a2e] border-purple-700 text-purple-200 focus:border-purple-500 focus:ring-purple-500"
                                  type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                </div>

                <!-- Lembrar -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                               class="rounded bg-[#1a1a2e] border-purple-700 text-purple-500 focus:ring-purple-600"
                               name="remember">

                        <span class="ms-2 text-sm text-purple-300">{{ __('Lembrar de mim') }}</span>
                    </label>
                </div>

                <!-- Links + Botão -->
                <div class="flex items-center justify-between mt-6">

                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-purple-400 hover:text-purple-300 transition"
                           href="{{ route('password.request') }}">
                            {{ __('Esqueceu a senha?') }}
                        </a>
                    @endif
                       <a class="underline text-sm text-purple-400 hover:text-purple-300 ml-3"
   href="{{ route('register') }}">
    Criar nova conta
</a>     
                    <button
                        class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white font-bold rounded-lg shadow-lg shadow-purple-900/40 transition">
                        Entrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
