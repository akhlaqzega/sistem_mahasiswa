<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\EditRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Admin dashboard
     */
    public function adminDashboard()
    {
        $totalMahasiswa = User::where('role', 'mahasiswa')->count();
        $pendingRequests = EditRequest::where('status', 'pending')->count();
        $recentRequests = EditRequest::with('user')
                        ->orderBy('created_at', 'desc')
                        ->limit(5)
                        ->get();
        
        return view('admin.dashboard', compact('totalMahasiswa', 'pendingRequests', 'recentRequests'));
    }

    /**
     * Mahasiswa dashboard
     */
    public function mahasiswaDashboard()
    {
        $user = auth()->user();
        $profile = $user->profile;
        $pendingRequests = $user->editRequests()->where('status', 'pending')->count();
        $recentRequests = $user->editRequests()
                            ->orderBy('created_at', 'desc')
                            ->limit(5)
                            ->get();
        
        return view('mahasiswa.dashboard', compact('profile', 'pendingRequests', 'recentRequests'));
    }
}