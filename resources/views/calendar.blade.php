@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<div class="bg-gradient-to-r from-[#2BC2FD] to-[#052183] flex flex-col justify-center items-center text-white p-6">
    <h2 class="text-sm font-medium">Selamat Datang</h2>
    <p class="text-2xl font-bold my-2">{{ strtoupper(auth()->user()->name) }}</p>
    <p class="text-sm">{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
</div>

@endsection