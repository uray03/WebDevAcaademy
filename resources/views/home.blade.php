@extends('layouts.app')
@section('title', 'Beranda')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
@endpush

@section('content')
@include('components.alert')

{{-- Hero Section --}}
<div class="hero" data-aos="fade-up">
    <div class="hero-content">
        <div class="devacademy-pill">
            <span>DevAcademy</span>
        </div>
        <h2>
            Learning Today, <span class="highlight-blue">Empower Your</span> dreams.
        </h2>
        <p class="text-base text-gray-600 mb-6">
            Pelajari skill digital masa kini melalui pelatihan yang praktis, uji pemahaman, dan bimbingan dari komunitas belajar yang suportif.
        </p>
        <div class="buttons flex justify-center mt-6">
            <a href="{{ url('/kursus') }}" class="button-primary">Mulai Belajar</a>
        </div>
    </div>
</div>

{{-- Our Services Section --}}
<section id="services" class="bg-white py-20" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="text-left">
                <span class="inline-block bg-white text-gray-800 text-xs font-medium px-3 py-1 rounded-full border border-gray-300 mb-4">
                    OUR SERVICES
                </span>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 leading-tight">
                    Discover our<br />comprehensive services
                </h2>
                <p class="text-gray-500 mb-8 leading-relaxed">
                    Berfokus pada kebutuhan Anda, DevAcademy menghadirkan berbagai layanan belajar yang dirancang untuk mendukung perkembangan skill digital Anda.
                </p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <a href="#explore-courses" class="service-box transition duration-300 rounded-xl p-6 shadow-md bg-white text-gray-900 hover:bg-blue-600 hover:text-white">
                    <div class="text-lg font-semibold mb-2">Course</div>
                    <p class="text-sm">Kuasai skill digital dari dasar hingga mahir lewat kursus yang bisa kamu akses kapan saja.</p>
                </a>
                <a href="#kuis" class="service-box transition duration-300 rounded-xl p-6 shadow-md bg-white text-gray-900 hover:bg-blue-600 hover:text-white">
                    <div class="text-lg font-semibold mb-2">Quiz</div>
                    <p class="text-sm">Gunakan kuis untuk melihat kemampuanmu dan temukan materi yang paling sesuai dengan kebutuhanmu.</p>
                </a>
                <a href="#komunitas" class="service-box transition duration-300 rounded-xl p-6 shadow-md bg-white text-gray-900 hover:bg-blue-600 hover:text-white">
                    <div class="text-lg font-semibold mb-2">Komunitas</div>
                    <p class="text-sm">Terhubung dengan peserta lain, bertukar pengalaman dan belajar bersama lewat forum komunitas.</p>
                </a>
                <a href="#certificate" class="service-box transition duration-300 rounded-xl p-6 shadow-md bg-white text-gray-900 hover:bg-blue-600 hover:text-white">
                    <div class="text-lg font-semibold mb-2">Certificate</div>
                    <p class="text-sm">Dapatkan sertifikat resmi sebagai bukti skill yang kamu kuasai.</p>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Explore Courses --}}
<section id="explore-courses" class="py-6 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <h2 class="text-3xl font-bold text-gray-900 mb-6 text-left">Explore Courses</h2>

        {{-- Kategori Tabs --}}
        <div id="categoryTabs" class="flex space-x-6 mb-6 text-sm font-medium text-gray-600 border-b border-gray-200">
            <button class="tab-button border-b-2 border-gray-800 text-black pb-2" data-tab="latest">Materi Terbaru</button>
            @foreach($categories as $category)
                <button class="tab-button pb-2 hover:text-black" data-tab="category-{{ $category->id }}">{{ $category->name }}</button>
            @endforeach
        </div>

        {{-- Materi Terbaru --}}
        <div id="tab-latest" class="tab-content grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6">
            @foreach($latestCourses as $course)
                @php
                    $imagePath = $course->images->first()?->image_path;
                    $level = $course->difficultyLevel->name ?? 'Tidak Diketahui';
                @endphp
                <div class="rounded-xl shadow hover:shadow-lg transition bg-white overflow-hidden">
                    <div class="w-full h-48 bg-gray-100">
                        <img src="{{ $imagePath ? asset('storage/' . $imagePath) : 'https://via.placeholder.com/300x160' }}"
                             alt="{{ $course->title }}"
                             class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $course->title }}</h3>
                            <p class="text-sm text-gray-500 mt-1 mb-3">Tingkat: {{ $level }}</p>
                        <p class="text-sm text-gray-600">{{ Str::limit($course->description, 60) }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Per-Kategori --}}
        @foreach($categories as $category)
            <div id="tab-category-{{ $category->id }}" class="tab-content hidden grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6">
                @foreach($category->courses as $course)
                    @php
                        $imagePath = $course->images->first()?->image_path;
                        $level = $course->difficultyLevel->name ?? 'Tidak Diketahui';
                    @endphp
                    <div class="rounded-xl shadow hover:shadow-lg transition bg-white overflow-hidden">
                        <div class="w-full h-48 bg-gray-100">
                            <img src="{{ $imagePath ? asset('storage/' . $imagePath) : 'https://via.placeholder.com/300x160' }}"
                                 alt="{{ $course->title }}"
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $course->title }}</h3>
                            <p class="text-sm text-gray-500 mt-1 mb-3">Tingkat: {{ $level }}</p>
                            <p class="text-sm text-gray-600">{{ Str::limit($course->description, 60) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</section>




{{-- Quiz Section --}}
<script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>

<section id="kuis" class="py-6 bg-white" data-aos="fade-up" data-aos-delay="200">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        
        <div class="relative w-full max-w-xl mx-auto group">
            <dotlottie-player 
                id="lottieQuiz"
                src="https://lottie.host/872a613a-d5cc-476b-8356-647fbb7cd9ea/YjXi6ZSanH.lottie" 
                background="transparent" 
                speed="1" 
                style="width: 75%; height: auto;" 
                loop>
            </dotlottie-player>
        </div>
        
        <div class="text-left">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Quick Quiz, Smarter Learning</h2>
            <p class="text-gray-600 text-lg mb-4">
                Take a short quiz to discover your skill level and start learning in the right place.
            </p>
            <p class="text-gray-500">
                Dengan fitur kuis evaluasi keterampilan, DevAcademy membantumu mengenali tingkat penguasaan topik tertentu dan menyesuaikan pembelajaran.
            </p>
        </div>

    </div>
</section>

<script>
    const lottieQuiz = document.getElementById('lottieQuiz');
    
    lottieQuiz.addEventListener('mouseenter', () => lottieQuiz.play());
    lottieQuiz.addEventListener('mouseleave', () => {
        lottieQuiz.stop();
        lottieQuiz.seek(0);
    });
</script>



{{-- Komunitas Section --}}
<script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>

<section id="komunitas" class="py-0 bg-white" data-aos="fade-up" data-aos-delay="300">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        
        <div class="text-left">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Belajar Bersama Komunitas</h2>
            <p class="text-gray-600 text-lg mb-4">
                Terhubung dengan orang-orang yang memiliki semangat belajar yang sama.
            </p>
            <p class="text-gray-500">
                Diskusikan materi, cari solusi, dan saling memberi motivasi dalam lingkungan belajar yang suportif dan aktif.
            </p>
        </div>
        
        <div class="relative w-full max-w-xl mx-auto group">
            <dotlottie-player 
                id="lottieKomunitas"
                src="https://lottie.host/13709eab-106b-494d-984f-032a7299273f/SzIcH2c2qs.lottie" 
                background="transparent" 
                speed="1" 
                style="width: 75%; height: auto;" 
                loop>
            </dotlottie-player>
        </div>

    </div>
</section>

<script>
    const player = document.getElementById('lottieKomunitas');
    
    player.addEventListener('mouseenter', () => player.play());
    player.addEventListener('mouseleave', () => {
        player.stop();
        player.seek(0); 
    });
</script>



{{-- Certificate Section --}}
<script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>

<section id="certificate" class="py-6 bg-white text-center" data-aos="zoom-in" data-aos-delay="400">
    <div class="max-w-3xl mx-auto px-6 flex flex-col items-center">
        
        <div class="relative w-1/2 mx-auto group flex justify-center">
            <dotlottie-player 
                id="lottieCertificate"
                src="https://lottie.host/9cb317e4-55a3-4aab-a0b6-d82aebbb6a39/E9fK3iwxdc.lottie" 
                background="transparent" 
                speed="1" 
                style="width: 75%; height: auto;" 
                loop>
            </dotlottie-player>
        </div>

        <h2 class="text-3xl font-bold text-gray-900 mb-4 mt-6">Get Certified for What You’ve Learned</h2>
        <p class="text-gray-600 text-lg mb-4">
            Selesaikan materi, raih sertifikat, dan tunjukkan skill-mu ke dunia profesional.
        </p>
    </div>
</section>

<script>
    const lottieCertificate = document.getElementById('lottieCertificate');
    
    lottieCertificate.addEventListener('mouseenter', () => lottieCertificate.play());
    lottieCertificate.addEventListener('mouseleave', () => {
        lottieCertificate.stop();
        lottieCertificate.seek(0);
    });
</script>


{{-- FAQ Section --}}
<section id="faq" data-aos="fade-up" data-aos-delay="500">
    <h2 style="font-size: 2rem; margin-bottom: 1rem; text-align:center;">Frequently Asked Questions</h2>
    <div class="faq-item">
        <h4>Apa itu DevAcademy? <i class="fas fa-chevron-down"></i></h4>
        <div class="faq-answer">DevAcademy adalah platform pembelajaran daring...</div>
    </div>
    <div class="faq-item">
        <h4>Apakah DevAcademy gratis? <i class="fas fa-chevron-down"></i></h4>
        <div class="faq-answer">Kami menyediakan kursus gratis...</div>
    </div>
    <div class="faq-item">
        <h4>Bagaimana cara mendaftar kursus? <i class="fas fa-chevron-down"></i></h4>
        <div class="faq-answer">Cukup klik tombol "Mulai Belajar"... </div>
    </div>
</section>

@push('scripts')
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        once: true,
        duration: 800,
    });
</script>
<script>
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        item.addEventListener('click', () => {
            item.classList.toggle('active');
        });
    });
</script>
<script>
    document.querySelectorAll('.tab-button').forEach(button => {
        button.addEventListener('click', () => {
            const tab = button.dataset.tab;

            // Update active class on button
            document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('border-b-2', 'border-gray-800', 'text-black'));
            button.classList.add('border-b-2', 'border-gray-800', 'text-black');

            // Toggle content visibility
            document.querySelectorAll('.tab-content').forEach(content => content.classList.add('hidden'));
            document.getElementById('tab-' + tab).classList.remove('hidden');
        });
    });
</script>
<script>
    document.querySelectorAll('#categoryTabs .tab-button').forEach(button => {
        button.addEventListener('click', () => {
            document.querySelectorAll('#categoryTabs .tab-button').forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            const tab = button.getAttribute('data-tab');
            document.querySelectorAll('.course-grid').forEach(grid => grid.classList.remove('active'));

            const activeGrid = document.getElementById('tab-' + tab);
            if (activeGrid) {
                activeGrid.classList.add('active');
            }
        });
    });
</script>
{{-- Tab Switching Script --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const buttons = document.querySelectorAll(".tab-button");
            const contents = document.querySelectorAll(".tab-content");

            buttons.forEach(button => {
                button.addEventListener("click", () => {
                    // Remove active state
                    buttons.forEach(btn => btn.classList.remove("border-b-2", "border-black", "text-black", "active"));
                    contents.forEach(tab => tab.classList.add("hidden"));
                    contents.forEach(tab => tab.classList.remove("active"));

                    // Activate selected
                    button.classList.add("border-b-2", "border-black", "text-black", "active");
                    const tabId = "tab-" + button.dataset.tab;
                    const activeTab = document.getElementById(tabId);
                    if (activeTab) {
                        activeTab.classList.remove("hidden");
                        activeTab.classList.add("active");
                    }
                });
            });
        });
    </script>

@endpush
@endsection