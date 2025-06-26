@extends('layouts.app')

@section('title', $course->title)

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold mb-6">{{ $course->title }}</h1>

        <p class="mb-8 text-gray-600">{{ $course->description }}</p>

        <h2 class="text-xl font-semibold mb-4">Materi</h2>
        <ul class="list-disc pl-6 space-y-2 mb-8">
            @foreach ($course->modules as $module)
                <li>
                    <strong>{{ $module->title }}</strong>
                    <p class="text-sm text-gray-600">{{ $module->content }}</p>
                </li>
            @endforeach
        </ul>

        @if ($course->quizzes->count())
            <div class="mt-6">
                <h2 class="text-xl font-semibold mb-2">Kuis</h2>
                @foreach ($course->quizzes as $quiz)
                    <a href="{{ route('quizzes.show', $quiz->id) }}"
                       class="inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
                        Kerjakan Kuis
                    </a>
                @endforeach
            </div>
        @endif
    </div>
@endsection
