@extends('layouts.mahasiswa', ['active' => 'profile'])

@section('title', 'Profil Saya')

@section('content')
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6 border-b">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800">Profil Saya</h2>
                <a href="{{ route('mahasiswa.edit-request.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-150">
                    <i class="fas fa-edit mr-2"></i>Ajukan Perubahan
                </a>
            </div>
        </div>
        
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Profile Photo -->
                <div class="md:col-span-1 flex flex-col items-center">
                    <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden mb-4">
                        @if($user->profile->foto)
                            <img src="{{ asset('storage/' . $user->profile->foto) }}" alt="Profile Photo" class="w-full h-full object-cover">
                        @else
                            <i class="fas fa-user text-5xl text-gray-400"></i>
                        @endif
                    </div>
                    <h3 class="text-lg font-medium text-gray-800">{{ $user->name }}</h3>
                    <p class="text-sm text-gray-500">{{ $user->email }}</p>
                </div>
                
                <!-- Profile Details -->
                <div class="md:col-span-2">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="text-md font-medium text-gray-800 mb-4">Informasi Pribadi</h4>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">NIM</label>
                                    <p class="mt-1 text-sm text-gray-900">{{ $user->profile->nim }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Nama Lengkap</label>
                                    <p class="mt-1 text-sm text-gray-900">{{ $user->name }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Email</label>
                                    <p class="mt-1 text-sm text-gray-900">{{ $user->email }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <h4 class="text-md font-medium text-gray-800 mb-4">Informasi Akademik</h4>
                            <div class="space-y-4">
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
                        </div>
                        
                        <div class="md:col-span-2">
                            <h4 class="text-md font-medium text-gray-800 mb-4">Kontak</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Alamat</label>
                                    <p class="mt-1 text-sm text-gray-900">{{ $user->profile->alamat }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">No. HP</label>
                                    <p class="mt-1 text-sm text-gray-900">{{ $user->profile->no_hp }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection