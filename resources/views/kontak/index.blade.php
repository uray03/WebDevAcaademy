@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('content')
<div class="relative flex size-full min-h-screen flex-col bg-white" style='font-family: Inter, "Noto Sans", sans-serif;'>
    <div class="px-6 md:px-40 flex flex-1 justify-center py-5">
        <div class="flex flex-col max-w-[960px] flex-1">
            <div class="flex flex-wrap justify-between gap-3 p-4">
                <div class="flex min-w-72 flex-col gap-3">
                    <h1 class="text-[#121417] text-[32px] font-bold leading-tight">Contact Us</h1>
                    <p class="text-[#677583] text-sm">We're here to help! Reach out to us with any questions or feedback.</p>
                </div>
            </div>

            <form action="{{ route('kontak.send') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block font-medium">Nama</label>
                <input type="text" name="name" class="w-full border rounded px-3 py-2" required value="{{ old('name') }}">
                @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block font-medium">Email</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" required value="{{ old('email') }}">
                @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block font-medium">Subjek</label>
                <input type="text" name="subject" class="w-full border rounded px-3 py-2" required value="{{ old('subject') }}">
                @error('subject') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block font-medium">Pesan</label>
                <textarea name="message" rows="4" class="w-full border rounded px-3 py-2" required>{{ old('message') }}</textarea>
                @error('message') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Kirim Pesan</button>
        </form>

            <h2 class="text-[#121417] text-[22px] font-bold px-4 mt-10 mb-3">Contact Information</h2>
            <div class="px-4 space-y-3">
                <div class="flex justify-between border-t border-[#dde0e4] py-3">
                    <p class="text-[#677583] text-sm">Email</p>
                    <p class="text-[#121417] text-sm">support@dev-academy.my.id</p>
                </div>
                <div class="flex justify-between border-t border-[#dde0e4] py-3">
                    <p class="text-[#677583] text-sm">Phone</p>
                    <p class="text-[#121417] text-sm">+62 851 6138 1974</p>
                </div>
                <div class="flex justify-between border-t border-[#dde0e4] py-3">
                    <p class="text-[#677583] text-sm">Address</p>
                    <p class="text-[#121417] text-sm">Jl. Inhoftank No. 123, Bandung</p>
                </div>
            </div>

            <!-- <div class="px-4 py-6">
                <div class="w-full aspect-video bg-cover bg-center rounded-xl" style="background-image: url('https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=1400&q=80');"></div>
            </div> -->
        </div>
    </div>
</div>
@endsection
