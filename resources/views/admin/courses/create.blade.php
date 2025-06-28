@extends('layouts.admin')

@section('title', 'Tambah Kursus')

@section('content')
<h1 class="text-2xl font-bold mb-6">Tambah Kursus Baru</h1>

<form method="POST" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data" class="bg-white p-6 rounded shadow max-w-xl">
    @csrf

    <div class="mb-4">
        <label for="title" class="block font-medium mb-1">Judul Kursus</label>
        <input type="text" name="title" id="title" class="w-full border rounded px-3 py-2" required>
    </div>

    <div class="mb-4">
        <label for="description" class="block font-medium mb-1">Deskripsi</label>
        <textarea name="description" id="description" class="w-full border rounded px-3 py-2" rows="5" required></textarea>
    </div>

    <div class="mb-4">
        <label for="category_id" class="block font-medium mb-1">Kategori</label>
        <select name="category_id" id="category_id" class="w-full border rounded px-3 py-2" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="difficulty_level_id" class="block font-medium mb-1">Tingkat Kesulitan</label>
        <select name="difficulty_level_id" id="difficulty_level_id" class="w-full border rounded px-3 py-2" required>
            <option value="">-- Pilih Tingkat --</option>
            @foreach ($difficultyLevels as $level)
                <option value="{{ $level->id }}">{{ $level->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="image" class="block font-medium mb-1">Gambar Utama Kursus</label>
        <input type="file" name="image" id="image" class="w-full border rounded px-3 py-2" required>
    </div>

    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Simpan</button>
</form>

@endsection
