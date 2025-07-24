@extends('layouts.app')

@section('title', $category->name)

@section('content')
<div class="max-w-6xl mx-auto py-10 px-4">
    <h1 class="text-3xl font-bold mb-6">{{ $category->name }}</h1>

    <div class="grid md:grid-cols-3 gap-6">
        @forelse ($courses as $course)
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-lg font-semibold mb-2">{{ $course->title }}</h2>
                <p class="text-sm text-gray-500">{{ Str::limit($course->description, 100) }}</p>
            </div>
        @empty
            <p class="text-gray-500">Belum ada kursus dalam kategori ini.</p>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $courses->links() }}
    </div>
</div>
@endsection
