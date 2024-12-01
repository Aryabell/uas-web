<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LessonController;
use Illuminate\Support\Facades\App;
use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return Auth::check() ? redirect()->route('dashboard') : redirect()->route('login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/load-more-announcements', [DashboardController::class, 'loadMoreAnnouncements'])
    ->middleware(['auth', 'verified']);

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('calendar', [CalendarController::class, 'index'])->name('calendar');
Route::post('/login', [AuthController::class, 'login'])->name('login.post')->middleware('csrf');
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
// Route untuk form register (GET)
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/logout', Logout::class)->name('logout');
// Route untuk proses register (POST)
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::resource('students', StudentController::class);
Route::Resource('announcements', AnnouncementController::class);
Route::resource('lessons', LessonController::class);
Route::resource('classes', ClassController::class);

require __DIR__ . '/auth.php';
