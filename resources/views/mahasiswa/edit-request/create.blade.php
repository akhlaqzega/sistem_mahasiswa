@extends('layouts.mahasiswa', ['active' => 'edit-request'])

@section('title', 'Ajukan Permintaan Edit')

@section('content')
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6 border-b">
            <h2 class="text-xl font-semibold text-gray-800">Ajukan Permintaan Edit Data</h2>
        </div>
        
        <div class="p-6">
            <form action="{{ route('mahasiswa.edit-request.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="field" class="block text-sm font-medium text-gray-700 mb-1">Field yang ingin diubah</label>
                        <select id="field" name="field" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="">Pilih field</option>
                            <option value="nim">NIM</option>
                            <option value="fakultas">Fakultas</option>
                            <option value="jurusan">Jurusan</option>
                            <option value="semester">Semester</option>
                            <option value="alamat">Alamat</option>
                            <option value="no_hp">No. HP</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="new_value" class="block text-sm font-medium text-gray-700 mb-1">Nilai Baru</label>
                        <input type="text" id="new_value" name="new_value" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h4 class="text-sm font-medium text-gray-700 mb-2">Informasi Saat Ini</h4>
                        <p class="text-sm text-gray-600" id="current_value_text">Pilih field terlebih dahulu untuk melihat nilai saat ini</p>
                    </div>
                    
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-150">
                            <i class="fas fa-paper-plane mr-2"></i>Ajukan Permintaan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        document.getElementById('field').addEventListener('change', function() {
            const field = this.value;
            if (field) {
                // Ini hanya contoh, Anda perlu menyesuaikan dengan data profil aktual
                const currentValues = {
                    'nim': '{{ $user->profile->nim }}',
                    'fakultas': '{{ $user->profile->fakultas }}',
                    'jurusan': '{{ $user->profile->jurusan }}',
                    'semester': '{{ $user->profile->semester }}',
                    'alamat': '{{ $user->profile->alamat }}',
                    'no_hp': '{{ $user->profile->no_hp }}'
                };
                
                document.getElementById('current_value_text').textContent = currentValues[field];
            } else {
                document.getElementById('current_value_text').textContent = 'Pilih field terlebih dahulu untuk melihat nilai saat ini';
            }
        });
    </script>
    @endpush
@endsection