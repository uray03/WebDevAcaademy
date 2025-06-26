<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <!-- Tailwind CDN -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>
</head>
<body class="bg-white">

  <!-- Tombol Kembali -->
  <a href="javascript:history.back()" 
     class="absolute top-4 left-4 bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition">
    ← Kembali
  </a>

  <div class="min-h-screen flex flex-col md:flex-row">

    <!-- Kiri - Form Login -->
    <div class="w-full md:w-1/2 flex items-center justify-center bg-gray-100 p-10">
      <div class="w-full max-w-md">
        <h2 class="text-3xl font-bold text-blue-700 mb-10">Sign in to <span class="text-blue-600">DevAcademy</span></h2>

        <form action="{{ route('login') }}" method="POST">
          @csrf

          <!-- Email -->
          <div class="mb-6">
            <label class="block text-sm font-bold text-gray-600 tracking-widest mb-2">EMAIL</label>
            <input type="email" name="email" placeholder="you@example.com"
              class="w-full bg-blue-50 border border-blue-200 rounded px-4 py-3 text-base text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
          </div>

          <!-- Password -->
          <div class="mb-8">
            <label class="block text-sm font-bold text-gray-600 tracking-widest mb-2">PASSWORD</label>
            <input type="password" name="password" placeholder="••••••••"
              class="w-full bg-blue-50 border border-blue-200 rounded px-4 py-3 text-base text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
          </div>

          <!-- Tombol Login -->
          <button type="submit"
            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 rounded-full text-lg transition">
            SIGN IN
          </button>

          <!-- Ajakan Register -->
          <div class="text-center mt-6">
            <p class="text-sm text-gray-500">
              Don't have an account?
              <a href="/register" class="text-blue-500 hover:underline font-medium">Register here</a>
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
