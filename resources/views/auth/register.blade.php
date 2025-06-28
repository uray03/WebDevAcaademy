<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>

  <style>
    @keyframes slideInRight {
      0% {
        opacity: 0;
        transform: translateX(80px);
      }
      100% {
        opacity: 1;
        transform: translateX(0);
      }
    }

    .animate-slide-in {
      animation: slideInRight 0.7s ease-out;
    }
  </style>
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

          <div class="mb-4">
            <label class="block text-sm font-bold text-gray-600 tracking-widest mb-2">NAMA</label>
            <input type="text" name="name" class="w-full bg-blue-50 border border-blue-200 rounded px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
          </div>

          <div class="mb-4">
            <label class="block text-sm font-bold text-gray-600 tracking-widest mb-2">USERNAME</label>
            <input type="text" name="username" class="w-full bg-blue-50 border border-blue-200 rounded px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            @error('username') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
          </div>

          <div class="mb-4">
            <label class="block text-sm font-bold text-gray-600 tracking-widest mb-2">EMAIL</label>
            <input type="email" name="email" class="w-full bg-blue-50 border border-blue-200 rounded px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
          </div>

          <div class="mb-4">
            <label class="block text-sm font-bold text-gray-600 tracking-widest mb-2">PASSWORD</label>
            <input type="password" name="password" class="w-full bg-blue-50 border border-blue-200 rounded px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
          </div>

          <div class="mb-8">
            <label class="block text-sm font-bold text-gray-600 tracking-widest mb-2">KONFIRMASI PASSWORD</label>
            <input type="password" name="password_confirmation" class="w-full bg-blue-50 border border-blue-200 rounded px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
          </div>

          <button type="submit"
            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 rounded-full text-lg transition">
            REGISTER
          </button>

          <div class="text-center mt-6">
            <p class="text-sm text-gray-500">
              Already have an account?
              <a href="/login" class="text-blue-500 hover:underline font-medium">Sign in here</a>
            </p>
          </div>
        </form>
      </div>
    </div>

    <!-- Kanan - Ilustrasi Slider -->
    <div class="w-full md:w-1/2 flex items-center justify-center bg-blue-600 relative overflow-hidden">

      <div id="slider" class="flex transition-transform duration-500 w-full h-full">

        <!-- Slide 1 -->
        <div class="flex flex-col items-center justify-center p-4 text-center flex-shrink-0 w-full h-full">
          <dotlottie-player 
            src="https://lottie.host/5aa1b381-6676-4a1c-990e-84995fad8d85/F4dHo95Q9k.lottie" 
            background="transparent" 
            speed="1" 
            style="width: 300px; height: 300px" 
            loop 
            autoplay>
          </dotlottie-player>
          <h2 class="text-2xl font-bold text-white mt-4 mb-2">Ayo Mulai Belajar di DevAcademy!</h2>
          <p class="text-white">Tingkatkan skillmu dengan platform belajar terpercaya.</p>
        </div>

        <!-- Slide 2 -->
        <div class="flex flex-col items-center justify-center p-4 text-center flex-shrink-0 w-full h-full">
          <dotlottie-player 
            src="https://lottie.host/541d853c-8462-438c-a768-5748b239b550/4154z6RyAD.lottie" 
            background="transparent" 
            speed="1" 
            style="width: 300px; height: 300px" 
            loop 
            autoplay>
          </dotlottie-player>
          <h2 class="text-2xl font-bold text-white mt-4 mb-2">Belajar Mudah Lewat Kursus DevAcademy</h2>
          <p class="text-white">Ikuti kursus kami dan pelajari materi berkualitas!</p>
        </div>

        <!-- Slide 3 -->
        <div class="flex flex-col items-center justify-center p-4 text-center flex-shrink-0 w-full h-full">
          <dotlottie-player 
            src="https://lottie.host/e89921ef-4700-4281-a669-ca3f4caa52c7/p1VAJwmXXu.lottie" 
            background="transparent" 
            speed="1" 
            style="width: 300px; height: 300px" 
            loop 
            autoplay>
          </dotlottie-player>
          <h2 class="text-2xl font-bold text-white mt-4 mb-2">Gabung Komunitas DevAcademy</h2>
          <p class="text-white">Bertanya, berdiskusi, dan belajar bareng teman lainnya!</p>
        </div>

      </div>

      <!-- Dots -->
      <div class="absolute bottom-6 flex justify-center w-full gap-2">
        <button class="slider-dot w-3 h-3 rounded-full bg-white opacity-50" onclick="showSlide(0)"></button>
        <button class="slider-dot w-3 h-3 rounded-full bg-white opacity-50" onclick="showSlide(1)"></button>
        <button class="slider-dot w-3 h-3 rounded-full bg-white opacity-50" onclick="showSlide(2)"></button>
      </div>

    </div>

  </div>

  <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
  <script>
    let currentSlide = 0;

    function showSlide(index) {
      const slider = document.getElementById('slider');
      slider.style.transform = `translateX(-${index * 100}%)`;
      currentSlide = index;
      updateDots();
    }

    function updateDots() {
      const dots = document.querySelectorAll('.slider-dot');
      dots.forEach((dot, idx) => {
        dot.classList.toggle('opacity-100', idx === currentSlide);
        dot.classList.toggle('opacity-50', idx !== currentSlide);
      });
    }

    setInterval(() => {
      currentSlide = (currentSlide + 1) % 3;
      showSlide(currentSlide);
    }, 5000);

    showSlide(0);
  </script>

</body>
</html>
