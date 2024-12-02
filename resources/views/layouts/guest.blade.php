<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'My Application') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-gray-900 font-inter antialiased">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-lg w-full bg-white rounded-lg shadow-xl p-8 space-y-6">
            <div class="text-center">
                <a>
                    <img src="{{ asset('images/logo.png') }}" class="mx-auto w-60 h-30">
                </a>
            </div>

            <div class="space-y-4">
                {{ $slot }}
            </div>

            <div class="border-t border-gray-200 pt-4 text-center">
                <p class="text-sm text-gray-600">
                    Don't have an account?
                    <a href="/register" class="text-purple-600 hover:underline">Sign up</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>