@include('components.alert')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
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

  <!-- Tombol Kembali -->
  <a href="javascript:history.back()" 
     class="absolute top-4 left-4 bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition">
    ← Kembali
  </a>

  <div class="min-h-screen flex flex-col md:flex-row">

<!-- Notifikasi Alert -->
@if (session('error'))
  <div class="fixed top-5 left-1/2 transform -translate-x-1/2 bg-red-100 border border-red-400 text-red-700 px-6 py-3 rounded-lg shadow-lg max-w-md w-full text-center z-50">
    {{ session('error') }}
  </div>
@endif

@if (session('success'))
  <div class="fixed top-5 left-1/2 transform -translate-x-1/2 bg-green-100 border border-green-400 text-green-700 px-6 py-3 rounded-lg shadow-lg max-w-md w-full text-center z-50">
    {{ session('success') }}
  </div>
@endif


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

    <!-- Bagian kanan halaman login -->
    <div class="w-full md:w-1/2 flex items-center justify-center bg-blue-600 relative overflow-hidden">

<!-- Wrapper slider -->
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

<!-- Slide 3: Ajakan Komunitas -->
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

<!-- Dots Indicator -->
<div class="absolute bottom-6 flex justify-center w-full gap-2">
  <button class="slider-dot w-3 h-3 rounded-full bg-white opacity-50" onclick="showSlide(0)"></button>
  <button class="slider-dot w-3 h-3 rounded-full bg-white opacity-50" onclick="showSlide(1)"></button>
  <button class="slider-dot w-3 h-3 rounded-full bg-white opacity-50" onclick="showSlide(2)"></button>
</div>


</div>


  <!-- Script DotLottie Player -->
  <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>

  <!-- Script Slider -->
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


    // Auto Slide setiap 5 detik
    setInterval(() => {
      currentSlide = (currentSlide + 1) % 3;
      showSlide(currentSlide);
    }, 5000);

    // Inisialisasi
    showSlide(0);
  </script>
<script>
  setTimeout(() => {
    document.querySelectorAll('.fixed').forEach(el => el.style.display = 'none');
  }, 3000);
</script>
</body>
</html>
