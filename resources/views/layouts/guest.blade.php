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
    {{-- UBAH BACKGROUND JADI HITAM (#0B0F19) --}}
    <body class="font-sans text-gray-100 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#0B0F19]">
            <div>
                <a href="/">
                    {{-- Ganti Logo jadi Teks Raafi.dev --}}
                    <h1 class="text-3xl font-bold text-cyan-400">Raafi.dev</h1>
                </a>
            </div>

            {{-- UBAH KOTAK LOGIN JADI DARK GRAY --}}
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-800 shadow-md overflow-hidden sm:rounded-lg border border-gray-700">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>