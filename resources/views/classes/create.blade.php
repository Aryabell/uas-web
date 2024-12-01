@extends('layouts.app')
<script src="https://cdn.tailwindcss.com"></script>
@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md relative bg-white p-6 rounded-lg shadow-lg">
        <!-- Close Button -->
        <a href="{{ route('classes.index') }}" class="absolute top-4 left-4">
            <img src="{{ asset('images/x.png') }}" alt="Close" class="w-15 h-15 hover:opacity-80 text-red-500">
        </a>

        <!-- Modal for Add Class -->
        <h2 class="text-center text-2xl font-bold mb-4 text-[#052183]">Add Class</h2>

        <form action="{{ route('classes.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Class Name -->
            <div>
                <input type="text" class="form-control w-full p-2 mt-1 border rounded-lg" id="name" name="name" placeholder="Class Name" required>
            </div>

            <button type="submit" class="w-full bg-[#052183] text-white p-2 rounded-lg hover:bg-blue-600 transition font-bold">Add Class</button>
            @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-2 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

        </form>
    </div>
</div>
@endsection
