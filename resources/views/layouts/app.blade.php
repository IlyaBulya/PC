<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Tailwind CSS & Alpine.js via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.15.1/dist/cdn.min.js"></script>
</head>
<body class="font-sans antialiased bg-zinc-950 text-zinc-100">
<div class="min-h-screen bg-gradient-to-b from-zinc-950 via-zinc-950 to-black">
	@include('layouts.app_navigation')

	<!-- Page Content -->
	<main class="py-8">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			{{ $slot }}
		</div>
	</main>
</div>
</body>
</html>
