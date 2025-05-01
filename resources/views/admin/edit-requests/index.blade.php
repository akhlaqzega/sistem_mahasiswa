@extends('layouts.admin', ['active' => 'edit-requests'])

@section('title', 'Daftar Permintaan Edit')

@section('content')
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="p-4 border-b">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">Daftar Permintaan Edit Data</h2>
            <div class="flex space-x-2">
                <a href="{{ route('admin.edit-requests.index', ['status' => 'pending']) }}" 
                   class="px-3 py-1 rounded-full text-xs {{ request('status') == 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800' }}">
                    Pending
                </a>
                <a href="{{ route('admin.edit-requests.index', ['status' => 'approved']) }}" 
                   class="px-3 py-1 rounded-full text-xs {{ request('status') == 'approved' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                    Approved
                </a>
                <a href="{{ route('admin.edit-requests.index', ['status' => 'rejected']) }}" 
                   class="px-3 py-1 rounded-full text-xs {{ request('status') == 'rejected' ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800' }}">
                    Rejected
                </a>
                <a href="{{ route('admin.edit-requests.index') }}" 
                   class="px-3 py-1 rounded-full text-xs bg-blue-100 text-blue-800">
                    All
                </a>
            </div>
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mahasiswa</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Field</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai Lama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai Baru</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($requests as $request)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-semibold">
                                {{ strtoupper(substr($request->user->name, 0, 1)) }}
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{ $request->user->name }}</div>
                                <div class="text-sm text-gray-500">{{ $request->user->email }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 capitalize">{{ $request->field }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $request->old_value }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">{{ $request->new_value }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($request->status === 'pending')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                        @elseif($request->status === 'approved')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Approved</span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Rejected</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $request->created_at->format('d M Y H:i') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('admin.edit-requests.show', $request->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">Detail</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada permintaan edit</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($requests->hasPages())
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $requests->appends(request()->query())->links() }}
    </div>
    @endif
</div>
@endsection