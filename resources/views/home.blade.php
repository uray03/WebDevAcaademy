<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevAcademy - Beranda</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
@include('components.alert')

<div class="hero">
    <div class="hero-content" data-aos="fade-up">
        <div class="devacademy-pill">
            <span>DevAcademy</span>
        </div>
        <h2>Learning Today, <span class="highlight-blue">Empower Your</span> dreams.</h2>
        <p class="text-base text-gray-600 mb-6">
            Pelajari skill digital masa kini melalui pelatihan yang praktis, uji pemahaman, dan bimbingan dari mentor yang siap membantu.
        </p>
        <div class="buttons flex justify-center mt-6">
            <a href="{{ url('/kursus') }}" class="button-primary">Mulai Belajar</a>
        </div>
    </div>
</div>

<section id="services" data-aos="fade-up">
    <h2 class="section-title">Our Services</h2>
    <div class="service-grid">
        <div class="service-card" onclick="selectService(this, 'explore-courses')">
            <h3>Course</h3>
            <p>Kuasai skill digital dari dasar hingga mahir lewat kursus yang bisa kamu akses kapan saja.</p>
        </div>
        <div class="service-card" onclick="selectService(this, 'kuis')">
            <h3>Quiz</h3>
            <p>Gunakan kuis untuk melihat kemampuanmu dan temukan materi sesuai kebutuhanmu.</p>
        </div>
        <div class="service-card" onclick="selectService(this, 'community')">
            <h3>Komunitas</h3>
            <p>Bertukar ilmu dan berdiskusi dengan peserta lain di komunitas DevAcademy.</p>
        </div>
        <div class="service-card" onclick="selectService(this, 'certificate')">
            <h3>Certificate</h3>
            <p>Setelah menyelesaikan kursus, dapatkan sertifikat resmi sebagai bukti skill-mu.</p>
        </div>
    </div>
</section>

<section id="explore-courses" data-aos="fade-up">
    <h2>Explore Courses</h2>
    <div class="courses-grid">
        <div class="course-card">
            <img src="..." alt="Thumbnail">
            <h3>Learning Personal Branding</h3>
            <p>2,905,054 viewers • 47m</p>
        </div>
    </div>
</section>

<section id="kuis" data-aos="fade-up">
    <h2>Quick Quiz, Smarter Learning</h2>
    <p>Take a short quiz to discover your skill level and start learning in the right place.</p>
</section>

<section id="certificate" data-aos="fade-up">
    <h2>Learn with Experts by Your Side</h2>
    <p>Explore Role Guides to support your career advancement...</p>
</section>

<section id="community" data-aos="fade-up">
    <h2>Bergabung dengan Komunitas</h2>
    <p>Bertukar ilmu, bertanya, dan terhubung dengan peserta lain di komunitas DevAcademy.</p>
</section>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init({ duration: 800, once: true });

function scrollToSection(sectionId) {
    const section = document.getElementById(sectionId);
    if (section) {
        section.scrollIntoView({ behavior: 'smooth' });
    }
}

function selectService(element, targetId) {
    document.querySelectorAll('.service-card').forEach(card => card.classList.remove('active'));
    element.classList.add('active');
    scrollToSection(targetId);
}
</script>
</body>
</html>