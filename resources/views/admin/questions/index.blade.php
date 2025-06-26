@extends('layouts.admin')

@section('title', 'Kelola Pertanyaan')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Kelola Pertanyaan - {{ $quiz->title }}</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.questions.create', $quiz->id) }}" class="bg-indigo-600 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah Pertanyaan</a>

    @if($questions->isEmpty())
        <p class="text-gray-500">Belum ada pertanyaan.</p>
    @else
        <table class="w-full bg-white rounded shadow overflow-hidden mt-4">
            <thead>
                <tr class="bg-gray-100 text-left text-sm">
                    <th class="px-4 py-2">Pertanyaan</th>
                    <th class="px-4 py-2">Jawaban Benar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $question)
                    <tr class="border-t text-sm">
                        <td class="px-4 py-2">{{ $question->question }}</td>
                        <td class="px-4 py-2">{{ $question->answer }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
