<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo</title>

    <!-- Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex items-center justify-center bg-[#0d0d16]">

    <div class="text-center p-10 rounded-2xl bg-[#1a1a2e] shadow-xl shadow-purple-900/40 border border-purple-700">

        <h1 class="text-4xl font-bold text-purple-400 drop-shadow-lg">
            Bem-vindo ao InvestPro
        </h1>

        <p class="text-gray-300 mt-4">
            Gerencie seus investimentos com estilo.
        </p>

        <a href="{{ route('login') }}"
           class="mt-6 inline-block px-6 py-3 bg-purple-600 text-white font-semibold rounded-xl 
                  hover:bg-purple-500 transition shadow-lg shadow-purple-900/40">
            Fazer Login
        </a>
        <a href="{{ route('register') }}"
           class="mt-6 inline-block px-6 py-3 bg-purple-600 text-white font-semibold rounded-xl 
                  hover:bg-purple-500 transition shadow-lg shadow-purple-900/40">
            Fazer Cadastro
        </a>
        
    </div>

</body>
</html>
