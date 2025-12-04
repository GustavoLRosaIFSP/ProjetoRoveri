<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-purple-300">
            Usuários
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#0d0d16] shadow-md shadow-purple-900/40 rounded-xl p-6">
                
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-purple-300 text-lg font-bold">Lista de Usuários</h3>

                    <a href="{{ route('usuarios.create') }}" 
                        class="bg-purple-600 hover:bg-purple-500 transition text-white px-4 py-2 rounded-lg shadow-lg shadow-purple-900/40">
                        + Criar Usuário
                    </a>
                </div>

                <table class="w-full text-left text-purple-200">
                    <thead>
                        <tr class="border-b border-purple-800">
                            <th class="py-3">ID</th>
                            <th class="py-3">Nome</th>
                            <th class="py-3">Email</th>
                            <th class="py-3">Categoria</th>
                            <th class="py-3">Risco</th>
                            <th class="py-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="usuarios-tabela"></tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        async function carregarUsuarios() {
            let resposta = await fetch('/api/usuarios');
            let dados = await resposta.json();

            let tabela = document.getElementById("usuarios-tabela");
            tabela.innerHTML = "";

            dados.forEach(u => {
                tabela.innerHTML += `
                    <tr class="border-b border-purple-800/50">
                        <td class="py-2">${u.id}</td>
                        <td>${u.nome}</td>
                        <td>${u.email}</td>
                        <td>${u.categoria}</td>
                        <td>${u.risco}</td>
                        <td>
                            <button class="text-red-400 hover:text-red-300">Excluir</button>
                        </td>
                    </tr>
                `;
            });
        }

        carregarUsuarios();
    </script>

</x-app-layout>
