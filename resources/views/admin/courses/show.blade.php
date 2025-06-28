@extends('layouts.admin')

@section('title', 'Detail Kursus')

@section('content')
    <h1 class="text-2xl font-bold mb-4">{{ $course->title }}</h1>
    <p class="mb-6 text-gray-700">{{ $course->description }}</p>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol Hapus Kursus --}}
    <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" class="mb-6" onsubmit="return confirm('Yakin hapus seluruh kursus ini beserta semua modul & kuis?')">
        @csrf
        @method('DELETE')
        <button class="bg-red-600 text-white px-4 py-2 rounded">Hapus Kursus Ini</button>
    </form>

    {{-- Modul --}}
    <div class="mb-8">
        <div class="flex items-center justify-between mb-2">
            <h2 class="text-xl font-semibold">Modul</h2>
            <a href="{{ route('admin.modules.create', $course->id) }}" class="bg-indigo-600 text-white px-3 py-1 rounded">+ Tambah Modul</a>
        </div>

        @forelse ($course->modules as $module)
            <div class="border rounded p-3 flex justify-between items-center mb-2">
                <div>
                    <h3 class="font-semibold">{{ $module->title }}</h3>
                    <p class="text-sm text-gray-600">{{ Str::limit($module->content, 100) }}</p>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('admin.modules.edit', $module->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                    <form action="{{ route('admin.modules.destroy', $module->id) }}" method="POST" onsubmit="return confirm('Hapus modul ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-3 py-1 rounded">Hapus</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-600">Belum ada modul untuk kursus ini.</p>
        @endforelse
    </div>


    {{-- Kuis --}}
    <div>
        <div class="flex items-center justify-between mb-2">
            <h2 class="text-xl font-semibold">Kuis</h2>
            <a href="{{ route('admin.quizzes.create', $course->id) }}" class="bg-indigo-600 text-white px-3 py-1 rounded">+ Tambah Kuis</a>
        </div>

        @forelse ($course->quizzes as $quiz)
            <div class="border rounded p-3 flex justify-between items-center mb-2">
                <div>
                    <h3 class="font-semibold">{{ $quiz->title }}</h3>
                    <p class="text-sm text-gray-600">{{ $quiz->description }}</p>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('admin.questions.index', $quiz->id) }}" class="bg-purple-600 text-white px-3 py-1 rounded">Kelola Pertanyaan</a>
                    <a href="{{ route('admin.quizzes.edit', $quiz->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                    <form action="{{ route('admin.quizzes.destroy', $quiz->id) }}" method="POST" onsubmit="return confirm('Hapus kuis ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-3 py-1 rounded">Hapus</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-600">Belum ada kuis untuk kursus ini.</p>
        @endforelse
    </div>

    {{-- Galeri Gambar --}}
    <div class="mt-10">
        <h2 class="text-xl font-semibold mb-4">Galeri Gambar</h2>

        <form action="{{ route('admin.courses.images.upload', $course->id) }}" method="POST" enctype="multipart/form-data" class="mb-4">
            @csrf
            <input type="file" name="image" required class="mb-2">
            <button type="submit" class="bg-indigo-600 text-white px-3 py-1 rounded">Upload</button>
        </form>

        @if ($course->images->count())
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach ($course->images as $image)
                    <div class="relative">
                        <img src="{{ asset('storage/' . $image->image_path) }}" class="w-full h-32 object-cover rounded">
                        <form action="{{ route('admin.courses.images.delete', $image->id) }}" method="POST" class="absolute top-1 right-1">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-2 rounded">X</button>
                        </form>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600">Belum ada gambar untuk kursus ini.</p>
        @endif
    </div>


@endsection
