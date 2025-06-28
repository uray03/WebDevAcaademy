@extends('layouts.app')

@section('title', 'Daftar Kursus')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    .font-poppins { font-family: 'Poppins', sans-serif; }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .course-card {
        animation: fadeInUp 0.5s ease-out forwards;
        opacity: 0;
    }
</style>

<div class="bg-slate-50 font-poppins">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
        
        <header class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 to-teal-500">
                    Jelajahi Dunia Pengetahuan
                </span>
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">Temukan kursus yang tepat untuk meningkatkan skill Anda ke level selanjutnya.</p>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            
        <aside class="lg:col-span-1 bg-white p-6 rounded-2xl shadow-lg h-fit course-card" style="animation-delay: 0.1s;">
    <h3 class="text-xl font-bold border-b border-gray-200 pb-4 mb-6">Filter Kursus</h3>

    <form method="GET" action="{{ route('courses.index') }}" class="space-y-6">
        
        <div>
            <h4 class="font-semibold mb-3 text-gray-800">Kategori</h4>
            <select name="category" class="w-full border rounded px-3 py-2">
                <option value="">-- Semua Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <h4 class="font-semibold mb-3 text-gray-800">Tingkat Kesulitan</h4>
            <select name="difficulty" class="w-full border rounded px-3 py-2">
                <option value="">-- Semua Tingkat --</option>
                @foreach ($difficultyLevels as $level)
                    <option value="{{ $level->id }}" {{ request('difficulty') == $level->id ? 'selected' : '' }}>
                        {{ $level->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col gap-2">
            <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-2 rounded hover:bg-indigo-700 transition">Terapkan Filter</button>
            
            <a href="{{ route('courses.index') }}" class="w-full text-center bg-gray-200 text-gray-800 font-bold py-2 rounded hover:bg-gray-300 transition">
                Reset Filter
            </a>
        </div>

    </form>
</aside>


            <main class="lg:col-span-3">
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                    @forelse ($courses as $index => $course)
                        <div class="course-card bg-white rounded-2xl shadow-lg overflow-hidden group transform hover:-translate-y-2 transition-all duration-300" 
                             style="animation-delay: {{ ($index + 1) * 150 }}ms">
                            <a href="{{ route('courses.show', $course) }}" class="block">
                                <div class="relative">
                                    @php
                                        $image = $course->images->first()->image_path ?? null;
                                    @endphp
                                    <img src="{{ $image ? asset('storage/' . $image) : 'https://placehold.co/600x400/3498db/FFFFFF?text=Kursus' }}" 
                                         alt="{{ $course->title }}" class="w-full h-48 object-cover">
                                    <div class="absolute top-3 right-3 bg-indigo-500 text-white text-xs font-bold px-3 py-1 rounded-full">
                                        {{ $course->category->name ?? 'Kategori' }}
                                    </div>
                                </div>
                                <div class="p-5">
                                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-indigo-600 transition-colors truncate">{{ $course->title }}</h3>
                                    <p class="text-sm text-gray-500 mt-1 mb-3">Tingkat: {{ $course->difficultyLevel->name ?? '-' }}</p>
                                    
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center text-amber-500">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <span class="text-xs text-gray-600 ml-2">(4.5)</span>
                                        </div>
                                        <div class="text-sm font-medium text-gray-800">
                                            Kategori: {{ $course->category->name ?? '-' }}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="md:col-span-2 xl:col-span-3 text-center py-12">
                            <p class="text-gray-500">Belum ada kursus yang tersedia saat ini.</p>
                        </div>
                    @endforelse
                </div>

                <div class="mt-12">
                    @if($courses instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        {{ $courses->links() }}
                    @endif
                </div>
            </main>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush
