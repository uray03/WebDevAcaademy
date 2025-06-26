@extends('layouts.app')

@section('title', 'Daftar Kursus')

@section('content')
    <div class="max-w-5xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold mb-8">Daftar Kursus</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($courses as $course)
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h2 class="text-xl font-semibold mb-2">
                        <a href="{{ route('courses.show', $course->id) }}" class="text-indigo-600 hover:underline">
                            {{ $course->title }}
                        </a>
                    </h2>
                    <p class="text-gray-600 text-sm mb-4">
                        {{ Str::limit($course->description, 100) }}
                    </p>

                </div>
            @endforeach
        </div>
    </div>
@endsection
