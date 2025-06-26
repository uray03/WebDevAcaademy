@extends('layouts.admin')

@section('title', 'Edit Kuis')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit Kuis untuk Kursus: {{ $quiz->course->title }}</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.quizzes.update', $quiz->id) }}" class="bg-white p-6 rounded shadow max-w-xl">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block font-medium mb-1">Judul Kuis</label>
            <input type="text" name="title" id="title" class="w-full border rounded px-3 py-2" value="{{ old('title', $quiz->title) }}" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium mb-1">Deskripsi Kuis</label>
            <textarea name="description" id="description" class="w-full border rounded px-3 py-2" rows="5" required>{{ old('description', $quiz->description) }}</textarea>
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Simpan Perubahan</button>
    </form>
@endsection
