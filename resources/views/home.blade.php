@extends('layouts.app')
@section('title', 'Beranda')

@section('content')
@include('components.alert')

<style>
    body, html {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        scroll-behavior: smooth;
    }

    .hero {
        min-height: 100vh;
        width: 100%;
        background-color: #3b82f6;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 2rem;
        margin-top: -70px; /* Sesuaikan tinggi navbar kamu, misal navbar fixed */
    }

    .hero-content {
        max-width: 700px;
    }

    .hero h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
    }

    .hero h2 {
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .hero p {
        font-size: 1.1rem;
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    .buttons {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .btn-start {
        background-color: white;
        color: #3b82f6;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
        text-decoration: none;
    }

    .btn-start:hover {
        background-color: #2563eb;
        color: white;
    }

    .scroll-btn {
        width: 44px;
        height: 44px;
        border: 2px solid white;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        animation: bounce 2s infinite;
        cursor: pointer;
        text-decoration: none;
    }

    .scroll-btn i {
        color: white;
        font-size: 16px;
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
        40% { transform: translateY(-10px); }
        60% { transform: translateY(-5px); }
    }

    section {
        padding: 60px 20px;
        text-align: center;
    }

    #services {
        background-color: #f3f4f6;
    }

    /* FAQ Styles */
    .faq-item {
        background: white;
        border: 1px solid #ddd;
        border-radius: 8px;
        margin: 10px auto;
        max-width: 800px;
        padding: 15px;
        cursor: pointer;
        text-align: left;
    }

    .faq-item h4 {
        margin: 0;
        font-size: 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .faq-answer {
        display: none;
        margin-top: 10px;
        color: #555;
    }

    .faq-item.active .faq-answer {
        display: block;
    }
</style>

<div class="hero" style="width: 100vw; margin-left: calc(-50vw + 50%);">
    <div class="hero-content">
        <h1>DevAcademy</h1>
        <h2>Learning Today, Empower Your Dream</h2>
        <p>Pelajari skill digital masa kini lewat kursus profesional, proyek nyata, dan bimbingan langsung dari mentor berpengalaman.</p>
        <div class="buttons">
            <a href="{{ url('/kursus') }}" class="btn-start">Mulai Sekarang</a>

            <a href="#services" class="scroll-btn">
                <i class="fas fa-chevron-down"></i>
            </a>
        </div>
    </div>
</div>

<section id="services">
    <h2 style="font-size: 2rem; margin-bottom: 1rem;">Our Services</h2>
    <p>Kami menawarkan berbagai layanan untuk membantu Anda membangun produk digital.</p>
</section>

<section id="faq">
    <h2 style="font-size: 2rem; margin-bottom: 1rem;">Frequently Asked Questions</h2>

    <div class="faq-item">
        <h4>Apa itu DevAcademy? <i class="fas fa-chevron-down"></i></h4>
        <div class="faq-answer">DevAcademy adalah platform pembelajaran daring yang menyediakan kursus digital berkualitas.</div>
    </div>

    <div class="faq-item">
        <h4>Apakah DevAcademy gratis? <i class="fas fa-chevron-down"></i></h4>
        <div class="faq-answer">Kami menyediakan kursus gratis yang langsung bisa diakses untuk mulai belajar menjadi developer.</div>
    </div>

    <div class="faq-item">
        <h4>Bagaimana cara mendaftar kursus? <i class="fas fa-chevron-down"></i></h4>
        <div class="faq-answer">Cukup klik tombol "Mulai Sekarang" dan pilih kursus yang Anda inginkan.</div>
    </div>
</section>

<script>
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        item.addEventListener('click', () => {
            item.classList.toggle('active');
        });
    });
</script>

@endsection
