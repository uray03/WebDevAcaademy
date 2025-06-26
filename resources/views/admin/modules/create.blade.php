@extends('layouts.admin')

@section('title', 'Tambah Modul')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Tambah Modul ke: {{ $course->title }}</h1>

    <form action="{{ route('admin.modules.store', $course->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block mb-1">Judul Modul</label>
            <input type="text" name="title" required class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Konten Modul</label>
            <textarea name="content" rows="5" required class="w-full border px-3 py-2 rounded"></textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Gambar Modul (Opsional)</label>
            <input type="file" name="image" class="border">
        </div>

        <button class="bg-indigo-600 text-white px-4 py-2 rounded">Simpan Modul</button>
    </form>

@endsection
