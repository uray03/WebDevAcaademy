@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-20 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Login Admin</h2>
    @if($errors->any())
    <div class="bg-red-100 text-red-700 px-4 py-2 mb-4 rounded">
        {{ $errors->first() }}
    </div>
@endif

    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf

        <div class="mb-4">
            <label for="username" class="block">Username</label>
            <input type="text" name="username" id="username" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block">Password</label>
            <input type="password" name="password" id="password" class="w-full border rounded px-3 py-2" required>
        </div>

        <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded">Login</button>
    </form>
</div>
@endsection
