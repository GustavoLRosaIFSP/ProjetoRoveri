<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-purple-300">Criar Usuário</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#0d0d16] shadow-md shadow-purple-900/40 rounded-xl p-6">

                <h3 class="text-purple-300 text-lg font-bold mb-4">Novo Usuário</h3>

                <form id="formUsuario" class="space-y-4">

                    <div>
                        <label class="text-purple-200">Nome</label>
                        <input type="text" id="nome"
                            class="w-full mt-1 bg-black border border-purple-700 text-purple-200 rounded-lg p-2">
                    </div>

                    <div>
                        <label class="text-purple-200">Email</label>
                        <input type="email" id="email"
                            class="w-full mt-1 bg-black border border-purple-700 text-purple-200 rounded-lg p-2">
                    </div>

                    <div>
                        <label class="text-purple-200">Senha</label>
                        <input type="password" id="senha"
                            class="w-full mt-1 bg-black border border-purple-700 text-purple-200 rounded-lg p-2">
                    </div>

                    <div>
                        <label class="text-purple-200">Categoria</label>
                        <select id="categoria"
                            class="w-full mt-1 bg-black border border-purple-700 text-purple-200 rounded-lg p-2">
                            <option value="Agressivo">Agressivo</option>
                            <option value="Moderado">Moderado</option>
                            <option value="Conservador">Conservador</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-purple-200">Risco</label>
                        <select id="risco"
                            class="w-full mt-1 bg-black border border-purple-700 text-purple-200 rounded-lg p-2">
                            <option value="Alto">Alto</option>
                            <option value="Médio">Médio</option>
                            <option value="Baixo">Baixo</option>
                        </select>
                    </div>

                    <button type="button" onclick="salvarUsuario()"
                        class="bg-purple-600 hover:bg-purple-500 transition text-white px-5 py-2 rounded-lg shadow-lg shadow-purple-900/40">
                        Salvar
                    </button>
                </form>

            </div>
        </div>
    </div>

    <script>
        async function salvarUsuario() {
            let payload = {
                nome: document.getElementById("nome").value,
                email: document.getElementById("email").value,
                senha: document.getElementById("senha").value,
                categoria: document.getElementById("categoria").value,
                risco: document.getElementById("risco").value
            };

            let resposta = await fetch('/api/usuarios', {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(payload)
            });

            if (resposta.status === 201) {
                alert("Usuário cadastrado!");
                window.location.href = "/usuarios";
            } else {
                alert("Erro ao cadastrar usuário.");
            }
        }
    </script>

</x-app-layout>
