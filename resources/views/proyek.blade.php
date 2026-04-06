@extends('layouts.app')

@section('title', 'Proyek | PT. Jasa Prima Makmur')

@section('custom_styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
    :root {
        --primary-orange: #FFA500;
        --primary-dark: #0f172a;
        --accent-gray: #64748b;
        --white: #ffffff;
    }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #f8fafc;
        color: #334155;
    }

    /* ===== HERO SECTION ENHANCED (UKURAN DIPERBESAR) ===== */
    .hero-proyek {
        /* Overlay dibuat sedikit lebih terang (0.6) agar gambar lebih terlihat */
        background: linear-gradient(rgba(15, 23, 42, 0.65), rgba(15, 23, 42, 0.85)), 
                    url("{{ asset('images/pdam-intake.jpg') }}") center 30%/cover no-repeat fixed;
        height: 75vh; /* Ukuran ditingkatkan dari 60vh ke 75vh */
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
        border-bottom: 10px solid var(--primary-orange);
        position: relative;
    }

    .hero-proyek h1 {
        font-size: clamp(3rem, 6vw, 5rem); /* Ukuran teks diperbesar sedikit */
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: -1px;
        margin-bottom: 15px;
        text-shadow: 0 10px 30px rgba(0,0,0,0.5);
        animation: fadeInUp 0.8s ease-out;
    }

    .hero-proyek p {
        font-size: 1.4rem; /* Ukuran teks diperbesar */
        font-weight: 400;
        color: rgba(255, 255, 255, 0.9);
        max-width: 700px;
        margin: 0 auto;
        animation: fadeInUp 1s ease-out;
    }

    /* ===== PROJECT CATALOG SECTION ===== */
    .project-section {
        padding: 120px 0; /* Padding ditambah agar lebih lega */
        background: radial-gradient(circle at 10% 20%, rgba(255, 165, 0, 0.03) 0%, transparent 40%);
    }

    .section-tagline {
        color: var(--primary-orange);
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 0.85rem;
        display: block;
        margin-bottom: 10px;
    }

    .project-card {
        background: var(--white);
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.04);
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        height: 100%;
        border: 1px solid rgba(0, 0, 0, 0.03);
        position: relative;
    }

    .project-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 30px 60px rgba(15, 23, 42, 0.12);
        border-color: rgba(255, 165, 0, 0.2);
    }

    .card-img-wrapper {
        position: relative;
        overflow: hidden;
        height: 280px;
    }

    .project-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s ease;
    }

    .project-card:hover img {
        transform: scale(1.1);
    }

    .project-category {
        position: absolute;
        top: 20px;
        right: 20px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        color: var(--primary-dark);
        padding: 8px 18px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        z-index: 2;
    }

    .project-info {
        padding: 35px;
        text-align: left;
    }

    .project-title {
        font-weight: 800;
        font-size: 1.35rem;
        color: var(--primary-dark);
        margin-bottom: 15px;
        transition: color 0.3s ease;
    }

    .project-card:hover .project-title {
        color: var(--primary-orange);
    }

    .project-desc {
        color: #64748b;
        font-size: 0.95rem;
        line-height: 1.8;
        margin-bottom: 25px;
    }

    .btn-view-detail {
        font-size: 0.85rem;
        font-weight: 700;
        color: var(--primary-dark);
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: 0.3s;
    }

    .btn-view-detail i {
        background: var(--primary-orange);
        color: white;
        width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 0.8rem;
        transition: 0.3s;
    }

    /* ===== CTA SECTION ===== */
    .cta-container {
        padding-bottom: 120px;
    }

    .cta-card {
        background: var(--primary-dark);
        border-radius: 50px;
        padding: 70px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 30px 60px rgba(15, 23, 42, 0.2);
    }

    .btn-cta-custom {
        background: var(--primary-orange);
        color: var(--primary-dark) !important;
        padding: 18px 45px;
        border-radius: 20px;
        font-weight: 800;
        font-size: 1rem;
        border: none;
        transition: all 0.3s ease;
        box-shadow: 0 10px 25px rgba(255, 165, 0, 0.3);
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 768px) {
        .hero-proyek { height: 60vh; }
        .cta-card { padding: 40px; border-radius: 30px; }
    }
</style>
@endsection

@section('content')

{{-- 1. Hero Section --}}
<section class="hero-proyek">
    <div class="container">
        <h1>Portofolio Proyek</h1>
        <p>Menampilkan dedikasi kami dalam membangun infrastruktur vital dengan presisi teknik tinggi.</p>
    </div>
</section>

{{-- 2. Proyek Katalog Section --}}
<section class="project-section">
    <div class="container text-center">
        <span class="section-tagline">Excellence in Construction</span>
        <h2 class="fw-800 mb-4" style="font-size: 2.5rem; color: var(--primary-dark);">Partner Project</h2>
        <p class="text-muted mx-auto mb-5" style="max-width: 750px; font-size: 1.1rem; line-height: 1.8;">
            Kami bangga menjadi bagian dari pembangunan Kalimantan Barat melalui proyek-proyek strategis berikut.
        </p>

        <div class="row g-5">
            {{-- Proyek 1 --}}
            <div class="col-lg-4 col-md-6">
                <div class="project-card">
                    <div class="card-img-wrapper">
                        <img src="{{ asset('images/pdam-wtp.jpg') }}" alt="WTP PDAM Nipah Kuning">
                        <span class="project-category">Water Treatment</span>
                    </div>
                    <div class="project-info">
                        <h4 class="project-title">PDAM - Nipah Kuning</h4>
                        <p class="project-desc">
                            Pembangunan struktur utama Sistem WTP untuk pengolahan air bersih standar nasional dengan efisiensi maksimal.
                        </p>
                        <a href="#" class="btn-view-detail">
                            Lihat Dokumentasi <i><i class="bi bi-arrow-right"></i></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Proyek 2 --}}
            <div class="col-lg-4 col-md-6">
                <div class="project-card">
                    <div class="card-img-wrapper">
                        <img src="{{ asset('images/pdam-intake.jpg') }}" alt="Intake Jeruju">
                        <span class="project-category">Civil Engineering</span>
                    </div>
                    <div class="project-info">
                        <h4 class="project-title">Intake Jeruju - PDAM</h4>
                        <p class="project-desc">
                            Struktur pengambilan air baku dengan sistem pembesian khusus dan proteksi beton dari erosi air sungai.
                        </p>
                        <a href="#" class="btn-view-detail">
                            Lihat Dokumentasi <i><i class="bi bi-arrow-right"></i></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Proyek 3 --}}
            <div class="col-lg-4 col-md-6">
                <div class="project-card">
                    <div class="card-img-wrapper">
                        <img src="{{ asset('images/gky-28.jpg') }}" alt="Gereja GKY 28 Oktober">
                        <span class="project-category">Public Facility</span>
                    </div>
                    <div class="project-info">
                        <h4 class="project-title">Gereja GKY - 28 Oktober</h4>
                        <p class="project-desc">
                            Konstruksi gedung ibadah dengan bentang lebar yang mengutamakan aspek estetika dan kekuatan struktur bangunan.
                        </p>
                        <a href="#" class="btn-view-detail">
                            Lihat Dokumentasi <i><i class="bi bi-arrow-right"></i></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 3. Call To Action (CTA) --}}
<div class="container cta-container">
    <div class="cta-card text-white">
        <div class="row align-items-center">
            <div class="col-lg-7 text-lg-start text-center">
                <h2 class="display-6 fw-bold">Wujudkan Proyek Anda Bersama Kami</h2>
                <p class="opacity-75">Konsultasikan kebutuhan konstruksi dan infrastruktur Anda dengan tim ahli kami.</p>
            </div>
            <div class="col-lg-5 text-lg-end text-center mt-4 mt-lg-0">
                <a href="{{ url('/kontak') }}" class="btn btn-cta-custom">
                    Hubungi Kami Sekarang <i class="bi bi-telephone-fill ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection