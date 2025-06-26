@extends('layouts.app')

@section('title', 'Komunitas')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-4">
    <h1 class="text-3xl font-bold mb-6">Forum Komunitas</h1>

    {{-- Flash Success --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form pencarian --}}
    <div class="mb-6">
        <form method="GET" action="{{ route('community.index') }}" class="flex items-center gap-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari pertanyaan..."
                class="w-full md:w-1/2 border px-4 py-2 rounded">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Cari</button>
        </form>
    </div>

    {{-- Form Tulis Pertanyaan --}}
    <div class="bg-white p-6 rounded shadow mb-8">
        <h2 class="text-xl font-semibold mb-4">Tulis Pertanyaan</h2>
        <form action="{{ route('community.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <textarea name="content" rows="4" class="w-full border p-3 rounded mb-4" placeholder="Apa yang ingin kamu tanyakan?" required></textarea>
            <input type="file" name="image" class="mb-4">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Kirim</button>
        </form>
    </div>

    {{-- List Postingan --}}
    @forelse ($posts as $post)
        <div class="bg-white p-6 rounded shadow mb-6">
            <div class="flex items-center justify-between mb-2">
                <p class="text-sm text-gray-600">Oleh: <strong>{{ $post->user->name }}</strong></p>
                <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
            </div>

            <p class="mb-3 text-gray-800">{{ $post->content }}</p>

            {{-- Gambar jika ada --}}
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar Postingan" class="rounded-lg w-full max-w-md my-3">
            @endif

            {{-- Tombol Edit & Hapus untuk pemilik postingan --}}
            @if (auth()->id() === $post->user_id)
                <div class="flex gap-2 mb-3">
                    <a href="{{ route('community.post.edit', $post->id) }}" class="text-blue-500 underline">Edit</a>
                    <form action="{{ route('community.post.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Hapus postingan ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500 underline">Hapus</button>
                    </form>
                </div>
            @endif

            {{-- Komentar --}}
            <div class="ml-4 border-l-4 border-gray-200 pl-4 mt-4">
                <h4 class="text-sm font-semibold mb-2">Komentar:</h4>
                @forelse ($post->replies as $reply)
                    <div class="mb-3">
                        <p class="text-sm text-gray-700"><strong>{{ $reply->user->name }}</strong>: {{ $reply->content }}</p>
                        
                        {{-- Gambar jika ada --}}
                        @if ($reply->image)
                            <img src="{{ asset('storage/' . $reply->image) }}" class="rounded-lg my-2 max-w-xs">
                        @endif

                        {{-- Tombol Edit & Hapus untuk pemilik komentar --}}
                        @if (auth()->id() === $reply->user_id)
                            <div class="flex gap-2 mt-1">
                                <a href="{{ route('community.reply.edit', $reply->id) }}" class="text-blue-500 text-sm underline">Edit</a>
                                <form action="{{ route('community.reply.destroy', $reply->id) }}" method="POST" onsubmit="return confirm('Hapus komentar ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 text-sm underline">Hapus</button>
                                </form>
                            </div>
                        @endif
                    </div>
                @empty
                    <p class="text-gray-500 text-sm">Belum ada komentar.</p>
                @endforelse
            </div>


            {{-- Form Komentar --}}
            <form action="{{ route('community.reply', $post->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
                @csrf
                <textarea name="content" rows="2" class="w-full border p-2 rounded mb-2" placeholder="Tulis komentar..." required></textarea>
                <input type="file" name="image" class="mb-2">
                <button class="bg-indigo-600 text-white px-4 py-2 rounded">Kirim Komentar</button>
            </form>
        </div>
    @empty
        <p class="text-center text-gray-500">Belum ada pertanyaan di komunitas.</p>
    @endforelse
</div>
@endsection
