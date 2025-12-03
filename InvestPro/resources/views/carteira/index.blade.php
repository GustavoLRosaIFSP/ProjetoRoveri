<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-400 leading-tight">
            Minha Carteira
        </h2>
    </x-slot>

    <style>
        body { background: #0a0a0f; color: #e0e0ff; }
        .card-neon {
            background: #11111a;
            border: 1px solid #2a2a40;
            border-radius: 12px;
            padding: 20px;
            transition: 0.3s;
            box-shadow: 0 0 10px rgba(120, 60, 255, 0.2);
        }
        .card-neon:hover {
            border-color: #8f4cff;
            box-shadow: 0 0 15px rgba(120, 60, 255, 0.4);
        }
        .btn-neon {
            background: #7c3aed;
            border-radius: 10px;
            padding: 10px 18px;
            color: white;
            font-weight: bold;
            box-shadow: 0 0 10px rgba(140, 80, 255, 0.4);
            transition: 0.2s;
        }
        .btn-neon:hover {
            background: #9f6bff;
            box-shadow: 0 0 12px rgba(160, 120, 255, 0.7);
        }
    </style>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="card-neon mb-8">
                <h3 class="text-2xl font-semibold">{{ $carteira->nome }}</h3>

                <p class="text-gray-300 mt-2">
                    Sua carteira principal com resumo financeiro.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

                <div class="card-neon">
                    <h3 class="text-lg font-semibold">Valor Total</h3>
                    <p class="text-3xl mt-2">R$ {{ number_format($carteira->valor_total, 2, ',', '.') }}</p>
                </div>

                <div class="card-neon">
                    <h3 class="text-lg font-semibold">Investimentos</h3>
                    <p class="text-3xl mt-2 text-blue-400">{{ $carteira->investimentos_count }}</p>
                </div>

                <div class="card-neon">
                    <h3 class="text-lg font-semibold">Rentabilidade</h3>
                    <p class="text-3xl mt-2 text-green-400">{{ $carteira->rentabilidade }}%</p>
                </div>

            </div>

        </div>
    </div>

</x-app-layout>
