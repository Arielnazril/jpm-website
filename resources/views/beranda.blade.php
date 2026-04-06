@extends('layouts.app')

@section('title', 'Beranda | PT. Jasa Prima Makmur')

@section('custom_styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">

<style>
    :root {
        --primary-orange: #FFA500;
        --dark-bg: #111111;
        --sika-red: #ed1c24;
    }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* ===== HERO SECTION UPGRADE ===== */
    .hero {
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                    url("{{ asset('images/bg-jpm.jpg') }}") center/cover no-repeat fixed; 
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        position: relative;
        overflow: hidden;
    }

    /* Dekorasi Garis Oranye di Bawah Hero */
    .hero::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 8px;
        background: var(--primary-orange);
    }

    .hero-content {
        z-index: 2;
        max-width: 900px;
    }

    .hero h1 {
        font-size: clamp(2.5rem, 6vw, 4.5rem);
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: -1px;
        line-height: 1.1;
        margin-bottom: 20px;
        animation: fadeInUp 1s ease forwards;
    }

    .hero p {
        font-size: 1.25rem;
        font-weight: 300;
        opacity: 0.9;
        margin-bottom: 35px;
        animation: fadeInUp 1.2s ease forwards;
    }

    /* ===== SECTION GENERAL ===== */
    .section {
        padding: 100px 0;
    }

    .section-title {
        font-weight: 800;
        font-size: 2.5rem;
        margin-bottom: 50px;
        position: relative;
        display: inline-block;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 70px;
        height: 5px;
        background: var(--primary-orange);
    }

    /* ===== BUSINESS CARDS (GLASSMORPHISM) ===== */
    .card-business {
        border: none;
        padding: 40px 30px;
        border-radius: 25px;
        background: #fff;
        box-shadow: 0 15px 35px rgba(0,0,0,0.05);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        height: 100%;
        border-bottom: 5px solid transparent;
    }

    .card-business:hover {
        transform: translateY(-15px);
        box-shadow: 0 30px 60px rgba(0,0,0,0.1);
        border-bottom: 5px solid var(--primary-orange);
    }

    .card-business .icon-box {
        width: 70px;
        height: 70px;
        background: rgba(255, 165, 0, 0.1);
        color: var(--primary-orange);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin: 0 auto 25px;
    }

    /* ===== PROYEK SECTION ===== */
    .project-card {
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        cursor: pointer;
    }

    .project-card img {
        transition: transform 0.6s ease;
        width: 100%;
        aspect-ratio: 4/3;
        object-fit: cover;
    }

    .project-overlay {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 30px;
        opacity: 0;
        transition: 0.4s;
    }

    .project-card:hover .project-overlay {
        opacity: 1;
    }

    .project-card:hover img {
        transform: scale(1.1);
    }

    .project-overlay h5 {
        color: var(--primary-orange);
        font-weight: 700;
        margin: 0;
    }

    .project-overlay p {
        color: #fff;
        font-size: 0.9rem;
        margin: 5px 0 0;
    }

    /* ===== SIKA PARTNER BADGE ===== */
    .sika-badge {
        background: var(--sika-red);
        color: white;
        padding: 5px 15px;
        border-radius: 5px;
        font-weight: 800;
        font-size: 0.75rem;
        display: inline-block;
        margin-bottom: 15px;
    }

    /* Animations */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection

@section('content')

{{-- Hero Section --}}
<section class="hero text-center">
    <div class="container">
        <div class="hero-content">
            <h1>Membangun Dengan <span style="color: var(--primary-orange)">Kualitas & Presisi</span></h1>
            <p>PT. Jasa Prima Makmur hadir sebagai mitra strategis konstruksi dan solusi material kelas dunia di seluruh Indonesia.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ url('/tentang') }}" class="btn btn-warning px-5 py-3 fw-bold rounded-pill shadow">Pelajari Profil Kami</a>
                <a href="{{ url('/bisnis') }}" class="btn btn-outline-light px-5 py-3 rounded-pill fw-bold">Layanan Kami</a>
            </div>
        </div>
    </div>
</section>

{{-- Tentang Singkat --}}
<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="{{ asset('images/tentang.jpg') }}" class="img-fluid rounded-4 shadow-lg" alt="Tentang JPM">
            </div>
            <div class="col-lg-6 ps-lg-5">
                <h5 class="text-warning fw-bold text-uppercase">Tentang Kami</h5>
                <h2 class="fw-bold mb-4">Pengalaman Lebih Dari Satu Dekade</h2>
                <p class="text-muted fs-5 lh-lg">PT. Jasa Prima Makmur (JPM) adalah pilar kekuatan dalam industri konstruksi Indonesia. Kami bergerak dalam pembangunan infrastruktur strategis, mulai dari gedung, jembatan, hingga sistem pengolahan air (WTP).</p>
                <p class="text-muted mb-4">Kami percaya bahwa setiap struktur yang kami bangun adalah investasi masa depan bagi masyarakat dan mitra bisnis kami.</p>
                <a href="{{ url('/tentang') }}" class="btn btn-dark px-4 py-2 rounded-pill">Selengkapnya</a>
            </div>
        </div>
    </div>
</section>

{{-- Section Bidang Bisnis dengan Ikon Visual --}}
<section class="section bg-light" style="padding: 100px 0; background-color: #f8f9fa;">
    <div class="container text-center">
        <h2 class="section-title" style="font-weight: 800; font-size: 2.8rem; margin-bottom: 60px; position: relative; display: inline-block;">
            Bidang Bisnis Kami
            <span style="display: block; width: 60px; height: 5px; background: #FFA500; margin: 15px auto 0;"></span>
        </h2>

        <div class="row g-4 mt-2">
            <div class="col-md-4">
                <div class="card-business" style="background: #fff; padding: 50px 30px; border-radius: 30px; box-shadow: 0 20px 40px rgba(0,0,0,0.05); transition: 0.4s; height: 100%; border: none;">
                    <div class="icon-box" style="width: 90px; height: 90px; background: rgba(255, 165, 0, 0.1); color: #FFA500; border-radius: 24px; display: flex; align-items: center; justify-content: center; font-size: 3rem; margin: 0 auto 30px;">
                        <i class="bi bi-building-gear"></i>
                    </div>
                    <h4 style="font-weight: 700; color: #111; margin-bottom: 20px;">Konstruksi Bangunan</h4>
                    <p style="color: #666; line-height: 1.8; font-size: 0.95rem;">Pembangunan fasilitas publik, gedung komersial, dan perumahan dengan standar keamanan tertinggi.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-business" style="background: #fff; padding: 50px 30px; border-radius: 30px; box-shadow: 0 25px 50px rgba(0,0,0,0.1); transition: 0.4s; height: 100%; border: 2px solid #FFA500; transform: scale(1.05); position: relative; z-index: 2;">
                    <div style="background: #ed1c24; color: white; padding: 4px 15px; border-radius: 8px; font-weight: 800; font-size: 0.7rem; display: inline-block; margin-bottom: 20px; letter-spacing: 1px;">
                        OFFICIAL SIKA PARTNER
                    </div>
                    <div class="icon-box" style="width: 90px; height: 90px; background: rgba(237, 28, 36, 0.1); color: #ed1c24; border-radius: 24px; display: flex; align-items: center; justify-content: center; font-size: 3rem; margin: 0 auto 30px;">
                        <i class="bi bi-droplet-half"></i>
                    </div>
                    <h4 style="font-weight: 700; color: #111; margin-bottom: 20px;">Waterproofing Specialist</h4>
                    <p style="color: #666; line-height: 1.8; font-size: 0.95rem;">Solusi perlindungan kebocoran basement, atap, dan kolam renang menggunakan teknologi Sika resmi.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-business" style="background: #fff; padding: 50px 30px; border-radius: 30px; box-shadow: 0 20px 40px rgba(0,0,0,0.05); transition: 0.4s; height: 100%; border: none;">
                    <div class="icon-box" style="width: 90px; height: 90px; background: rgba(255, 165, 0, 0.1); color: #FFA500; border-radius: 24px; display: flex; align-items: center; justify-content: center; font-size: 3rem; margin: 0 auto 30px;">
                        <i class="bi bi-tools"></i>
                    </div>
                    <h4 style="font-weight: 700; color: #111; margin-bottom: 20px;">Infrastruktur & Teknik</h4>
                    <p style="color: #666; line-height: 1.8; font-size: 0.95rem;">Menangani struktur berat seperti jembatan, bendungan, dan instalasi pengolahan air (Intake/WTP).</p>
                </div>
            </div>
        </div>
    </div>
</section>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

{{-- Proyek Unggulan --}}
<section class="section">
    <div class="container text-center">
        <h2 class="section-title">Proyek Unggulan</h2>
        <div class="row g-4 mt-2">
            <div class="col-md-4">
                <div class="project-card shadow">
                    <img src="{{ asset('images/pdam-wtp.jpg') }}" alt="Nipah Kuning Dalam">
                    <div class="project-overlay">
                        <h5>PDAM - NIPAH KUNING</h5>
                        <p>Pembangunan Sistem WTP (Water Treatment Plant)</p>
                    </div>
                </div>
                <h6 class="mt-3 fw-bold">WTP PDAM - NIPAH KUNING</h6>
            </div>
            <div class="col-md-4">
                <div class="project-card shadow">
                    <img src="{{ asset('images/pdam-intake.jpg') }}" alt="Intake Jeruju">
                    <div class="project-overlay">
                        <h5>INTAKE JERUJU</h5>
                        <p>Pembangunan Struktur Pengambilan Air PDAM</p>
                    </div>
                </div>
                <h6 class="mt-3 fw-bold">INTAKE JERUJU - PDAM</h6>
            </div>
            <div class="col-md-4">
                <div class="project-card shadow">
                    <img src="{{ asset('images/gky-28.jpg') }}" alt="GKY 28 Oktober">
                    <div class="project-overlay">
                        <h5>GEREJA GKY</h5>
                        <p>Konstruksi Struktur & Arsitektur Bangunan Ibadah</p>
                    </div>
                </div>
                <h6 class="mt-3 fw-bold">GEREJA GKY - 28 OKTOBER</h6>
            </div>
        </div>
        <a href="{{ url('/proyek') }}" class="btn btn-outline-warning mt-5 px-5 py-3 fw-bold rounded-pill">Lihat Galeri Proyek Lainnya</a>
    </div>
</section>

@endsection