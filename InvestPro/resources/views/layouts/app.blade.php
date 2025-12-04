<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <!-- ALTERADO AQUI -->
    <div class="min-h-screen bg-[#0d0d16]">
        
        @include('layouts.navigation')

        @isset($header)
            <header class="bg-[#161622] border-b border-purple-800 shadow-lg shadow-purple-900/40">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-purple-300 font-semibold">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main class="text-purple-200 px-4 sm:px-6 lg:px-8 py-8">
            {{ $slot }}
        </main>

    </div>
</body>
</html>
