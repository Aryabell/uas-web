@extends('layouts.app')
<script src="https://cdn.tailwindcss.com"></script>
@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md relative bg-white p-6 rounded-lg shadow-lg">
        <!-- Close Button -->
        <a href="{{ route('lessons.index') }}" class="absolute top-4 left-4">
            <img src="{{ asset('images/x.png') }}" alt="Close" class="w-15 h-15 hover:opacity-80 text-red-500">
        </a>

        <!-- Modal for Edit Lesson -->
        <h2 class="text-center text-2xl font-bold mb-4 text-[#052183]">Edit Lesson</h2>

        <form action="{{ route('lessons.update', $lesson->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Lesson Name -->
            <div>
                <input 
                    type="text" 
                    class="form-control w-full p-2 mt-1 border rounded-lg" 
                    id="name" 
                    name="name" 
                    placeholder="Lesson Name" 
                    value="{{ old('name', $lesson->name) }}" 
                    required
                >
            </div>

            <!-- Day -->
            <div>
                <label for="day" class="text-center block text-sm font-bold text-[#052183]">Day</label>
                <select 
                    class="form-select w-full p-2 mt-1 border rounded-lg text-[#052183]" 
                    id="day" 
                    name="day" 
                    required
                >
                    <option value="Monday" {{ $lesson->day === 'Monday' ? 'selected' : '' }}>Monday</option>
                    <option value="Tuesday" {{ $lesson->day === 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                    <option value="Wednesday" {{ $lesson->day === 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                    <option value="Thursday" {{ $lesson->day === 'Thursday' ? 'selected' : '' }}>Thursday</option>
                    <option value="Friday" {{ $lesson->day === 'Friday' ? 'selected' : '' }}>Friday</option>
                    <option value="Saturday" {{ $lesson->day === 'Saturday' ? 'selected' : '' }}>Saturday</option>
                </select>
            </div>

            <!-- Start Time -->
            <div>
                <input 
                    type="time" 
                    class="form-control w-full p-2 mt-1 border rounded-lg" 
                    id="start_time" 
                    name="start_time" 
                    value="{{ old('start_time', $lesson->start_time) }}"
                >
            </div>

            <!-- End Time -->
            <div>
                <input 
                    type="time" 
                    class="form-control w-full p-2 mt-1 border rounded-lg" 
                    id="end_time" 
                    name="end_time" 
                    value="{{ old('end_time', $lesson->end_time) }}"
                >
            </div>

            <!-- Class -->
            <div>
                <label for="class" class="text-center block text-sm font-bold text-[#052183]">Class</label>
                <select 
                    class="form-select w-full p-2 mt-1 border rounded-lg text-[#052183]" 
                    id="class" 
                    name="class" 
                    required
                >
                    <option value="X-1" {{ $lesson->class === 'X-1' ? 'selected' : '' }}>X-1</option>
                    <option value="X-2" {{ $lesson->class === 'X-2' ? 'selected' : '' }}>X-2</option>
                    <option value="XI-1" {{ $lesson->class === 'XI-1' ? 'selected' : '' }}>XI-1</option>
                    <option value="XI-2" {{ $lesson->class === 'XI-2' ? 'selected' : '' }}>XI-2</option>
                    <option value="XII-1" {{ $lesson->class === 'XII-1' ? 'selected' : '' }}>XII-1</option>
                    <option value="XII-2" {{ $lesson->class === 'XII-2' ? 'selected' : '' }}>XII-2</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-[#052183] text-white p-2 rounded-lg hover:bg-blue-600 transition font-bold">Update Lesson</button>
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
