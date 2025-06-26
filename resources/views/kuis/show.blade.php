@extends('layouts.app')

@section('title', 'Kuis: ' . $quiz->title)

@section('content')
<div class="max-w-3xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Kuis: {{ $quiz->title }}</h1>

    <form action="{{ route('quizzes.submit', $quiz->id) }}" method="POST">
        @csrf
        @foreach ($quiz->questions as $index => $question)
            <div class="mb-6">
                <p class="font-semibold">{{ $index + 1 }}. {{ $question->question }}</p>
                <div class="mt-2 space-y-1">
                    <label><input type="radio" name="answers[{{ $question->id }}]" value="A" required> A. {{ $question->option_a }}</label><br>
                    <label><input type="radio" name="answers[{{ $question->id }}]" value="B"> B. {{ $question->option_b }}</label><br>
                    <label><input type="radio" name="answers[{{ $question->id }}]" value="C"> C. {{ $question->option_c }}</label><br>
                    <label><input type="radio" name="answers[{{ $question->id }}]" value="D"> D. {{ $question->option_d }}</label>
                </div>
            </div>
        @endforeach

        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded">Kirim Jawaban</button>
    </form>
</div>
@endsection
