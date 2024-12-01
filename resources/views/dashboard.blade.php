@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<script src="{{ asset('js/app.js') }}"></script>
<div class="bg-gradient-to-r from-[#2BC2FD] to-[#052183] flex flex-col justify-center items-center text-white p-6">
    <h2 class="text-sm font-medium">Selamat Datang</h2>
    <p class="text-2xl font-bold my-2">{{ strtoupper(auth()->user()->name) }}</p>
    <p class="text-sm">{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
</div>

<div class="p-4 bg-white">
    <!-- Menu Quick Links -->
    <div class="grid grid-cols-4 gap-4 text-center mb-6">
        <div>
            <div class="w-14 h-14 bg-gray-200 rounded-full mx-auto"></div>
            <p class="mt-2 text-sm font-semibold">Attendance</p>
        </div>
        <div>
            <div class="w-14 h-14 bg-gray-200 rounded-full mx-auto"></div>
            <p class="mt-2 text-sm font-semibold">Nilai</p>
        </div>
        <div>
            <div class="w-14 h-14 bg-gray-200 rounded-full mx-auto"></div>
            <p class="mt-2 text-sm font-semibold">Attendance</p>
        </div>
        <div>
            <div class="w-14 h-14 bg-gray-200 rounded-full mx-auto"></div>
            <p class="mt-2 text-sm font-semibold">Attendance</p>
        </div>
    </div>

    <!-- News & Announcement -->
    <h3 class="text-md font-bold mb-4">News & Announcement</h3>
    <div class="mb-4">
        <div class="relative overflow-hidden rounded-lg">
            <img src="{{ asset('images/news.png') }}" alt="Announcement" class="h-64 object-cover">
            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent text-white p-2">
                <h4 class="text-sm font-semibold">Global Multimedia Creative School</h4>
            </div>
        </div>
    </div>

<div id="news-container" class="space-y-4">
    @foreach ($announcements as $announcement)
    <div class="flex justify-between items-center bg-gray-100 p-3 rounded-lg">
        <div>
            <h4 class="text-sm font-bold text-gray-800">{{ $announcement->title }}</h4>
            <p class="text-xs text-gray-600">{{ $announcement->description }}</p>
        </div>
        <a href="#" class="text-blue-600 font-bold text-sm">></a>
    </div>
    @endforeach
</div>
<button id="load-more" class="mt-6 w-full bg-blue-500 text-white py-2 rounded-lg font-bold text-sm hover:bg-blue-600">
    Load More
</button>

@endsection