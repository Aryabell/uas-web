@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<div class="bg-gradient-to-r from-[#2BC2FD] to-[#052183] flex flex-col items-center text-white p-6">
    <h2 class="text-lg font-bold">PROFILE</h2>
</div>
<div class="w-24 h-24 bg-gray-400 rounded-full my-4 mx-auto flex items-center justify-center">
    <p class="text-xl font-bold flex items-center justify-center">{{ strtoupper(auth()->user()->name) }}</p>
</div>
<p class="text-sm font-semibold mt-1 flex items-center justify-center">{{ auth()->user()->email }}</p>
<p class="text-sm mt-1 flex items-center justify-center">{{ auth()->user()->student->nis ?? 'NIS not available' }}</p>
<div class="flex items-center justify-center mt-4">
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
            Logout
        </button>
    </form>
</div>
@endsection