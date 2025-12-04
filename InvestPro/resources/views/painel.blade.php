<!DOCTYPE html>
<html lang="pt-BR" class="dark">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Dark Mode</title>

    <!-- Tailwind via CDN (não precisa npm) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background-color: #0f0f10;
        }
    </style>
</head>
<body class="text-gray-100">

    <!-- LAYOUT -->
    <div class="flex h-screen">

        <!-- SIDEBAR -->
        <aside class="w-64 bg-[#16161a] border-r border-gray-800 flex flex-col">
            
            <div class="p-6 text-xl font-bold tracking-wide text-purple-400">
                INVESTPRO
            </div>

            <nav class="flex-1 px-4 space-y-2">
                <a href="#" class="block px-3 py-2 rounded-lg hover:bg-purple-600/20">
                    📊 Dashboard
                </a>
                <a href="#" class="block px-3 py-2 rounded-lg hover:bg-purple-600/20">
                    👤 Usuários
                </a>
                <a href="#" class="block px-3 py-2 rounded-lg hover:bg-purple-600/20">
                    📁 Categorias
                </a>
                <a href="#" class="block px-3 py-2 rounded-lg hover:bg-purple-600/20">
                    ⚙ Configurações
                </a>
            </nav>

            <div class="p-4 text-gray-400 text-sm">
                © 2025 — InvestPro
            </div>
        </aside>

        <!-- CONTEÚDO PRINCIPAL -->
        <main class="flex-1 p-10 overflow-y-auto">

            <h1 class="text-3xl font-bold mb-6 text-purple-400">
                Bem-vindo ao Painel
            </h1>

            <!-- CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <div class="bg-[#1c1c20] p-6 rounded-x
