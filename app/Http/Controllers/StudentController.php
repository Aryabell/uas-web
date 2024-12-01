<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|email|unique:students,username|unique:users,email', // Username adalah email dan harus unik di kedua tabel
            'password' => 'required|min:8', // Password minimal 8 karakter
            'class' => 'required',
            'nis' => 'required|unique:students,nis', // Tambahkan validasi untuk NIS
        ]);
    
        // Hash password
        $hashedPassword = bcrypt($request->password);
    
        // Insert data ke tabel users
        \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->username, // Gunakan username (email) di kolom email tabel users
            'password' => $hashedPassword,
            'role' => 'user', // Default role adalah user
        ]);
    
        // Insert data ke tabel students
        Student::create([
            'name' => $request->name,
            'username' => $request->username, // Gunakan username (email) di tabel students
            'class' => $request->class,
            'nis' => $request->nis,
        ]);
    
        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }    

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
{
    $request->validate([
        'name' => 'required',
        'username' => 'required|email|unique:students,username,' . $student->id, // Periksa username unik kecuali untuk ID siswa ini
        'password' => 'nullable|min:8', // Password opsional saat mengupdate
        'class' => 'required',
    ]);

    // Update data di tabel students
    $student->update([
        'name' => $request->name,
        'username' => $request->username,
        'class' => $request->class,
    ]);

    // Update data di tabel users (jika ada perubahan password)
    if ($request->filled('password')) {
        $user = \App\Models\User::where('email', $student->username)->first();
        if ($user) {
            $user->update([
                'password' => bcrypt($request->password),
            ]);
        }
    }

    return redirect()->route('students.index')->with('success', 'Student updated successfully!');
}

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
