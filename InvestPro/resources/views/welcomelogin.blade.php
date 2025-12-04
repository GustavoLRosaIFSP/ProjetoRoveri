<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bem-vindo</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#0d0d16] text-purple-300 min-h-screen flex items-center justify-center">

    <div class="text-center space-y-6">

        <h1 class="text-5xl font-extrabold drop-shadow-lg text-purple-400">
            InvestPro
        </h1>

        <p class="text-lg text-purple-300/80">
            Sua plataforma de controle de investimentos.
        </p>

        <a href="{{ route('login') }}"
           class="px-6 py-3 bg-purple-600 hover:bg-purple-700 transition rounded-xl text-white font-bold shadow-lg shadow-purple-900/40">
            🚀 Entrar
        </a>

    </div>
</body>
</html>
