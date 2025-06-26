@extends('layouts.app')

@section('title', 'Edit Komentar')

@section('content')
<div class="max-w-xl mx-auto py-10 px-4">
    <h1 class="text-2xl font-bold mb-6">Edit Komentar</h1>

    <form action="{{ route('community.reply.update', $reply->id) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-medium mb-1">Isi Komentar</label>
            <textarea name="content" rows="4" class="w-full border p-3 rounded" required>{{ old('content', $reply->content) }}</textarea>
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Perbarui</button>
            <a href="{{ route('community.index') }}" class="text-gray-600 underline">Batal</a>
        </div>
    </form>
</div>
@endsection
