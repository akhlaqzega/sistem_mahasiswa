@if(session('success'))
    <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded">
        <div class="flex items-center">
            <i class="fas fa-check-circle mr-2"></i>
            <p>{{ session('success') }}</p>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded">
        <div class="flex items-center">
            <i class="fas fa-exclamation-circle mr-2"></i>
            <p>{{ session('error') }}</p>
        </div>
    </div>
@endif

@if($errors->any())
    <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded">
        <div class="flex items-center">
            <i class="fas fa-exclamation-circle mr-2"></i>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif