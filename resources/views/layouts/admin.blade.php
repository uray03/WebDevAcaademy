<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title', 'DevAcademy')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    {{-- Navbar Admin --}}
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex space-x-6 items-center">
                <a href="{{ url('/admin/courses') }}" class="text-xl font-bold text-indigo-600">Admin DevAcademy</a>
                <a href="{{ route('admin.courses.index') }}" class="text-gray-700 hover:text-indigo-600">Kelola Kursus</a>
                <a href="{{ route('admin.courses.create') }}" class="text-gray-700 hover:text-indigo-600">Tambah Kursus</a>
            </div>

            <div class="flex items-center space-x-4">
                <span>Halo, {{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="text-red-600 hover:underline">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    {{-- Konten --}}
    <main class="max-w-7xl mx-auto py-12 px-6">
        @yield('content')
    </main>

</body>
</html>
