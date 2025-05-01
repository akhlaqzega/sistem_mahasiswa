@extends('layouts.mahasiswa', ['active' => 'dashboard'])

@section('title', 'Dashboard Mahasiswa')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Welcome Card -->
        <div class="bg-white rounded-lg shadow p-6 md:col-span-2">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                    <i class="fas fa-user-graduate text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h2 class="text-xl font-semibold text-gray-800">Selamat datang, {{ $user->name }}!</h2>
                    <p class="text-gray-600">Anda login sebagai Mahasiswa</p>
                </div>
            </div>
        </div>

        <!-- Profile Summary -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Profil Singkat</h3>
            <div class="space-y-3">
                <div>
                    <label class="block text-sm font-medium text-gray-500">NIM</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $user->profile->nim }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500">Fakultas</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $user->profile->fakultas }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500">Jurusan</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $user->profile->jurusan }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500">Semester</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $user->profile->semester }}</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('mahasiswa.profile') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    Lihat profil lengkap <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>

        <!-- Edit Requests -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Permintaan Edit</h3>
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <div class="p-2 rounded-full bg-blue-100 text-blue-600 mr-3">
                        <i class="fas fa-edit"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total Permintaan</p>
                        <p class="text-xl font-semibold">{{ $user->editRequests->count() }}</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="p-2 rounded-full bg-yellow-100 text-yellow-600 mr-3">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Pending</p>
                        <p class="text-xl font-semibold">{{ $pendingRequests }}</p>
                    </div>
                </div>
            </div>
            <a href="{{ route('mahasiswa.edit-request.create') }}" class="block w-full bg-blue-600 text-white text-center py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-150 mt-4">
                <i class="fas fa-plus mr-2"></i>Ajukan Permintaan Baru
            </a>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="mt-8 bg-white rounded-lg shadow overflow-hidden">
        <div class="p-4 border-b">
            <h2 class="text-lg font-semibold text-gray-800">Aktivitas Terakhir</h2>
        </div>
        <div class="divide-y divide-gray-200">
            @forelse($user->editRequests->take(5) as $request)
            <div class="p-4 hover:bg-gray-50">
                <div class="flex justify-between">
                    <div>
                        <p class="font-medium text-gray-800">Permintaan edit {{ ucfirst($request->field) }}</p>
                        <p class="text-sm text-gray-500">Diajukan pada {{ $request->created_at->format('d M Y H:i') }}</p>
                    </div>
                    <div>
                        @if($request->status === 'pending')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                        @elseif($request->status === 'approved')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Approved</span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Rejected</span>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="p-4 text-center text-gray-500">
                Tidak ada aktivitas terakhir
            </div>
            @endforelse
        </div>
        <div class="p-4 border-t text-center">
            <a href="{{ route('mahasiswa.edit-request.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                Lihat semua permintaan <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    </div>
@endsection