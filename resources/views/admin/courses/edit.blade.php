@extends('layouts.admin')

@section('title', 'Edit Kursus')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit Kursus</h1>

    <form method="POST" action="{{ route('admin.courses.update', $course->id) }}" class="bg-white p-6 rounded shadow max-w-xl">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block font-medium mb-1">Judul Kursus</label>
            <input type="text" name="title" id="title" value="{{ old('title', $course->title) }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium mb-1">Deskripsi</label>
            <textarea name="description" id="description" rows="5" class="w-full border rounded px-3 py-2" required>{{ old('description', $course->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="category_id" class="block font-medium mb-1">Kategori</label>
            <select name="category_id" id="category_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $course->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="difficulty_level_id" class="block font-medium mb-1">Tingkat Kesulitan</label>
            <select name="difficulty_level_id" id="difficulty_level_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Pilih Tingkat Kesulitan --</option>
                @foreach ($difficultyLevels as $level)
                    <option value="{{ $level->id }}" {{ $course->difficulty_level_id == $level->id ? 'selected' : '' }}>
                        {{ $level->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Simpan Perubahan</button>
    </form>
@endsection
