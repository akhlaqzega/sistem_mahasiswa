@extends('layouts.admin', ['active' => 'edit-requests'])

@section('title', 'Detail Permintaan Edit')

@section('content')
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="p-4 border-b">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">Detail Permintaan Edit</h2>
            <a href="{{ route('admin.edit-requests.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
        </div>
    </div>
    
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Request Details -->
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Permintaan</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Mahasiswa</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $request->user->name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Field</label>
                        <p class="mt-1 text-sm text-gray-900 capitalize">{{ $request->field }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Nilai Lama</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $request->old_value }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Nilai Baru</label>
                        <p class="mt-1 text-sm text-gray-900 font-medium">{{ $request->new_value }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Status</label>
                        <p class="mt-1 text-sm">
                            @if($request->status === 'pending')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                            @elseif($request->status === 'approved')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Approved</span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Rejected</span>
                            @endif
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Diajukan Pada</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $request->created_at->format('d M Y H:i') }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Action Form -->
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-4">Tindakan</h3>
                @if($request->status === 'pending')
                <form action="{{ route('admin.edit-requests.approve', $request->id) }}" method="POST" class="mb-4">
                    @csrf
                    <div class="mb-4">
                        <label for="admin_notes" class="block text-sm font-medium text-gray-700 mb-1">Catatan (Opsional)</label>
                        <textarea name="admin_notes" id="admin_notes" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <i class="fas fa-check mr-2"></i> Setujui Permintaan
                    </button>
                </form>
                
                <form action="{{ route('admin.edit-requests.reject', $request->id) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="admin_notes" class="block text-sm font-medium text-gray-700 mb-1">Alasan Penolakan</label>
                        <textarea name="admin_notes" id="admin_notes" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required></textarea>
                    </div>
                    <button type="submit" class="w-full bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        <i class="fas fa-times mr-2"></i> Tolak Permintaan
                    </button>
                </form>
                @else
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Catatan Admin</h4>
                    <p class="text-sm text-gray-600">{{ $request->admin_notes ?? 'Tidak ada catatan' }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection