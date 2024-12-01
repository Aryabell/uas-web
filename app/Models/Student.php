<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Gunakan ini jika ingin mendukung login
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable // Warisi dari Authenticatable agar mendukung login
{
    use HasFactory, Notifiable;

    protected $table = 'students'; // Nama tabel (opsional)

    protected $fillable = [
        'name',       // Nama siswa
        'username',   // Username
        'password',   // Password (hashed)
        'class',      // Kelas siswa
        'nis',
    ];

    // Agar password selalu di-hash saat disimpan
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    // Jika perlu menyembunyikan atribut tertentu dari JSON output
    protected $hidden = [
        'password', // Sembunyikan password saat model di-convert ke JSON
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->hasOne(User::class, 'student_id');
    }
}
