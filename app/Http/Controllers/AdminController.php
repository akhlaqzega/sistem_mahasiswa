<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\EditRequest;
use Illuminate\Support\Facades\Hash;  // Gunakan Hash yang benar
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // Dashboard Admin
    public function dashboard()
    {
        $editRequests = EditRequest::with('user')->latest()->take(5)->get();
        $totalMahasiswa = User::where('role', 'mahasiswa')->count();
        $totalRequests = EditRequest::count();
        $pendingRequests = EditRequest::where('status', 'pending')->count();

        return view('admin.dashboard', compact('editRequests', 'totalMahasiswa', 'totalRequests', 'pendingRequests'));
    }

    // Daftar Mahasiswa (Dengan Pagination)
    public function indexMahasiswa()
    {
        $mahasiswa = User::with('profile')
                        ->where('role', 'mahasiswa')
                        ->paginate(10); // Menggunakan paginate bukan get()
        
        return view('admin.mahasiswa.index', compact('mahasiswa'));
    }

    // Tambah Mahasiswa Baru
    public function createMahasiswa()
    {
        return view('admin.mahasiswa.create');
    }

    // Simpan Mahasiswa Baru
    public function storeMahasiswa(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'nim' => 'required|string|unique:profiles',
            'fakultas' => 'required|string',
            'jurusan' => 'required|string',
            'semester' => 'required|integer',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
        ]);

        DB::transaction(function () use ($validatedData) {
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']), // Gunakan Hash::make untuk password
                'role' => 'mahasiswa',
            ]);

            $user->profile()->create([
                'nim' => $validatedData['nim'],
                'fakultas' => $validatedData['fakultas'],
                'jurusan' => $validatedData['jurusan'],
                'semester' => $validatedData['semester'],
                'alamat' => $validatedData['alamat'],
                'no_hp' => $validatedData['no_hp'],
            ]);
        });

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    // Detail Mahasiswa
    public function showMahasiswa($id)
    {
        $mahasiswa = User::with('profile')->findOrFail($id);
        return view('admin.mahasiswa.show', compact('mahasiswa'));
    }

    // Form Edit Mahasiswa
    public function editMahasiswa($id)
    {
        $mahasiswa = User::with('profile')->findOrFail($id);
        return view('admin.mahasiswa.edit', compact('mahasiswa'));
    }

    // Update Data Mahasiswa
    public function updateMahasiswa(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $profile = $user->profile;
    
        $validatedUser = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8', // Password boleh kosong
        ]);
    
        $validatedProfile = $request->validate([
            'nim' => 'required|string|unique:profiles,nim,' . $profile->id,
            'fakultas' => 'required|string',
            'jurusan' => 'required|string',
            'semester' => 'required|integer',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
        ]);
    
        // Update data user
        $userData = [
            'name' => $validatedUser['name'],
            'email' => $validatedUser['email'],
        ];
    
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($validatedUser['password']);
        }
    
        $user->update($userData);
        $profile->update($validatedProfile);
    
        return redirect()->route('admin.mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui');
    }
    
    // Hapus Mahasiswa
    public function destroyMahasiswa($id)
    {
        $user = User::findOrFail($id);

        DB::transaction(function () use ($user) {
            $user->profile()->delete();
            $user->delete();
        });

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }

    // Daftar Permintaan Edit (Dengan Pagination)
    public function indexEditRequests()
    {
        $requests = EditRequest::with('user')->latest()->paginate(10);
        return view('admin.edit-requests.index', compact('requests'));
    }

    // Detail Permintaan Edit
    public function showEditRequest($id)
    {
        $request = EditRequest::with('user')->findOrFail($id);
        return view('admin.edit-requests.show', compact('request'));
    }

    // Setujui Permintaan Edit
    public function approveEditRequest(Request $request, $id)
    {
        $editRequest = EditRequest::findOrFail($id);
        $user = $editRequest->user;
        $profile = $user->profile;

        // Update field pada profile
        $profile->update([
            $editRequest->field => $editRequest->new_value
        ]);

        // Update status permintaan
        $editRequest->update([
            'status' => 'approved',
            'admin_notes' => $request->admin_notes,
        ]);

        return redirect()->route('admin.edit-requests.index')->with('success', 'Permintaan berhasil disetujui');
    }

    // Tolak Permintaan Edit
    public function rejectEditRequest(Request $request, $id)
    {
        $editRequest = EditRequest::findOrFail($id);

        $editRequest->update([
            'status' => 'rejected',
            'admin_notes' => $request->admin_notes,
        ]);

        return redirect()->route('admin.edit-requests.index')->with('success', 'Permintaan berhasil ditolak');
    }
}
