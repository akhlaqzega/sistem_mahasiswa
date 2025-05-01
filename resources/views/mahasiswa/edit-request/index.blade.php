@extends('layouts.mahasiswa', ['active' => 'edit-request'])

@section('title', 'Daftar Permintaan Edit')

@section('content')
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6 border-b">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800">Daftar Permintaan Edit</h2>
                <a href="{{ route('mahasiswa.edit-request.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-150">
                    <i class="fas fa-plus mr-2"></i>Permintaan Baru
                </a>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Field</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai Lama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai Baru</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catatan Admin</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($requests as $request)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 capitalize">{{ $request->field }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $request->old_value }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $request->new_value }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($request->status === 'pending')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                            @elseif($request->status === 'approved')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Approved</span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Rejected</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $request->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $request->admin_notes ?? '-' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">Belum ada permintaan edit</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($requests->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $requests->links() }}
        </div>
        @endif
    </div>
@endsection