<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-blue-600 py-4 px-6">
                <h1 class="text-white text-2xl font-bold">Sistem Mahasiswa</h1>
            </div>
            <div class="p-6">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>