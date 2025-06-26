@extends('layouts.admin')

@section('title', 'Tambah Pertanyaan')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Tambah Pertanyaan untuk Kuis: {{ $quiz->title }}</h1>

    <form method="POST" action="{{ route('admin.questions.store', $quiz->id) }}" class="bg-white p-6 rounded shadow max-w-xl">
        @csrf

        <div class="mb-4">
            <label class="block font-medium mb-1">Pertanyaan</label>
            <textarea name="question" class="w-full border rounded px-3 py-2" rows="3" required></textarea>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Pilihan A</label>
            <input type="text" name="option_a" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Pilihan B</label>
            <input type="text" name="option_b" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Pilihan C</label>
            <input type="text" name="option_c" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Pilihan D</label>
            <input type="text" name="option_d" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Jawaban Benar</label>
            <select name="answer" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Pilih Jawaban --</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
@endsection
