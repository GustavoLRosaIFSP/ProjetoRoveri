<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-purple-300">
            Investimentos
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#0d0d16] shadow-md shadow-purple-900/40 rounded-xl p-6">
                
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-purple-300 text-lg font-bold">Lista de Investimentos</h3>

                    <a href="{{ route('investimentos.create') }}" 
                        class="bg-purple-600 hover:bg-purple-500 transition text-white px-4 py-2 rounded-lg shadow-lg shadow-purple-900/40">
                        + Criar Investimento
                    </a>
                </div>

                <table class="w-full text-left text-purple-200">
                    <thead>
                        <tr class="border-b border-purple-800">
                            <th class="py-3">ID</th>
                            <th class="py-3">Valor Aplicado</th>
                            <th class="py-3">Data Início</th>
                            <th class="py-3">Data Fim</th>
                            <th class="py-3">Retorno (%)</th>
                            <th class="py-3">Ações</th>
                        </tr>
                    </thead>

                    <tbody id="investimentos-tabela"></tbody>
                </table>

            </div>
        </div>
    </div>

    <script>
        async function carregarInvestimentos() {
            let resposta = await fetch('investimentos');
            let investimentos = await resposta.json();

            let tabela = document.getElementById("investimentos-tabela");
            tabela.innerHTML = "";

            investimentos.forEach(i => {
                tabela.innerHTML += `
                    <tr class="border-b border-purple-800/50">
                        <td class="py-2">${i.id}</td>
                        <td>R$ ${parseFloat(i.valorAplicado).toFixed(2).replace('.', ',')}</td>
                        <td>${i.dataInicio}</td>
                        <td>${i.dataFim ?? '-'}</td>
                        <td>${i.retornoPercentual}%</td>

                        <td class="flex gap-3 py-2">
                            <a href="investimentos/${i.id}/edit" 
                               class="text-blue-400 hover:text-blue-300">Editar</a>

                            <form action="investimentos/${i.id}" method="POST"
                                onsubmit="return confirm('Excluir investimento?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-400 hover:text-red-300">Excluir</button>
                            </form>
                        </td>
                    </tr>
                `;
            });
        }

        carregarInvestimentos();
    </script>

</x-app-layout>
