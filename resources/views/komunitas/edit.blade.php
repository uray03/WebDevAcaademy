@extends('layouts.app')

@section('title', 'Edit Pertanyaan')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-4">
    <h1 class="text-2xl font-bold mb-6">Edit Pertanyaan</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('community.post.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="content" class="block font-medium mb-1">Isi Pertanyaan</label>
            <textarea name="content" id="content" rows="5" class="w-full border p-3 rounded" required>{{ old('content', $post->content) }}</textarea>
        </div>

        {{-- Tampilkan gambar jika ada --}}
        @if ($post->image)
            <div class="mb-4">
                <p class="mb-2">Gambar Saat Ini:</p>
                <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar Saat Ini" class="max-w-xs mb-2">
            </div>
        @endif

        <div class="mb-4">
            <label for="image" class="block font-medium mb-1">Ganti Gambar (Opsional)</label>
            <input type="file" name="image">
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Simpan Perubahan</button>
        <a href="{{ route('community.index') }}" class="ml-3 text-gray-600 underline">Batal</a>
    </form>
</div>
@endsection
