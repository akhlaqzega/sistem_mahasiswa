<header class="bg-white shadow-sm">
    <div class="flex justify-between items-center p-4">
        <div class="flex items-center">
            <button class="md:hidden mr-4 text-gray-600">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="text-lg font-semibold text-gray-800">@yield('title')</h1>
        </div>
        <div class="flex items-center space-x-4">
            <div class="relative">
                <button class="text-gray-600 hover:text-gray-800">
                    <i class="fas fa-bell"></i>
                </button>
                <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
            </div>
            <div class="flex items-center">
                <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-white font-semibold">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <span class="ml-2 text-sm font-medium text-gray-700">{{ Auth::user()->name }}</span>
            </div>
        </div>
    </div>
</header>