<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevAcademy - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('styles')
</head>
<body class="bg-gray-100 text-gray-900 flex flex-col min-h-screen">

    {{-- Navbar --}}
    <nav class="bg-white shadow-md fixed top-0 left-0 w-full z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex space-x-6 items-center">
                <a href="{{ url('/') }}" class="text-xl font-bold text-blue-500">DevAcademy</a>
                <a href="{{ url('/kursus') }}" class="text-blue-500 hover:text-blue-700">Kursus</a>
                <a href="{{ url('/komunitas') }}" class="text-blue-500 hover:text-blue-700">Komunitas</a>
                <a href="{{ url('/tentang') }}" class="text-blue-500 hover:text-blue-700">Tentang Kami</a>
                <a href="{{ route('kontak') }}" class="text-blue-500 hover:text-blue-700">Kontak</a>
            </div>

            <div class="flex items-center">
                @auth
                    <span class="mr-4 text-blue-500">Halo, {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-600 hover:text-red-800">Logout</button>
                    </form>
                @else
                    <a href="{{ url('/login') }}" class="text-blue-500 hover:text-blue-700 mr-4">Login</a>
                    <a href="{{ url('/register') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- Isi Konten --}}
    <main class="pt-16">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-white shadow-inner mt-12">
        <div class="max-w-7xl mx-auto px-6 py-8 text-gray-600 text-sm flex flex-col md:flex-row justify-between items-center">
            <p>&copy; {{ date('Y') }} DevAcademy. All rights reserved.</p>
            <div class="flex space-x-4 mt-4 md:mt-0">
                <a href="#" class="hover:text-blue-500">Kebijakan Privasi</a>
                <a href="#" class="hover:text-blue-500">Syarat & Ketentuan</a>
                <a href="#" class="hover:text-blue-500">Kontak</a>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
