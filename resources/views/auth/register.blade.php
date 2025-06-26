<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>
</head>
<body class="bg-white">

  <a href="javascript:history.back()" 
     class="absolute top-4 left-4 bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition">
    ← Kembali
  </a>

  <div class="min-h-screen flex flex-col md:flex-row">

    <!-- Kiri - Form Register -->
    <div class="w-full md:w-1/2 flex items-center justify-center bg-gray-100 p-10">
      <div class="w-full max-w-md">
        <h2 class="text-3xl font-bold text-blue-700 mb-10">Create your <span class="text-blue-600">DevAcademy</span> Account</h2>

        <form action="/register" method="POST">
          @csrf

          <!-- Nama -->
          <div class="mb-4">
            <label class="block text-sm font-bold text-gray-600 tracking-widest mb-2">NAMA</label>
            <input type="text" name="name" class="w-full bg-blue-50 border border-blue-200 rounded px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
          </div>

          <!-- Username -->
          <div class="mb-4">
            <label class="block text-sm font-bold text-gray-600 tracking-widest mb-2">USERNAME</label>
            <input type="text" name="username" class="w-full bg-blue-50 border border-blue-200 rounded px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            @error('username') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
          </div>

          <!-- Email -->
          <div class="mb-4">
            <label class="block text-sm font-bold text-gray-600 tracking-widest mb-2">EMAIL</label>
            <input type="email" name="email" class="w-full bg-blue-50 border border-blue-200 rounded px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
          </div>

          <!-- Password -->
          <div class="mb-4">
            <label class="block text-sm font-bold text-gray-600 tracking-widest mb-2">PASSWORD</label>
            <input type="password" name="password" class="w-full bg-blue-50 border border-blue-200 rounded px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
          </div>

          <!-- Konfirmasi Password -->
          <div class="mb-8">
            <label class="block text-sm font-bold text-gray-600 tracking-widest mb-2">KONFIRMASI PASSWORD</label>
            <input type="password" name="password_confirmation" class="w-full bg-blue-50 border border-blue-200 rounded px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
          </div>

          <!-- Tombol Register -->
          <button type="submit"
            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 rounded-full text-lg transition">
            REGISTER
          </button>

          <!-- Ajakan Login -->
          <div class="text-center mt-6">
            <p class="text-sm text-gray-500">
              Already have an account?
              <a href="/login" class="text-blue-500 hover:underline font-medium">Sign in here</a>
            </p>
          </div>
        </form>
      </div>
    </div>

    <!-- Kanan - Ilustrasi -->
    <div class="w-full md:w-1/2 flex items-center justify-center bg-blue-200">
      <img src="{{ asset('img/diver-illustration.png') }}" alt="Illustration" class="max-h-[400px]">
    </div>

  </div>

</body>
</html>
