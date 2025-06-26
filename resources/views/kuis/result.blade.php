@extends('layouts.app')

@section('title', 'Hasil Kuis')

@section('content')
<div class="max-w-xl mx-auto py-10 text-center">
    <h1 class="text-3xl font-bold mb-6">Hasil Kuis</h1>

    <div class="bg-white rounded shadow p-6">
        <p class="text-lg mb-4">Skor kamu:</p>
        <div class="text-4xl font-bold text-indigo-700 mb-4">{{ $score }} / 100</div>

        @if ($score >= 80)
            <p class="text-green-600 font-semibold mb-4">🎉 Selamat! Kamu lulus kuis ini.</p>
            @if (isset($quiz))
                <a href="{{ route('certificate.download', $quiz->id) }}" 
                   class="inline-block bg-indigo-600 text-white px-5 py-2 rounded hover:bg-indigo-700 transition">
                    Unduh Sertifikat
                </a>
            @endif
        @else
            <p class="text-red-600 font-semibold">❌ Belum lulus. Skor minimal untuk lulus adalah 80.</p>
        @endif
    </div>
</div>
@endsection
