@extends('layouts.app')
<script src="https://cdn.tailwindcss.com"></script>
@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md relative bg-white p-6 rounded-lg shadow-lg">
        <!-- Close Button -->
        <a href="{{ route('students.index') }}" class="absolute top-4 left-4">
            <img src="{{ asset('images/x.png') }}" alt="Close" class="w-15 h-15 hover:opacity-80 text-red-500">
        </a>

        <!-- Modal for Edit Student -->
        <h2 class="text-center text-2xl font-bold mb-4 text-[#052183]">Edit Student</h2>

        <form action="{{ route('students.update', $student->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
                <input type="text" class="form-control w-full p-2 mt-1 border rounded-lg" id="name" name="name" value="{{ $student->name }}" placeholder="Nama Lengkap" required>
            </div>

            <!-- Username -->
            <div>
                <input type="text" class="form-control w-full p-2 mt-1 border rounded-lg" id="username" name="username" value="{{ $student->username }}" placeholder="Username" required>
            </div>

            <!-- Password -->
            <div>
                <input type="password" class="form-control w-full p-2 mt-1 border rounded-lg" id="password" name="password" placeholder="Password (Leave empty if not changing)">
            </div>

            <!-- Class -->
            <div>
                <label for="class" class="text-center block text-sm font-bold text-[#052183]">Kelas</label>
                <select class="form-select w-full p-2 mt-1 border rounded-lg text-[#052183]" id="class" name="class" required>
                    <option value="X-1" {{ $student->class == 'X-1' ? 'selected' : '' }}>X-1</option>
                    <option value="X-2" {{ $student->class == 'X-2' ? 'selected' : '' }}>X-2</option>
                    <option value="XI-1" {{ $student->class == 'XI-1' ? 'selected' : '' }}>XI-1</option>
                    <option value="XI-2" {{ $student->class == 'XI-2' ? 'selected' : '' }}>XI-2</option>
                    <option value="XII-1" {{ $student->class == 'XII-1' ? 'selected' : '' }}>XII-1</option>
                    <option value="XII-2" {{ $student->class == 'XII-2' ? 'selected' : '' }}>XII-2</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-[#052183] text-white p-2 rounded-lg hover:bg-blue-600 transition font-bold">Update Student</button>
            
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
