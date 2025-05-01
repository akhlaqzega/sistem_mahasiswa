<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @stack('styles')
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        @include('components.sidebar', ['active' => $active ?? 'dashboard'])

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Navbar -->
            @include('components.navbar')

            <!-- Content -->
            <main class="p-6">
                @include('components.alerts')
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>