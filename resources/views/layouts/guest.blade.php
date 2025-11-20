<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Tailwind CSS & Alpine.js via CDN -->
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.15.1/dist/cdn.min.js"></script>
    </head>
    <body class="font-sans antialiased bg-zinc-950 text-zinc-100">
        <div class="min-h-screen flex flex-col sm:justify-center items-center py-10 bg-gradient-to-b from-zinc-950 via-zinc-950 to-black">
            <a href="{{ route('home') }}" class="mb-6">
                <x-breeze.application-logo class="w-16 h-16 fill-current text-emerald-400" />
            </a>

            <div class="w-full sm:max-w-md mt-2 px-6 py-6 bg-zinc-900/80 border border-zinc-800 rounded-2xl shadow-[0_0_25px_rgba(15,23,42,0.6)]">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
