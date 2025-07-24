@extends('layouts.app')

@section('title', 'Komunitas DevAcademy')

@push('styles')
    {{-- Font Poppins untuk tampilan yang lebih modern --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .font-poppins { font-family: 'Poppins', sans-serif; }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in-up {
            animation: fadeInUp 0.5s ease-out forwards;
            opacity: 0;
        }
    </style>
@endpush

@section('content')
<div class="bg-slate-100 font-poppins py-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <header class="text-center mb-12 fade-in-up">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 to-teal-500">
                    Forum Komunitas DevAcademy
                </span>
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">Tempat untuk bertanya, berbagi, dan belajar bersama para developer lainnya.</p>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

            <!-- ============================================= -->
            <!--        KONTEN UTAMA (KIRI)                    -->
            <!-- ============================================= -->
            <main class="lg:col-span-3 space-y-6">
                
                <!-- Form Tulis Pertanyaan -->
                <div class="bg-white p-6 rounded-2xl shadow-lg fade-in-up" style="animation-delay: 100ms;">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Punya Pertanyaan?</h2>
                    <form action="{{ route('community.post') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <textarea name="content" rows="4"
                                  class="w-full border-gray-200 rounded-lg p-3 resize-none focus:outline-none focus:ring-2 focus:ring-indigo-400"
                                  placeholder="Tuliskan pertanyaanmu di sini..." required></textarea>
                        <div class="flex justify-between items-center">
                            <input type="file" name="image" class="text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            <button type="submit" class="bg-indigo-600 text-white font-semibold px-6 py-2 rounded-lg hover:bg-indigo-700 transition-all duration-300 transform hover:scale-105">
                                Kirim
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Daftar Postingan -->
                @forelse ($posts as $index => $post)
                <div class="bg-white rounded-2xl shadow-lg p-6 space-y-4 fade-in-up" style="animation-delay: {{ ($index + 2) * 100 }}ms;" x-data="{ showComments: false }">
                    <!-- Header Post -->
                    <div class="flex justify-between items-start">
                        <div class="flex items-center">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name) }}&background=random" alt="Avatar" class="w-12 h-12 rounded-full mr-4">
                            <div>
                                <div class="font-bold text-gray-800">{{ $post->user->name }}</div>
                                <div class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</div>
                            </div>
                        </div>

                        @if (auth()->id() == $post->user_id)
                        <div class="relative" x-data="{ open: false }">
                            <!-- Tombol menu -->
                            <button @click="open = !open"
                                    class="text-gray-500 hover:text-gray-800 text-lg p-2 rounded-full hover:bg-gray-100 transition">
                                &#x22EE;
                            </button>
                    
                            <!-- Dropdown menu -->
                            <div x-show="open" @click.away="open = false" x-transition
                                 class="absolute right-0 mt-2 w-36 bg-white border rounded-md shadow-lg z-50">
                                <!-- Link Edit -->
                                <a href="{{ route('community.post.edit', $post->id) }}"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                                    ✏️ Edit
                                </a>
                    
                                <!-- Form Hapus -->
                                <form action="{{ route('community.post.destroy', $post->id) }}" method="POST"
                                      @click="open = false"
                                      onsubmit="return confirm('Yakin ingin menghapus postingan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition">
                                        🗑️ Hapus
                                    </button>
                                </form>

                            </div>
                        </div>
                    @endif

                    </div>

                    <!-- Isi Post -->
                    <p class="text-gray-800 leading-relaxed">{{ $post->content }}</p>
                    @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="rounded-lg max-w-full mt-4 border">
                    @endif

                    <!-- Tombol Aksi (Like & Comment) -->
                    <div class="flex items-center space-x-6 border-t pt-4">
                        <button class="flex items-center space-x-2 text-gray-600 hover:text-red-500 transition-colors">
                            <i class="far fa-heart"></i>
                            <span>Suka (12)</span>
                        </button>
                        <button @click="showComments = !showComments" class="flex items-center space-x-2 text-gray-600 hover:text-indigo-500 transition-colors">
                            <i class="far fa-comment"></i>
                            <span>Komentar ({{ $post->replies->count() }})</span>
                        </button>
                    </div>

                    <!-- Bagian Komentar (Bisa dibuka-tutup) -->
                    <div x-show="showComments" x-collapse class="border-t pt-4 space-y-4">
                        @forelse ($post->replies as $reply)
                        <div class="flex items-start space-x-3">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($reply->user->name) }}&background=random" alt="Avatar" class="w-9 h-9 rounded-full">
                            <div class="flex-1 bg-gray-100 p-3 rounded-lg">
                                <p><strong class="font-semibold">{{ $reply->user->name }}</strong>: {{ $reply->content }}</p>
                            </div>
                        </div>
                        @empty
                        <p class="text-sm text-gray-500">Jadilah yang pertama berkomentar.</p>
                        @endforelse
                        
                        <!-- Form Komentar -->
                        <form action="{{ route('community.reply', $post->id) }}" method="POST" ... class="flex items-center space-x-3 pt-4">
                            @csrf
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'G') }}&background=random" alt="Avatar" class="w-9 h-9 rounded-full">
                            <input name="content" class="w-full border-gray-200 rounded-full p-2 px-4 focus:outline-none focus:ring-2 focus:ring-indigo-400" placeholder="Tulis komentar..." required>
                            <button type="submit" class="bg-indigo-600 text-white rounded-full h-9 w-9 flex-shrink-0 flex items-center justify-center hover:bg-indigo-700"><i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center text-gray-500">
                    Belum ada pertanyaan di komunitas. Jadilah yang pertama!
                </div>
                @endforelse

            </main>

            <!-- ============================================= -->
            <!--        SIDEBAR (KANAN)                        -->
            <!-- ============================================= -->
            <aside class="lg:col-span-1 space-y-6">
                <!-- Search -->
                <div class="bg-white p-6 rounded-2xl shadow-lg fade-in-up" style="animation-delay: 200ms;">
                    <form method="GET" action="{{-- route('community.index') --}}">
                        <div class="relative">
                            <input type="text" name="search" value="{{ request('search') }}" class="w-full border-gray-200 rounded-full py-2 pl-10 pr-4 focus:outline-none focus:ring-2 focus:ring-indigo-400" placeholder="Cari...">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Kategori/Topik Populer -->
                <div class="bg-white p-6 rounded-2xl shadow-lg fade-in-up" style="animation-delay: 300ms;">
                    <h3 class="font-bold text-lg mb-4">Topik Populer</h3>
                    <div class="flex flex-wrap gap-2">
                        <a href="#" class="bg-indigo-100 text-indigo-800 text-sm font-medium px-3 py-1 rounded-full hover:bg-indigo-200">#laravel</a>
                        <a href="#" class="bg-teal-100 text-teal-800 text-sm font-medium px-3 py-1 rounded-full hover:bg-teal-200">#javascript</a>
                        <a href="#" class="bg-sky-100 text-sky-800 text-sm font-medium px-3 py-1 rounded-full hover:bg-sky-200">#css</a>
                        <a href="#" class="bg-rose-100 text-rose-800 text-sm font-medium px-3 py-1 rounded-full hover:bg-rose-200">#error</a>
                    </div>
                </div>
            </aside>

        </div>
    </div>
</div>
@endsection
