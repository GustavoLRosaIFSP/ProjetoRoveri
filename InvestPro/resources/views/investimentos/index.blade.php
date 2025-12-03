<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-purple-300">
            Investimentos
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#0d0d16] shadow-md shadow-purple-900/40 rounded-xl p-6">
                
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-purple-300 text-lg font-bold">Lista de Investimentos</h3>

                    <a href="{{ route('investimentos.create') }}" 
                        class="bg-purple-600 hover:bg-purple-500 transition text-white px-4 py-2 rounded-lg shadow-lg shadow-purple-900/40">
                        + Criar Investimento
                    </a>
                </div>

                @if(session('success'))
                    <div class="bg-green-900/50 border border-green-700 text-green-300 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-purple-200">
                        <thead>
                            <tr class="border-b border-purple-800">
                                <th class="py-3 px-4">ID</th>
                                <th class="py-3 px-4">Valor Aplicado</th>
                                <th class="py-3 px-4">Data Início</th>
                                <th class="py-3 px-4">Data Fim</th>
                                <th class="py-3 px-4">Retorno (%)</th>
                                <th class="py-3 px-4">Ações</th>
                            </tr>
                        </thead>

                        <tbody id="investimentos-tabela">
                            <!-- Os dados serão carregados via JavaScript -->
                        </tbody>
                    </table>
                </div>

                <div id="loading" class="text-center py-4 text-purple-400">
                    Carregando investimentos...
                </div>

            </div>
        </div>
    </div>

    <script>
        async function carregarInvestimentos() {
            try {
                let resposta = await fetch('{{ route("investimentos.index") }}', {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                
                if (!resposta.ok) {
                    throw new Error('Erro ao carregar investimentos');
                }
                
                let investimentos = await resposta.json();
                let tabela = document.getElementById("investimentos-tabela");
                let loading = document.getElementById("loading");
                
                loading.style.display = 'none';
                tabela.innerHTML = "";

                investimentos.forEach(i => {
                    let dataFim = i.data_fim ? new Date(i.data_fim).toLocaleDateString('pt-BR') : '-';
                    let dataInicio = i.data_inicio ? new Date(i.data_inicio).toLocaleDateString('pt-BR') : '-';
                    
                    tabela.innerHTML += `
                        <tr class="border-b border-purple-800/50 hover:bg-purple-900/20 transition">
                            <td class="py-3 px-4">${i.id}</td>
                            <td class="py-3 px-4">R$ ${parseFloat(i.valor_aplicado || 0).toLocaleString('pt-BR', {minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                            <td class="py-3 px-4">${dataInicio}</td>
                            <td class="py-3 px-4">${dataFim}</td>
                            <td class="py-3 px-4">${i.retorno_percentual ? parseFloat(i.retorno_percentual).toFixed(2) + '%' : '0.00%'}</td>
                            <td class="py-3 px-4">
                                <div class="flex gap-3">
                                    <a href="/investimentos/${i.id}/edit" 
                                       class="text-blue-400 hover:text-blue-300 transition text-sm">
                                       Editar
                                    </a>
                                    <form action="/investimentos/${i.id}" method="POST" class="inline">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" 
                                                class="text-red-400 hover:text-red-300 transition text-sm"
                                                onclick="return confirm('Tem certeza que deseja excluir este investimento?')">
                                            Excluir
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    `;
                });

                if (investimentos.length === 0) {
                    tabela.innerHTML = `
                        <tr>
                            <td colspan="6" class="py-4 text-center text-purple-400">
                                Nenhum investimento encontrado.
                            </td>
                        </tr>
                    `;
                }
                
            } catch (error) {
                console.error('Erro:', error);
                document.getElementById("loading").innerHTML = `
                    <div class="text-red-400">
                        Erro ao carregar investimentos: ${error.message}
                    </div>
                `;
            }
        }

        // Carregar investimentos quando a página carregar
        document.addEventListener('DOMContentLoaded', carregarInvestimentos);
    </script>

</x-app-layout>