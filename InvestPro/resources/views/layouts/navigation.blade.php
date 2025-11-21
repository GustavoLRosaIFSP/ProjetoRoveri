<nav class="bg-[#0d0d16] border-b border-purple-700 shadow-lg shadow-purple-900/40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="text-purple-400 font-bold text-xl hover:text-purple-300 transition">
                    InvestPro
                </a>

                <div class="hidden sm:flex space-x-8 ml-10">
                    <a href="{{ route('dashboard') }}"
                       class="text-purple-300 hover:text-purple-400 text-sm font-semibold transition">
                        Dashboard
                    </a>

                    <a href="/investimentos"
                       class="text-purple-300 hover:text-purple-400 text-sm font-semibold transition">
                        Investimentos
                    </a>
                    <a href="{{ route('meu-perfil') }}"
   class="text-purple-300 hover:text-purple-400 transition text-sm font-semibold">
   Meu Perfil
                    </a>

                </div>
            </div>

            <div class="hidden sm:flex items-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-red-400 hover:text-red-300 font-semibold transition">
                        Sair
                    </button>
                </form>
            </div>
            
            <div class="sm:hidden">
                <button class="text-purple-300 hover:text-purple-400 text-xl">
                    ☰
                </button>
            </div>
        </div>
    </div>
</nav>
