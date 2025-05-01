@extends('layouts.admin', ['active' => 'mahasiswa'])

@section('title', 'Detail Mahasiswa')

@section('content')
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6 border-b">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800">Detail Mahasiswa</h2>
                <div>
                    <a href="{{ route('admin.mahasiswa.edit', $mahasiswa->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-150 mr-2">
                        <i class="fas fa-edit mr-2"></i>Edit
                    </a>
                    <a href="{{ route('admin.mahasiswa.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-150">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
            </div>
        </div>
        
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-lg font-medium text-gray-800 mb-4">Informasi Akun</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Nama Lengkap</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $mahasiswa->name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Email</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $mahasiswa->email }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Role</label>
                            <p class="mt-1 text-sm text-gray-900 capitalize">{{ $mahasiswa->role }}</p>
                        </div>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-lg font-medium text-gray-800 mb-4">Informasi Mahasiswa</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">NIM</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $mahasiswa->profile->nim }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Fakultas</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $mahasiswa->profile->fakultas }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Jurusan</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $mahasiswa->profile->jurusan }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Semester</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $mahasiswa->profile->semester }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Alamat</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $mahasiswa->profile->alamat }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">No. HP</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $mahasiswa->profile->no_hp }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection