<div class="w-64 bg-white shadow-md">
    <div class="p-4 border-b">
        <h2 class="text-xl font-semibold text-gray-800">
            @if(isset($role) && $role === 'mahasiswa')
                Mahasiswa
            @else
                Admin Panel
            @endif
        </h2>
    </div>
    <nav class="p-4">
        <ul class="space-y-2">
            <li>
                <a href="{{ isset($role) && $role === 'mahasiswa' ? route('mahasiswa.dashboard') : route('admin.dashboard') }}" 
                   class="flex items-center p-2 rounded-lg {{ ($active ?? '') === 'dashboard' ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            @if(!isset($role) || $role !== 'mahasiswa')
                <li>
                    <a href="{{ route('admin.mahasiswa.index') }}" 
                       class="flex items-center p-2 rounded-lg {{ ($active ?? '') === 'mahasiswa' ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                        <i class="fas fa-users mr-3"></i>
                        <span>Data Mahasiswa</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.edit-requests.index') }}" 
                       class="flex items-center p-2 rounded-lg {{ ($active ?? '') === 'requests' ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                        <i class="fas fa-edit mr-3"></i>
                        <span>Permintaan Edit</span>
                    </a>
                </li>
            @else
                <li>
                    <a href="{{ route('mahasiswa.profile') }}" 
                       class="flex items-center p-2 rounded-lg {{ ($active ?? '') === 'profile' ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                        <i class="fas fa-user mr-3"></i>
                        <span>Profil Saya</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('mahasiswa.edit-request.index') }}" 
                       class="flex items-center p-2 rounded-lg {{ ($active ?? '') === 'edit-request' ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                        <i class="fas fa-pen mr-3"></i>
                        <span>Permintaan Edit</span>
                    </a>
                </li>
            @endif
        </ul>
        
        <div class="mt-10 pt-4 border-t">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center p-2 w-full rounded-lg text-gray-700 hover:bg-gray-100">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </nav>
</div>