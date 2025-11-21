<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-400 leading-tight">
            {{ __('Dashboard de Investimentos') }}
        </h2>
    </x-slot>

    {{-- ESTILO CUSTOMIZADO --}}
    <style>
        body {
            background: #0a0a0f;
            color: #e0e0ff;
        }

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

        .title-neon {
            color: #c084fc;
            text-shadow: 0 0 8px rgba(192, 132, 252, 0.5);
        }
    </style>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- === CARDS === --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="card-neon">
                    <h3 class="text-lg font-semibold title-neon">Total Investido</h3>
                    <p class="text-3xl mt-2">R$ 12.450,00</p>
                </div>

                <div class="card-neon">
                    <h3 class="text-lg font-semibold title-neon">Lucro no Mês</h3>
                    <p class="text-3xl mt-2 text-green-400">+R$ 830,00</p>
                </div>

                <div class="card-neon">
                    <h3 class="text-lg font-semibold title-neon">Rendimento (%)</h3>
                    <p class="text-3xl mt-2 text-blue-400">+7,2%</p>
                </div>
            </div>

            {{-- === GRAFICO === --}}
            <div class="card-neon">
                <h3 class="text-xl font-semibold title-neon mb-4">Evolução dos Investimentos</h3>

                <canvas id="investChart" height="120"></canvas>
            </div>

        </div>
    </div>

    {{-- CHART JS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('investChart').getContext('2d');

        const investChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
                datasets: [{
                    label: 'Saldo (R$)',
                    data: [3000, 4200, 4500, 6000, 7500, 12450],
                    borderWidth: 3,
                    borderColor: '#a855f7',
                    backgroundColor: 'rgba(168, 85, 247, 0.2)',
                    tension: 0.35,
                    pointRadius: 4,
                    pointBackgroundColor: '#a855f7',
                    pointBorderColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: { color: '#ddd' }
                    }
                },
                scales: {
                    x: {
                        ticks: { color: '#aaa' },
                        grid: { color: 'rgba(255,255,255,0.05)' }
                    },
                    y: {
                        ticks: { color: '#aaa' },
                        grid: { color: 'rgba(255,255,255,0.05)' }
                    }
                }
            }
        });
    </script>

</x-app-layout>