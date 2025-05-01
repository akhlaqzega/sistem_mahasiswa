<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .hero-bg {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-800">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <i class="fas fa-graduation-cap text-blue-600 text-2xl mr-2"></i>
                        <span class="text-xl font-bold text-gray-900">Sistem Mahasiswa</span>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-blue-600 transition">Login</a>
                    <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-700 transition">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-bg text-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                    Sistem Manajemen Mahasiswa Modern
                </h1>
                <p class="mt-6 max-w-lg mx-auto text-xl">
                    Solusi terintegrasi untuk pengelolaan data mahasiswa, permintaan perubahan data, dan administrasi akademik.
                </p>
                <div class="mt-10">
                    <a href="{{ route('login') }}" class="inline-block bg-white text-blue-600 px-8 py-3 rounded-md text-lg font-medium hover:bg-gray-100 transition">
                        Mulai Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Fitur Unggulan Sistem
                </h2>
                <p class="mt-4 max-w-2xl mx-auto text-gray-500">
                    Sistem kami menyediakan segala kebutuhan administrasi mahasiswa dalam satu platform terintegrasi.
                </p>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Feature 1 -->
                    <div class="feature-card bg-white p-6 rounded-lg shadow-md transition duration-300">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                            <i class="fas fa-user-graduate text-xl"></i>
                        </div>
                        <h3 class="mt-4 text-lg font-medium text-gray-900">Manajemen Data Mahasiswa</h3>
                        <p class="mt-2 text-gray-500">
                            Kelola data mahasiswa secara lengkap dan terstruktur dengan antarmuka yang mudah digunakan.
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="feature-card bg-white p-6 rounded-lg shadow-md transition duration-300">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-green-500 text-white">
                            <i class="fas fa-edit text-xl"></i>
                        </div>
                        <h3 class="mt-4 text-lg font-medium text-gray-900">Permintaan Perubahan Data</h3>
                        <p class="mt-2 text-gray-500">
                            Sistem pengajuan perubahan data dengan proses approval yang efisien dan transparan.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="feature-card bg-white p-6 rounded-lg shadow-md transition duration-300">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-purple-500 text-white">
                            <i class="fas fa-chart-line text-xl"></i>
                        </div>
                        <h3 class="mt-4 text-lg font-medium text-gray-900">Dashboard Analitik</h3>
                        <p class="mt-2 text-gray-500">
                            Visualisasi data statistik mahasiswa untuk kebutuhan analisis dan pengambilan keputusan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials -->
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Apa Kata Mereka?
                </h2>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                    <!-- Testimonial 1 -->
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-12 w-12 rounded-full bg-blue-100 flex items-center justify-center">
                                <i class="fas fa-user text-blue-600"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-medium text-gray-900">Dr. Ahmad S.T., M.Kom</h4>
                                <p class="text-gray-500">Ketua Program Studi</p>
                            </div>
                        </div>
                        <p class="mt-4 text-gray-600">
                            "Sistem ini sangat membantu kami dalam mengelola data mahasiswa. Proses administrasi menjadi lebih efisien dan terorganisir dengan baik."
                        </p>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-12 w-12 rounded-full bg-green-100 flex items-center justify-center">
                                <i class="fas fa-user text-green-600"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-medium text-gray-900">Budi Santoso</h4>
                                <p class="text-gray-500">Mahasiswa Semester 5</p>
                            </div>
                        </div>
                        <p class="mt-4 text-gray-600">
                            "Sangat mudah mengajukan perubahan data melalui sistem ini. Prosesnya cepat dan status permintaan bisa dipantau secara real-time."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-blue-700">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h3 class="text-3xl font-extrabold text-white sm:text-4xl">
                    <span class="block">Siap mengoptimalkan manajemen data mahasiswa?</span>
                </h3>
                <p class="mt-4 max-w-2xl mx-auto text-blue-100">
                    Mulai gunakan sistem kami sekarang dan rasakan kemudahan dalam pengelolaan data akademik.
                </p>
                <div class="mt-8">
                    <a href="{{ route('login') }}" class="inline-block bg-white text-blue-700 px-8 py-3 rounded-md text-lg font-medium hover:bg-gray-100 transition">
                        Login Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-white text-lg font-semibold">Sistem Mahasiswa</h3>
                    <p class="mt-4 text-gray-300">
                        Solusi terintegrasi untuk pengelolaan data mahasiswa dan administrasi akademik.
                    </p>
                </div>
                <div>
                    <h3 class="text-white text-lg font-semibold">Kontak</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white">Email: info@sistem-mahasiswa.ac.id</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Telp: (021) 1234-5678</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white text-lg font-semibold">Tautan Cepat</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="{{ route('login') }}" class="text-gray-300 hover:text-white">Login</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Kebijakan Privasi</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-700">
                <p class="text-gray-400 text-center">
                    &copy; {{ date('Y') }} Sistem Mahasiswa. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>