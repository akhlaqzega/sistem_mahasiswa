<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\EditRequest;

class MahasiswaController extends Controller
{
 

    public function dashboard()
    {
        $user = auth()->user();
        $pendingRequests = EditRequest::where('user_id', $user->id)
            ->where('status', 'pending')
            ->count();
            
        return view('mahasiswa.dashboard', compact('user', 'pendingRequests'));
    }

    public function profile()
    {
        $user = auth()->user()->load('profile');
        return view('mahasiswa.profile', compact('user'));
    }

    public function createEditRequest()
    {
        $user = auth()->user()->load('profile');
        return view('mahasiswa.edit-request.create', compact('user'));
    }

    public function storeEditRequest(Request $request)
    {
        $user = auth()->user();
        $profile = $user->profile;
        
        $validated = $request->validate([
            'field' => 'required|in:nim,fakultas,jurusan,semester,alamat,no_hp',
            'new_value' => 'required',
        ]);
        
        EditRequest::create([
            'user_id' => $user->id,
            'field' => $validated['field'],
            'old_value' => $profile->{$validated['field']},
            'new_value' => $validated['new_value'],
        ]);
        
        return redirect()->route('mahasiswa.edit-request.index')->with('success', 'Permintaan perubahan berhasil diajukan');
    }

    public function indexEditRequests()
    {
        $requests = auth()->user()->editRequests()->latest()->paginate(10); // <- SOLUSINYA DI SINI
        return view('mahasiswa.edit-request.index', compact('requests'));
    }
    
}