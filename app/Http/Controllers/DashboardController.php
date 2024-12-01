<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Announcement;

class DashboardController extends Controller
{

    public function index()
    {

        if (Auth::check()) {
            // Cek role pengguna
            if (Auth::user()->role === 'admin') {
                return view('admindashboard'); // Tampilkan view untuk admin
            }
        }

        $announcements = Announcement::latest()->limit(3)->get(); // Ambil 3 pengumuman terbaru
        return view('dashboard', compact('announcements'));
    }

    public function loadMoreAnnouncements(Request $request)
    {
        $announcements = Announcement::latest()
            ->skip($request->offset)
            ->take(3)
            ->get();
        return view('dashboard', compact('announcements'));
    }
}
