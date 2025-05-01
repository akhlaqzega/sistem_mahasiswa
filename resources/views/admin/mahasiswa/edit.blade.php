@extends('layouts.admin', ['active' => 'mahasiswa'])

@section('title', 'Edit Mahasiswa')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Edit Mahasiswa</h1>
        <a href="{{ route('admin.mahasiswa.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition duration-150">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Data Mahasiswa
        </a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <form action="{{ route('admin.mahasiswa.update', $mahasiswa->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="px-6 py-4">
                <!-- Nama -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="name" id="name" required value="{{ old('name', $mahasiswa->name) }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required value="{{ old('email', $mahasiswa->email) }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password (Kosongkan jika tidak ingin mengubah)</label>
                    <input type="password" name="password" id="password"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- NIM -->
                <div class="mb-4">
                    <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                    <input type="text" name="nim" id="nim" required value="{{ old('nim', $mahasiswa->profile->nim) }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('nim') border-red-500 @enderror">
                    @error('nim')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Fakultas -->
                <div class="mb-4">
                    <label for="fakultas" class="block text-sm font-medium text-gray-700">Fakultas</label>
                    <input type="text" name="fakultas" id="fakultas" required value="{{ old('fakultas', $mahasiswa->profile->fakultas) }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('fakultas') border-red-500 @enderror">
                    @error('fakultas')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Jurusan -->
                <div class="mb-4">
                    <label for="jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
                    <input type="text" name="jurusan" id="jurusan" required value="{{ old('jurusan', $mahasiswa->profile->jurusan) }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('jurusan') border-red-500 @enderror">
                    @error('jurusan')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Semester -->
                <div class="mb-4">
                    <label for="semester" class="block text-sm font-medium text-gray-700">Semester</label>
                    <input type="number" name="semester" id="semester" required value="{{ old('semester', $mahasiswa->profile->semester) }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('semester') border-red-500 @enderror">
                    @error('semester')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Alamat -->
                <div class="mb-4">
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <input type="text" name="alamat" id="alamat" required value="{{ old('alamat', $mahasiswa->profile->alamat) }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('alamat') border-red-500 @enderror">
                    @error('alamat')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- No HP -->
                <div class="mb-4">
                    <label for="no_hp" class="block text-sm font-medium text-gray-700">No HP</label>
                    <input type="text" name="no_hp" id="no_hp" required value="{{ old('no_hp', $mahasiswa->profile->no_hp) }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('no_hp') border-red-500 @enderror">
                    @error('no_hp')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="px-6 py-4 flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-150">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
