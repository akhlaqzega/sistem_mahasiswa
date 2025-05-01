<?php

namespace App\Http\Controllers;

use App\Models\EditRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditRequestController extends Controller
{
    /**
     * List all edit requests (admin)
     */
    public function index()
    {
        $requests = EditRequest::with('user')
                    ->orderBy('status', 'asc')
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
        
        return view('admin.edit-requests.index', compact('requests'));
    }

    /**
     * Show edit request details (admin)
     */
    public function show(EditRequest $editRequest)
    {
        return view('admin.edit-requests.show', compact('editRequest'));
    }

    /**
     * Process edit request (admin)
     */
    public function process(Request $request, EditRequest $editRequest)
    {
        $validated = $request->validate([
            'status' => 'required|in:approved,rejected',
            'komentar_admin' => 'nullable|string',
        ]);

        DB::beginTransaction();
        
        try {
            // Update request status
            $editRequest->update([
                'status' => $validated['status'],
                'komentar_admin' => $validated['komentar_admin'],
                'processed_at' => now(),
            ]);

            // If approved, update the profile
            if ($validated['status'] === 'approved') {
                $profile = $editRequest->user->profile;
                $profile->{$editRequest->field_name} = $editRequest->new_value;
                $profile->save();
            }
            
            DB::commit();
            
            return redirect()->route('admin.edit-requests.index')
                ->with('success', 'Permintaan perubahan data berhasil diproses');
                
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * List user's edit requests (mahasiswa)
     */
    public function userRequests()
    {
        $requests = auth()->user()->editRequests()
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
        
        return view('mahasiswa.edit-request.index', compact('requests'));
    }

    /**
     * Show form to create edit request (mahasiswa)
     */
    public function create()
    {
        $user = auth()->user();
        $profile = $user->profile;
        
        $fields = [
            'nama_lengkap' => 'Nama Lengkap',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'alamat' => 'Alamat',
            'no_telp' => 'Nomor Telepon',
            'jurusan' => 'Jurusan',
            'fakultas' => 'Fakultas',
            'angkatan' => 'Angkatan'
        ];
        
        return view('mahasiswa.edit-request.create', compact('profile', 'fields'));
    }

    /**
     * Store edit request (mahasiswa)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'field_name' => 'required|string',
            'new_value' => 'required|string',
            'alasan' => 'required|string',
        ]);

        $user = auth()->user();
        $profile = $user->profile;
        
        // Check if field exists
        if (!isset($profile->{$validated['field_name']})) {
            return back()->with('error', 'Field yang dipilih tidak valid.');
        }
        
        // Check for pending requests for the same field
        $pendingRequest = $user->editRequests()
                        ->where('field_name', $validated['field_name'])
                        ->where('status', 'pending')
                        ->first();
                        
        if ($pendingRequest) {
            return back()->with('error', 'Anda sudah memiliki permintaan perubahan untuk field ini yang masih menunggu persetujuan.');
        }
        
        // Create new edit request
        EditRequest::create([
            'user_id' => $user->id,
            'field_name' => $validated['field_name'],
            'old_value' => $profile->{$validated['field_name']},
            'new_value' => $validated['new_value'],
            'alasan' => $validated['alasan'],
            'status' => 'pending',
        ]);
        
        return redirect()->route('mahasiswa.edit-requests.index')
            ->with('success', 'Permintaan perubahan data berhasil dikirim dan menunggu persetujuan admin.');
    }
}