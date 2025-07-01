@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<div class="max-w-5xl mx-auto py-12 px-4 text-center">
    <h1 class="text-3xl md:text-4xl font-bold mb-4">Tentang DevAcademy</h1>
    <p class="text-gray-600 mb-8">Platform edukasi teknologi yang dibangun oleh tim berdedikasi untuk masa depan yang lebih baik.</p>
</div>

<div class="max-w-6xl mx-auto py-12 px-4">
    <h2 class="text-2xl font-semibold text-center mb-10">Tim Kami</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 text-center">
        
        <!-- Anggota 1 -->
        <div x-data="{ open: false }" class="group">
            <div @click="open = true" class="cursor-pointer w-32 h-32 mx-auto mb-4 rounded-full overflow-hidden border-4 border-indigo-500 shadow-lg hover:scale-105 transition">
                <img src="{{ asset('images/tentang/uray.jpeg') }}" alt="Foto Anggota" class="w-full h-full object-cover">
            </div>
            <h3 class="font-semibold">Uray Fauzan Al Hafizh</h3>
            <p class="text-gray-500 mb-2">Fullstack Developer</p>

            <!-- Modal Keren -->
            <div 
                x-show="open" 
                x-transition 
                class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-70 z-50"
            >
                <div class="bg-white rounded-xl shadow-2xl p-8 max-w-sm w-full relative transform transition-all scale-95" @click.away="open = false">
                    <button @click="open = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">
                        ✕
                    </button>
                    <img src="{{ asset('images/tentang/uray.jpeg') }}" alt="Foto" class="w-24 h-24 mx-auto rounded-full border-4 border-indigo-500 mb-4">
                    <h3 class="text-xl font-bold mb-1">Uray Fauzan Al Hafizh</h3>
                    <p class="text-gray-500 mb-4">Fullstack Developer</p>
                    <p class="text-gray-600 mb-4">Hobi: Basket, Coding, Traveling</p>
                    <p class="text-gray-600 mb-4">"Teknologi adalah cara kita membangun masa depan."</p>
                </div>
            </div>
        </div>

        <!-- Anggota 2 -->
        <div x-data="{ open: false }" class="group">
            <div @click="open = true" class="cursor-pointer w-32 h-32 mx-auto mb-4 rounded-full overflow-hidden border-4 border-indigo-500 shadow-lg hover:scale-105 transition">
                <img src="{{ asset('images/tentang/ura.jpeg') }}" alt="Foto Anggota" class="w-full h-full object-cover">
            </div>
            <h3 class="font-semibold">_</h3>
            <p class="text-gray-500 mb-2">Frontend Developer</p>

            <!-- Modal Keren -->
            <div 
                x-show="open" 
                x-transition 
                class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-70 z-50"
            >
                <div class="bg-white rounded-xl shadow-2xl p-8 max-w-sm w-full relative transform transition-all scale-95" @click.away="open = false">
                    <button @click="open = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">
                        ✕
                    </button>
                    <img src="{{ asset('images/tentang/uray.jpeg') }}" alt="Foto" class="w-24 h-24 mx-auto rounded-full border-4 border-indigo-500 mb-4">
                    <h3 class="text-xl font-bold mb-1">Uray Fauzan Al Hafizh</h3>
                    <p class="text-gray-500 mb-4">Fullstack Developer</p>
                    <p class="text-gray-600 mb-4">Hobi: Basket, Coding, Traveling</p>
                    <p class="text-gray-600 mb-4">"Teknologi adalah cara kita membangun masa depan."</p>
                </div>
            </div>
        </div>
        
        <!-- Anggota 3 -->
        <div x-data="{ open: false }" class="group">
            <div @click="open = true" class="cursor-pointer w-32 h-32 mx-auto mb-4 rounded-full overflow-hidden border-4 border-indigo-500 shadow-lg hover:scale-105 transition">
                <img src="{{ asset('images/tentang/ura.jpeg') }}" alt="Foto Anggota" class="w-full h-full object-cover">
            </div>
            <h3 class="font-semibold">_</h3>
            <p class="text-gray-500 mb-2">Backend Developer</p>

            <!-- Modal Keren -->
            <div 
                x-show="open" 
                x-transition 
                class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-70 z-50"
            >
                <div class="bg-white rounded-xl shadow-2xl p-8 max-w-sm w-full relative transform transition-all scale-95" @click.away="open = false">
                    <button @click="open = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">
                        ✕
                    </button>
                    <img src="{{ asset('images/tentang/uray.jpeg') }}" alt="Foto" class="w-24 h-24 mx-auto rounded-full border-4 border-indigo-500 mb-4">
                    <h3 class="text-xl font-bold mb-1">Uray Fauzan Al Hafizh</h3>
                    <p class="text-gray-500 mb-4">Fullstack Developer</p>
                    <p class="text-gray-600 mb-4">Hobi: Futsal, Coding, Traveling</p>
                    <p class="text-gray-600 mb-4">"Teknologi adalah cara kita membangun masa depan."</p>
                </div>
            </div>
        </div>
        
        <!-- Anggota 4 -->
        <div x-data="{ open: false }" class="group">
            <div @click="open = true" class="cursor-pointer w-32 h-32 mx-auto mb-4 rounded-full overflow-hidden border-4 border-indigo-500 shadow-lg hover:scale-105 transition">
                <img src="{{ asset('images/tentang/ura.jpeg') }}" alt="Foto Anggota" class="w-full h-full object-cover">
            </div>
            <h3 class="font-semibold">_</h3>
            <p class="text-gray-500 mb-2">UI/UX Design</p>

            <!-- Modal Keren -->
            <div 
                x-show="open" 
                x-transition 
                class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-70 z-50"
            >
                <div class="bg-white rounded-xl shadow-2xl p-8 max-w-sm w-full relative transform transition-all scale-95" @click.away="open = false">
                    <button @click="open = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">
                        ✕
                    </button>
                    <img src="{{ asset('images/tentang/uray.jpeg') }}" alt="Foto" class="w-24 h-24 mx-auto rounded-full border-4 border-indigo-500 mb-4">
                    <h3 class="text-xl font-bold mb-1">Uray Fauzan Al Hafizh</h3>
                    <p class="text-gray-500 mb-4">Fullstack Developer</p>
                    <p class="text-gray-600 mb-4">Hobi: Futsal, Coding, Traveling</p>
                    <p class="text-gray-600 mb-4">"Teknologi adalah cara kita membangun masa depan."</p>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Tambahkan Alpine.js di layout jika belum -->
<script src="https://unpkg.com/alpinejs" defer></script>
@endsection
