@extends('layouts.admin', ['active' => 'mahasiswa'])

@section('title', 'Data Mahasiswa')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Data Mahasiswa</h1>
        <a href="{{ route('admin.mahasiswa.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-150">
            <i class="fas fa-plus mr-2"></i>Tambah Mahasiswa
        </a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIM</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fakultas</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jurusan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($mahasiswa as $mhs)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-semibold">
                                    {{ strtoupper(substr($mhs->name, 0, 1)) }}
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $mhs->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $mhs->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $mhs->profile->nim }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $mhs->profile->fakultas }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $mhs->profile->jurusan }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('admin.mahasiswa.show', $mhs->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">Detail</a>
                            <a href="{{ route('admin.mahasiswa.edit', $mhs->id) }}" class="text-yellow-600 hover:text-yellow-900 mr-3">Edit</a>
                            <form action="{{ route('admin.mahasiswa.destroy', $mhs->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus mahasiswa ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $mahasiswa->links() }}
        </div>
    </div>
@endsection