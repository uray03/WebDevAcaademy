@extends('layouts.admin')

@section('title', 'Tambah Kursus')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Tambah Kursus Baru</h1>

    <form method="POST" action="{{ route('admin.courses.store') }}" class="bg-white p-6 rounded shadow max-w-xl">
        @csrf

        <div class="mb-4">
            <label for="title" class="block font-medium mb-1">Judul Kursus</label>
            <input type="text" name="title" id="title" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium mb-1">Deskripsi</label>
            <textarea name="description" id="description" class="w-full border rounded px-3 py-2" rows="5" required></textarea>
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
@endsection
