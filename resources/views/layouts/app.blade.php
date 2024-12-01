<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800 font-sans">

    <!-- Main Content -->
    <main class="pb-20"> <!-- Tambahkan padding bawah agar tidak bertumpuk dengan bottom nav -->
        @yield('content')
    </main>

    <!-- Bottom Navigation -->
    <nav class="fixed bottom-0 left-0 right-0 bg-white shadow-lg border-t">
        <div class="flex justify-around items-center text-center py-2">
            <!-- Home -->
            <a href="{{ route('dashboard') }}" class="flex flex-col items-center {{ request()->routeIs('dashboard') ? 'text-blue-600' : 'text-gray-400' }}">
                <img src="{{ asset('images/home.png') }}" alt="Home" class="h-6 w-6">
                <span class="text-xs font-medium">Home</span>
            </a>
            <!-- Calendar -->
            <a href="{{ route('calendar') }}" class="flex flex-col items-center {{ request()->routeIs('calendar') ? 'text-blue-600' : 'text-gray-400' }}">
                <img src="{{ asset('images/calendar.png') }}" alt="Calendar" class="h-6 w-6">
                <span class="text-xs font-medium">Calendar</span>
            </a>
            <!-- Profile -->
            <a href="{{ route('profile') }}" class="flex flex-col items-center {{ request()->routeIs('profile') ? 'text-blue-600' : 'text-gray-400' }}">
                <img src="{{ asset('images/profile.png') }}" alt="Profile" class="h-6 w-6">
                <span class="text-xs font-medium">Profile</span>
            </a>
        </div>
    </nav>

</body>

</html>