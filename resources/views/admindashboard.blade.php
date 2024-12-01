@extends('layouts.app')

@section('title', 'AdminDashboard')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<div class="bg-gradient-to-r from-[#2BC2FD] to-[#052183] flex flex-col justify-center items-center text-white p-6">
    <h2 class="text-sm font-medium">Selamat Datang</h2>
    <p class="text-2xl font-bold my-2">{{ strtoupper(auth()->user()->name) }}</p>
    <p class="text-sm">{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-6">
    <!-- Data Siswa -->
    <a href="{{ route('students.index') }}" class="bg-white shadow-md rounded-lg flex justify-between items-center p-4 hover:shadow-lg transition">
        <div class="flex items-center">
            <div class="text-[#052183]">
                <img src="{{ asset('images/student.png') }}" alt="Student" class="h-12 w-12">
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-800">Data Siswa</h3>
            </div>
        </div>
        <div>
            <img src="{{ asset('images/right.png') }}" alt="Right Arrow" class="h-4 w-4">
        </div>
    </a>

    <!-- Data Kelas & Pelajaran -->
    <a href="{{ route('classes.index') }}" class="bg-white shadow-md rounded-lg flex justify-between items-center p-4 hover:shadow-lg transition">
        <div class="flex items-center">
            <div class="text-[#052183]">
                <img src="{{ asset('images/class.png') }}" alt="Class" class="h-12 w-12">
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-800">Data Kelas & Pelajaran</h3>
            </div>
        </div>
        <div>
            <img src="{{ asset('images/right.png') }}" alt="Right Arrow" class="h-4 w-4">
        </div>
    </a>

    <!-- Announcement -->
    <a href="{{ route('announcements.index') }}" class="bg-white shadow-md rounded-lg flex justify-between items-center p-4 hover:shadow-lg transition">
        <div class="flex items-center">
            <div class="text-[#052183]">
                <img src="{{ asset('images/announcement.png') }}" alt="Announcement" class="h-12 w-12">
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-800">Announcement</h3>
            </div>
        </div>
        <div>
            <img src="{{ asset('images/right.png') }}" alt="Right Arrow" class="h-4 w-4">
        </div>
    </a>
</div>

@endsection
