<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                Dashboard InvestPro
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- MÉTRICAS PRINCIPAIS --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                {{-- Patrimônio Total --}}
                <div class="bg-gradient-to-br from-gray-900 to-gray-800 p-6 rounded-2xl shadow-lg border border-gray-700 hover:border-purple-500 transition duration-300">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-400 text-sm font-medium">Saldo na conta</p>
                            <p class="text-2xl font-bold text-white mt-2">R$ {{ number_format($saldoDisponivel, 2, ',', '.') }}</p>
                        </div>
                        <div class="p-3 bg-purple-900/30 rounded-xl">
                            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-gray-900 to-gray-800 p-6 rounded-2xl shadow-lg border border-gray-700 hover:border-purple-500 transition duration-300">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-400 text-sm font-medium">Patrimônio Total</p>
                            <p class="text-2xl font-bold text-white mt-2">R$ {{ number_format($patrimonioTotal, 2, ',', '.') }}</p>
                        </div>
                        <div class="p-3 bg-purple-900/30 rounded-xl">
                            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Investimento Hoje --}}
                <div class="bg-gradient-to-br from-gray-900 to-gray-800 p-6 rounded-2xl shadow-lg border border-gray-700 hover:border-blue-500 transition duration-300">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-400 text-sm font-medium">Investimento Este Mês</p>
                            <p class="text-2xl font-bold text-white mt-2">R$ {{ number_format($investimentoMes, 2, ',', '.') }}</p>
                            <p class="text-gray-500 text-sm mt-3">{{ $operacoesMes }} operações</p>
                        </div>
                        <div class="p-3 bg-blue-900/30 rounded-xl">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Diversificação --}}
                <div class="bg-gradient-to-br from-gray-900 to-gray-800 p-6 rounded-2xl shadow-lg border border-gray-700 hover:border-pink-500 transition duration-300">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-400 text-sm font-medium">Diversificação</p>
                            <p class="text-2xl font-bold text-white mt-2">{{ $ativosDistintos }} ativos</p>
                            <p class="text-gray-500 text-sm mt-3">em {{ $categoriasUnicas }} categorias</p>
                        </div>
                        <div class="p-3 bg-pink-900/30 rounded-xl">
                            <svg class="w-6 h-6 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- PERFORMANCE E ALOÇÃO --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                {{-- Performance --}}
                <div class="lg:col-span-2 bg-gradient-to-br from-gray-900 to-gray-800 p-6 rounded-2xl shadow-lg border border-gray-700">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-white">Performance da Carteira</h3>
                        <div class="flex space-x-2">
                            <button class="px-3 py-1 text-xs font-medium bg-purple-600 text-white rounded-lg">1M</button>
                            <button class="px-3 py-1 text-xs font-medium text-gray-400 hover:text-white hover:bg-gray-700 rounded-lg">3M</button>
                            <button class="px-3 py-1 text-xs font-medium text-gray-400 hover:text-white hover:bg-gray-700 rounded-lg">6M</button>
                            <button class="px-3 py-1 text-xs font-medium text-gray-400 hover:text-white hover:bg-gray-700 rounded-lg">12M</button>
                            <button class="px-3 py-1 text-xs font-medium text-gray-400 hover:text-white hover:bg-gray-700 rounded-lg">Tudo</button>
                        </div>
                    </div>
                    <div class="h-64">
                        <canvas id="graficoPerformance"></canvas>
                    </div>
                </div>

                {{-- Alocação --}}
                <div class="bg-gradient-to-br from-gray-900 to-gray-800 p-6 rounded-2xl shadow-lg border border-gray-700">
                    <h3 class="text-lg font-semibold text-white mb-6">Alocação de Ativos</h3>
                    <div class="flex flex-col items-center justify-center h-64">
                        <canvas id="graficoAlocacao"></canvas>
                    </div>
                    <div class="mt-6 space-y-3">
                        @foreach($alocacaoLabels as $index => $label)
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded-full mr-3" style="background-color: {{ $alocacaoCores[$index] ?? '#4F46E5' }}"></div>
                                <span class="text-gray-300 text-sm">{{ $label }}</span>
                            </div>
                            <span class="text-white font-semibold">
                                {{ $patrimonioTotal > 0 ? number_format(($alocacaoValores[$index] / $patrimonioTotal) * 100, 1) : 0 }}%
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- ÚLTIMOS INVESTIMENTOS --}}
            <div class="bg-gradient-to-br from-gray-900 to-gray-800 p-6 rounded-2xl shadow-lg border border-gray-700">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold text-white">Últimos Investimentos</h3>
                    <a href="{{ route('investimentos.index') }}" class="text-purple-400 hover:text-purple-300 text-sm font-medium flex items-center">
                        Ver todos
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-gray-400 text-sm border-b border-gray-700">
                                <th class="pb-3 font-medium">Ativo</th>
                                <th class="pb-3 font-medium">Tipo</th>
                                <th class="pb-3 font-medium">Valor</th>
                                <th class="pb-3 font-medium">Quantidade</th>
                                <th class="pb-3 font-medium">Data</th>
                                <th class="pb-3 font-medium">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ultimosInvestimentos as $inv)
                            <tr class="border-b border-gray-800 hover:bg-gray-800/50">
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-gray-700 rounded-lg flex items-center justify-center mr-3">
                                            <span class="text-xs font-bold">{{ substr($inv->ativo->nome ?? 'N/A', 0, 1) }}</span>
                                        </div>
                                        <div>
                                            <p class="text-white font-medium">{{ $inv->snapshot_nome ?? $inv->ativo->nome ?? 'N/A' }}</p>
                                            <p class="text-gray-500 text-xs">{{ $inv->snapshot_ticker ?? $inv->ativo->codigo_ticker ?? '' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full 
                                        {{ $inv->ativo->tipo == 'ACAO' ? 'bg-blue-900/30 text-blue-400' : 
                                        ($inv->ativo->tipo == 'FII' ? 'bg-green-900/30 text-green-400' : 
                                        ($inv->ativo->tipo == 'RENDA_FIXA' ? 'bg-yellow-900/30 text-yellow-400' : 
                                        'bg-red-900/30 text-red-400')) }}">
                                        {{ $inv->ativo->tipo }}
                                    </span>
                                </td>
                                <td class="py-4 text-white font-medium">R$ {{ number_format($inv->valor_aplicado, 2, ',', '.') }}</td>
                                <td class="py-4 text-gray-300">{{ $inv->quantidade }}</td>
                                <td class="py-4 text-gray-400">{{ $inv->created_at->format('d/m/Y') }}</td>
                                <td class="py-4">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-900/30 text-green-400">
                                        Ativo
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="py-8 text-center text-gray-500">
                                    Nenhum investimento encontrado
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctxPerformance = document.getElementById('graficoPerformance');
        new Chart(ctxPerformance, {
            type: 'line',
            data: {
                labels: @json($performanceLabels),
                datasets: [{
                    label: 'Valor da Carteira',
                    data: @json($performanceValores),
                    borderColor: '#8B5CF6',
                    backgroundColor: 'rgba(139, 92, 246, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#8B5CF6',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(17, 24, 39, 0.9)',
                        titleColor: '#9CA3AF',
                        bodyColor: '#F3F4F6',
                        borderColor: '#4B5563',
                        borderWidth: 1
                    }
                },
                scales: {
                    y: {
                        grid: {
                            color: 'rgba(55, 65, 81, 0.5)'
                        },
                        ticks: {
                            color: '#9CA3AF'
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(55, 65, 81, 0.5)'
                        },
                        ticks: {
                            color: '#9CA3AF'
                        }
                    }
                }
            }
        });

        const ctxAlocacao = document.getElementById('graficoAlocacao');
        new Chart(ctxAlocacao, {
            type: 'doughnut',
            data: {
                labels: @json($alocacaoLabels),
                datasets: [{
                    data: @json($alocacaoValores),
                    backgroundColor: @json($alocacaoCores),
                    borderWidth: 0,
                    borderRadius: 4,
                    spacing: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const value = context.raw;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = Math.round((value / total) * 100);
                                return `${context.label}: ${percentage}% (R$ ${value.toFixed(2).replace('.', ',')})`;
                            }
                        }
                    }
                }
            }
        });
    </script>
</x-app-layout>