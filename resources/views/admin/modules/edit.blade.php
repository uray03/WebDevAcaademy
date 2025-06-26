@extends('layouts.admin')

@section('title', 'Edit Modul')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit Modul</h1>

    <form method="POST" action="{{ route('admin.modules.update', $module->id) }}" class="bg-white p-6 rounded shadow max-w-xl">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block font-medium mb-1">Judul Modul</label>
            <input type="text" name="title" id="title" value="{{ old('title', $module->title) }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="content" class="block font-medium mb-1">Konten</label>
            <textarea name="content" id="content" rows="5" class="w-full border rounded px-3 py-2" required>{{ old('content', $module->content) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="image" class="block font-medium mb-1">Gambar (URL opsional)</label>
            <input type="text" name="image" id="image" value="{{ old('image', $module->image) }}" class="w-full border rounded px-3 py-2">
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Simpan Perubahan</button>
    </form>
@endsection
