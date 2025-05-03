<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Room Booking - UNTIRTA</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gray-100">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="w-full sm:max-w-md px-6 py-8 bg-white shadow-lg rounded-lg">
                <div class="text-center mb-8">
                    <a href="/" class="block mb-4">
                        <img src="{{ asset('images/logo-untirta.png') }}" alt="Logo UNTIRTA" class="h-24 mx-auto">
                    </a>
                </div>
                {{ $slot }}
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-8 mt-8">
            <div class="container mx-auto px-6 text-center">
                <p>&copy; 2025 Universitas Sultan Ageng Tirtayasa. All rights reserved.</p>
            </div>
        </footer>
    </body>
</html>