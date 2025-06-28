@extends('layouts.app')

@section('title', $course->title)

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    .font-poppins { font-family: 'Poppins', sans-serif; }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .fade-in-up {
        animation: fadeInUp 0.6s ease-out forwards;
        opacity: 0;
    }
</style>
@endpush

@section('content')
<div class="bg-slate-50 font-poppins">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-x-12">

            <div class="lg:col-span-2 fade-in-up">
                <h1 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mb-2">{{ $course->title }}</h1>
                <p class="text-lg text-gray-600 mb-6">{{ $course->description }}</p>

                <h2 class="text-2xl font-bold mb-4 mt-8">Kurikulum Kursus</h2>
                <div class="space-y-3">
                    @forelse($course->modules as $module)
                        <a href="{{ route('modules.show', $module) }}" class="block border border-gray-200 rounded-lg p-5 bg-white hover:bg-indigo-50 hover:border-indigo-300 transition-all duration-300 transform hover:scale-[1.02]">
                            <div class="flex justify-between items-center">
                                <h3 class="font-bold text-lg text-gray-800">{{ $module->title }}</h3>
                                <i class="fas fa-chevron-right text-gray-400"></i>
                            </div>
                        </a>
                    @empty
                        <p class="text-gray-500">Modul untuk kursus ini belum tersedia.</p>
                    @endforelse
                </div>
            </div>

            @guest
            <aside class="lg:col-span-1 mt-8 lg:mt-0">
                <div class="sticky top-24 bg-white rounded-2xl shadow-xl border border-gray-200 fade-in-up p-6 space-y-6">
                    
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Tentang Kursus Ini</h3>

                    <ul class="space-y-4 text-gray-600">
                        <li class="flex items-center">
                            <i class="fas fa-layer-group w-5 mr-3 text-indigo-500"></i>
                            <span><strong>{{ $course->modules->count() }} Modul</strong></span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-chart-bar w-5 mr-3 text-indigo-500"></i>
                            <span>Level <strong>{{ $course->difficultyLevel->name ?? '-' }}</strong></span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-infinity w-5 mr-3 text-indigo-500"></i>
                            <span>Akses Selamanya</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-certificate w-5 mr-3 text-indigo-500"></i>
                            <span>Sertifikat Kelulusan</span>
                        </li>
                    </ul>

                    <div class="mt-8">
                        <a href="{{ route('login') }}" class="w-full block text-center bg-indigo-600 text-white font-bold py-3 rounded-lg hover:bg-indigo-700 transition-transform transform hover:scale-105 text-lg">
                            Login untuk Mengakses Kursus
                        </a>
                    </div>

                </div>
            </aside>
            @endguest


        </div>
    </div>
</div>
@endsection
