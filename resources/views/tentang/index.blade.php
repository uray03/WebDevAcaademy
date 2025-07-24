@extends('layouts.app')

@section('title', 'Tentang')

@section('content')
<div class="max-w-6xl mx-auto py-12 px-4">
    
    {{-- Hero Section dengan Background --}}
    <div class="relative bg-cover bg-center h-64 flex items-center justify-center rounded-lg shadow-lg" style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.1)), url('https://images.unsplash.com/photo-1529070538774-1843cb3265df?auto=format&fit=crop&w=1400&q=80');">
        <h1 class="text-3xl md:text-4xl font-bold text-white text-center">Tentang DevAcademy</h1>
    </div>

    {{-- Misi --}}
    <div class="text-center mt-12">
        <h2 class="text-2xl md:text-3xl font-bold mb-4">Misi Kami</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">
            DevAcademy hadir untuk memberikan akses pendidikan teknologi yang berkualitas bagi semua orang. Kami percaya bahwa pendidikan adalah kunci untuk menciptakan masa depan yang lebih baik dan memberdayakan individu dalam dunia digital.
        </p>
    </div>

    {{-- Nilai-nilai --}}
    <div class="mt-16">
        <h2 class="text-2xl md:text-3xl font-bold text-center mb-10">Nilai Kami</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">

            {{-- Inovasi --}}
            <div class="bg-white border rounded-lg p-6 text-center shadow hover:scale-105 transition">
                <div class="text-blue-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l9 4-9 4-9-4 9-4zm0 6l9 4-9 4-9-4 9-4zm0 6l9 4-9 4-9-4 9-4z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-lg mb-2">Inovasi</h3>
                <p class="text-gray-600 text-sm">Kami selalu mencari cara baru dan kreatif untuk meningkatkan layanan pendidikan.</p>
            </div>

            {{-- Komunitas --}}
            <div class="bg-white border rounded-lg p-6 text-center shadow hover:scale-105 transition">
                <div class="text-blue-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2a10 10 0 0110 10v2a10 10 0 11-20 0v-2a10 10 0 0110-10z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-lg mb-2">Komunitas</h3>
                <p class="text-gray-600 text-sm">Kami percaya kekuatan komunitas dapat mempercepat proses belajar dan tumbuh bersama.</p>
            </div>

            {{-- Excellence --}}
            <div class="bg-white border rounded-lg p-6 text-center shadow hover:scale-105 transition">
                <div class="text-blue-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l7 20H5L12 2z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-lg mb-2">Excellence</h3>
                <p class="text-gray-600 text-sm">Kami berkomitmen untuk memberikan pengalaman belajar yang terbaik dan berkualitas.</p>
            </div>

            {{-- Pertumbuhan --}}
            <div class="bg-white border rounded-lg p-6 text-center shadow hover:scale-105 transition">
                <div class="text-blue-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 2.28 1.06 4.31 2.72 5.66C7.27 16.22 6 18.44 6 21h2c0-2.28 1.42-4.25 3.43-5.1 2.01.85 3.43 2.82 3.43 5.1h2c0-2.56-1.27-4.78-3.72-6.34C17.94 13.31 19 11.28 19 9c0-3.87-3.13-7-7-7z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-lg mb-2">Pertumbuhan</h3>
                <p class="text-gray-600 text-sm">Kami mendorong pembelajaran berkelanjutan bagi siswa dan tim kami.</p>
            </div>

        </div>
    </div>

    {{-- Tim Kami --}}
    <div class="mt-16">
        <h2 class="text-2xl md:text-3xl font-bold text-center mb-10">Tim Kami</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 text-center">
            
            {{-- Loop Anggota --}}
            @foreach ($team as $member)
            <div x-data="{ open: false }" class="group">
                <div @click="open = true" class="cursor-pointer w-32 h-32 mx-auto mb-4 rounded-full overflow-hidden border-4 border-blue-500 shadow-lg hover:scale-105 transition">
                    <img src="{{ asset('images/tentang/' . $member['image']) }}" alt="Foto Anggota" class="w-full h-full object-cover">
                </div>
                <h3 class="font-semibold text-blue-700">{{ $member['name'] }}</h3>
                <p class="text-gray-500 mb-2">{{ $member['role'] }}</p>

                {{-- Modal --}}
                <div x-show="open" x-transition class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-70 z-50">
                    <div class="bg-white rounded-xl shadow-2xl p-8 max-w-sm w-full relative transform transition-all scale-95" @click.away="open = false">
                        <button @click="open = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">✕</button>
                        <img src="{{ asset('images/tentang/' . $member['image']) }}" alt="Foto" class="w-24 h-24 mx-auto rounded-full border-4 border-blue-500 mb-4">
                        <h3 class="text-xl font-bold mb-1 text-blue-700">{{ $member['name'] }}</h3>
                        <p class="text-gray-500 mb-4">{{ $member['role'] }}</p>
                        <p class="text-gray-600 mb-4">Hobi: {{ $member['hobbies'] }}</p>
                        <p class="text-gray-600 italic">"{{ $member['quote'] }}"</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>


</div>

<script src="https://unpkg.com/alpinejs" defer></script>
@endsection
