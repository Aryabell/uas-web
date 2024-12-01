@extends('layouts.app')
<script src="https://cdn.tailwindcss.com"></script>
@section('content')
<div class="bg-gradient-to-r from-[#2BC2FD] to-[#052183] flex flex-col justify-center items-center text-white py-8">
    <h2 class="text-2xl font-bold">Student Management</h2>
</div>
<div class="container mx-auto mt-8 px-4">
    <div class="flex justify-between items-center mb-6">
        <a href="{{ route('students.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            + Add Student
        </a>
    </div>

    <div>
        @foreach ($students as $student)
        <div x-data="{ open: false }" class="border border-gray-200 rounded-lg mb-4 shadow-md">
            <h2 class="flex justify-between items-center px-4 py-2 text-gray-800 bg-gray-100 hover:bg-gray-200 transition cursor-pointer" 
                @click="open = !open">
                <span class="font-medium">{{ $student->name }}</span>
                <span class="text-sm text-gray-500">{{ $student->class }}</span>
            </h2>
            <div x-show="open" class="px-4 py-3 bg-white" x-transition>
                <div class="flex gap-2">
                    <a href="{{ route('students.edit', $student->id) }}" class="bg-yellow-500 text-white px-3 py-2 rounded hover:bg-yellow-600 transition text-sm">
                        Edit
                    </a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600 transition text-sm" onclick="return confirm('Are you sure you want to delete this student?')">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection