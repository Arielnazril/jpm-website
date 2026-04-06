@extends('layouts.app')

@section('title', 'Tentang Kami | PT. Jasa Prima Makmur')

@section('custom_styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #ffffff;
        color: #333;
    }

    /* ===== HERO SECTION ===== */
    .hero {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                    url("{{ asset('images/tentang.jpg') }}") center/cover no-repeat fixed;
        height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
        border-bottom: 8px solid #FFA500;
    }

    .hero h1 {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    /* ===== SIKA PRODUCT SHOWCASE (PENGGANTI STATISTIK) ===== */
    .product-container {
        position: relative;
        z-index: 10;
        margin-top: -80px;
    }

    .product-card-wrapper {
        background: #fff;
        border-radius: 24px;
        padding: 40px;
        box-shadow: 0 30px 60px rgba(0,0,0,0.15);
        border: 1px solid #eee;
    }

    .sika-brand-badge {
        background: #ed1c24; /* Warna khas Merah Sika */
        color: white;
        padding: 5px 20px;
        border-radius: 50px;
        font-weight: 800;
        display: inline-block;
        margin-bottom: 20px;
        font-size: 0.9rem;
    }

    .product-item {
        text-align: center;
        padding: 20px;
        transition: 0.3s;
        border-right: 1px solid #eee;
    }

    .product-item:last-child {
        border-right: none;
    }

    .product-item:hover {
        transform: translateY(-10px);
    }

    .product-icon {
        font-size: 2.5rem;
        color: #FFA500;
        margin-bottom: 15px;
    }

    .product-name {
        font-weight: 700;
        font-size: 1.1rem;
        color: #111;
        margin-bottom: 5px;
    }

    .product-desc {
        font-size: 0.85rem;
        color: #777;
        margin-bottom: 0;
    }

    /* ===== VISI MISI SECTION ===== */
    .about-content {
        padding: 100px 0 60px;
    }

    .section-title {
        font-weight: 800;
        font-size: 2.5rem;
        color: #111;
    }

    .title-line {
        width: 60px;
        height: 5px;
        background: #FFA500;
        margin: 15px auto 40px;
    }

    .card-visi-misi {
        background: #fcfcfc;
        border: 1px solid #eee;
        border-radius: 25px;
        padding: 40px;
        height: 100%;
    }

    /* ===== VALUES ===== */
    .bg-dark-values {
        background: #111;
        padding: 80px 0;
        color: white;
    }

    /* ===== CTA ===== */
    .cta-card {
        background: #FFA500;
        border-radius: 30px;
        padding: 60px;
        margin-top: 60px;
        margin-bottom: -80px;
        position: relative;
        z-index: 5;
        text-align: center;
    }

    @media (max-width: 768px) {
        .product-item {
            border-right: none;
            border-bottom: 1px solid #eee;
        }
        .product-item:last-child {
            border-bottom: none;
        }
    }
</style>
@endsection

@section('content')

{{-- 1. Hero Section --}}
<section class="hero">
    <div class="container">
        <h1>Solusi Konstruksi Terbaik</h1>
        <p>Distributor Resmi Produk Sika & Kontraktor Terpercaya</p>
    </div>
</section>

{{-- 2. Sika Products Showcase (PENGGANTI STATISTIK) --}}
<div class="container product-container">
    <div class="product-card-wrapper text-center">
        <div class="sika-brand-badge">OFFICIAL SIKA PRODUCTS</div>
        <h3 class="fw-bold mb-4">Material Berkualitas Tinggi untuk Proyek Anda</h3>
        
        <div class="row g-0">
            <div class="col-md-3 col-6">
                <div class="product-item">
                    <i class="bi bi-droplet-half product-icon"></i>
                    <p class="product-name">Waterproofing</p>
                    <p class="product-desc">Solusi anti bocor untuk atap & basement.</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="product-item">
                    <i class="bi bi-bricks product-icon"></i>
                    <p class="product-name">Flooring</p>
                    <p class="product-desc">Lapisan lantai industri & epoxy berkualitas.</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="product-item">
                    <i class="bi bi-box-seam product-icon"></i>
                    <p class="product-name">Grouting</p>
                    <p class="product-desc">Pengisi celah beton & perkuatan struktur.</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="product-item">
                    <i class="bi bi-patch-check product-icon"></i>
                    <p class="product-name">Admixture</p>
                    <p class="product-desc">Tambahan kimia beton untuk performa maksimal.</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- 3. Visi & Misi --}}
<section class="about-content">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Visi & Misi</h2>
            <div class="title-line"></div>
        </div>

        <div class="row g-4 mt-2">
            <div class="col-lg-6">
                <div class="card-visi-misi">
                    <h4 class="fw-bold text-warning mb-3">Visi Kami</h4>
                    <p class="text-muted lh-lg">
                        Menjadi penyedia solusi material konstruksi dan jasa kontraktor nomor satu di Indonesia yang mengutamakan keaslian produk Sika serta ketepatan aplikasi teknis di lapangan.
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card-visi-misi">
                    <h4 class="fw-bold text-warning mb-3">Misi Kami</h4>
                    <ul class="list-unstyled text-muted">
                        <li class="mb-2">⭐ Menjamin ketersediaan produk Sika original bagi klien.</li>
                        <li class="mb-2">⭐ Memberikan edukasi teknis penggunaan material yang tepat.</li>
                        <li class="mb-2">⭐ Menyelesaikan proyek dengan standar kualitas kelas dunia.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 4. Nilai-Nilai Utama --}}
<section class="bg-dark-values text-center">
    <div class="container">
        <h2 class="section-title text-white">Prinsip Kerja</h2>
        <div class="title-line"></div>
        <div class="row mt-5 g-4">
            <div class="col-md-4">
                <i class="bi bi-shield-fill-check fs-1 text-warning"></i>
                <h5 class="mt-3 fw-bold">Keaslian Produk</h5>
                <p class="small text-secondary">Kami menjamin 100% keaslian brand Sika.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-tools fs-1 text-warning"></i>
                <h5 class="mt-3 fw-bold">Tenaga Ahli</h5>
                <p class="small text-secondary">Aplikator tersertifikasi dan berpengalaman.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-clock-history fs-1 text-warning"></i>
                <h5 class="mt-3 fw-bold">Tepat Waktu</h5>
                <p class="small text-secondary">Manajemen waktu proyek yang presisi dan efisien.</p>
            </div>
        </div>
    </div>
</section>

{{-- 5. Call To Action --}}
<div class="container">
    <div class="cta-card shadow-lg">
        <h2 class="fw-bold mb-3">Butuh Material Sika atau Jasa Konstruksi?</h2>
        <p class="mb-4 opacity-75">Hubungi tim ahli PT. Jasa Prima Makmur untuk konsultasi produk dan estimasi biaya proyek.</p>
        <a href="{{ url('/kontak') }}" class="btn btn-dark btn-lg px-5 py-3 rounded-pill fw-bold">
            Hubungi Kami Sekarang
        </a>
    </div>
</div>

@endsection