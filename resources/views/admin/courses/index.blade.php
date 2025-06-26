@extends('layouts.admin')

@section('title', 'Daftar Kursus')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Daftar Kursus</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-6">
        <a href="{{ route('admin.courses.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded">+ Tambah Kursus</a>
    </div>

    <table class="w-full bg-white rounded shadow overflow-hidden">
        <thead>
            <tr class="bg-gray-100 text-left text-sm">
                <th class="px-4 py-2">Judul</th>
                <th class="px-4 py-2">Deskripsi</th>
                <th class="px-4 py-2">Dibuat</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($courses as $course)
                <tr class="border-t text-sm">
                    <td class="px-4 py-2 font-semibold">
                        <a href="{{ route('admin.courses.show', $course->id) }}" class="text-blue-600 underline hover:font-bold">
                            {{ $course->title }}
                        </a>
                    </td>
                    <td class="px-4 py-2">{{ Str::limit($course->description, 80) }}</td>
                    <td class="px-4 py-2">{{ $course->created_at->format('d M Y') }}</td>
                    <td class="px-4 py-2 space-y-1 space-x-2">
                        <a href="{{ route('admin.modules.create', $course->id) }}" class="text-blue-500 underline">+ Modul</a>

                        @php
                            $quiz = $course->quizzes()->first();
                        @endphp

                        @if ($quiz)
                            <a href="{{ route('admin.questions.create', $quiz->id) }}" class="text-purple-600 underline">+ Pertanyaan</a>
                        @else
                            <a href="{{ route('admin.quizzes.create', $course->id) }}" class="text-green-600 underline">+ Kuis</a>
                        @endif

                        <a href="{{ route('admin.courses.edit', $course->id) }}" class="text-yellow-600 underline">Edit</a>

                        <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus kursus ini? Semua modul & kuis terkait akan ikut terhapus.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 underline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4 text-gray-500">Belum ada kursus.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
