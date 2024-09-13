<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body class="bg-gray-100 text-gray-800">
    @include('layouts.navigation')

    <main class="container mx-auto mt-8 p-4">
        <div class="text-center">
            <h1 class="text-5xl font-bold text-gray-900 mb-4">Welcome to the Notice Board</h1>
            <p class="text-lg text-gray-600 mb-6">Stay updated with the latest news and notices here.</p>

            @auth
            <a href="{{ url('/dashboard') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white py-3 px-6 rounded-md shadow-md transition duration-300">
                Go to Dashboard
            </a>
            @endauth
        </div>
    </main>
</body>
</html>
