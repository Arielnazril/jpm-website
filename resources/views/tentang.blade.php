@extends('layouts.app')

@section('title', 'Tentang Kami | PT. Jasa Prima Makmur')

@section('custom_styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
    :root {
        --sika-red: #ed1c24;
        --jpm-orange: #FFA500;
        --dark-bg: #111111;
    }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #ffffff;
        color: #333;
        overflow-x: hidden;
    }

    /* ===== HERO SECTION ===== */
    .hero {
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.8)), 
                    url("{{ asset('images/tentang.jpg') }}") center/cover no-repeat fixed;
        height: 65vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
        border-bottom: 8px solid var(--jpm-orange);
    }

    .hero h1 {
        font-size: clamp(2.8rem, 6vw, 4.5rem);
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 3px;
        margin-bottom: 15px;
        text-shadow: 2px 4px 10px rgba(0,0,0,0.3);
    }

    .hero p {
        font-size: 1.2rem;
        font-weight: 500;
        letter-spacing: 1px;
        opacity: 0.9;
    }

    /* ===== SIKA PRODUCT SHOWCASE ===== */
    .product-container {
        position: relative;
        z-index: 10;
        margin-top: -100px;
    }

    .product-card-wrapper {
        background: #fff;
        border-radius: 30px;
        padding: 50px 40px;
        box-shadow: 0 40px 80px rgba(0,0,0,0.12);
        border: 1px solid rgba(0,0,0,0.05);
    }

    .sika-brand-badge {
        background: var(--sika-red);
        color: white;
        padding: 8px 25px;
        border-radius: 50px;
        font-weight: 800;
        display: inline-block;
        margin-bottom: 25px;
        font-size: 0.85rem;
        letter-spacing: 1px;
        box-shadow: 0 4px 15px rgba(237, 28, 36, 0.3);
    }

    .product-item {
        text-align: center;
        padding: 30px 20px;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border-right: 1px solid #f0f0f0;
    }

    .product-item:last-child {
        border-right: none;
    }

    .product-item:hover {
        transform: translateY(-15px);
        background: #fffaf0;
        border-radius: 20px;
    }

    .product-icon {
        font-size: 3rem;
        color: var(--jpm-orange);
        margin-bottom: 20px;
        display: inline-block;
    }

    .product-name {
        font-weight: 800;
        font-size: 1.2rem;
        color: #111;
        margin-bottom: 10px;
    }

    .product-desc {
        font-size: 0.9rem;
        color: #666;
        line-height: 1.6;
    }

    /* ===== VISI MISI SECTION ===== */
    .about-content {
        padding: 120px 0 80px;
    }

    .section-title {
        font-weight: 800;
        font-size: 2.8rem;
        color: #111;
        letter-spacing: -1px;
    }

    .title-line {
        width: 80px;
        height: 6px;
        background: var(--jpm-orange);
        margin: 20px auto 50px;
        border-radius: 10px;
    }

    .card-visi-misi {
        background: #ffffff;
        border: 1px solid #f0f0f0;
        border-radius: 30px;
        padding: 50px;
        height: 100%;
        transition: 0.3s;
        box-shadow: 0 10px 30px rgba(0,0,0,0.02);
    }

    .card-visi-misi:hover {
        border-color: var(--jpm-orange);
        box-shadow: 0 20px 40px rgba(0,0,0,0.05);
    }

    .card-visi-misi h4 {
        font-size: 1.5rem;
        letter-spacing: 0.5px;
        margin-bottom: 20px !important;
    }

    /* ===== WAREHOUSE SECTION (ENHANCED) ===== */
    .warehouse-section {
        background-color: #f8f9fa;
        padding: 100px 0;
    }

    .warehouse-card {
        border-radius: 25px;
        overflow: hidden;
        position: relative;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        border: none;
        transition: all 0.4s ease;
    }

    .warehouse-img-wrapper {
        height: 350px;
        overflow: hidden;
        position: relative;
    }

    .warehouse-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s ease;
    }

    .warehouse-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(transparent, rgba(0,0,0,0.8));
        padding: 30px;
        color: white;
        transition: 0.4s;
    }

    .warehouse-card:hover img {
        transform: scale(1.1);
    }

    .warehouse-badge {
        position: absolute;
        top: 20px;
        left: 20px;
        background: var(--jpm-orange);
        color: #111;
        padding: 5px 15px;
        font-weight: 800;
        border-radius: 10px;
        font-size: 0.8rem;
        z-index: 5;
    }

    .warehouse-info h5 {
        font-weight: 700;
        margin-bottom: 5px;
        color: white;
    }

    .warehouse-info p {
        font-size: 0.85rem;
        opacity: 0.8;
        margin-bottom: 0;
    }

    /* ===== VALUES ===== */
    .bg-dark-values {
        background: var(--dark-bg);
        padding: 100px 0;
        color: white;
    }

    .value-box {
        padding: 20px;
        transition: 0.3s;
    }

    .value-box i {
        display: inline-block;
        margin-bottom: 20px;
        transition: 0.3s;
    }

    .value-box:hover i {
        transform: scale(1.2) rotate(5deg);
    }

    /* ===== CTA ===== */
    .cta-card {
        background: var(--jpm-orange);
        border-radius: 40px;
        padding: 80px 40px;
        margin-top: 80px;
        margin-bottom: -100px;
        position: relative;
        z-index: 5;
        text-align: center;
        box-shadow: 0 20px 50px rgba(255, 165, 0, 0.4);
        background: linear-gradient(135deg, #FFA500 0%, #FF8C00 100%);
    }

    .btn-dark-custom {
        background: #111;
        color: white !important;
        padding: 18px 45px;
        border-radius: 50px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: 0.3s;
        border: none;
    }

    .btn-dark-custom:hover {
        background: #222;
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }

    @media (max-width: 768px) {
        .warehouse-img-wrapper { height: 280px; }
        .hero { height: 50vh; }
    }
</style>
@endsection

@section('content')

{{-- 1. Hero Section --}}
<section class="hero">
    <div class="container" data-aos="fade-up">
        <h1>Solusi Konstruksi Terbaik</h1>
        <p>Distributor Resmi Produk Sika & Kontraktor Terpercaya</p>
    </div>
</section>

{{-- 2. Sika Products Showcase --}}
<div class="container product-container">
    <div class="product-card-wrapper text-center">
        <div class="sika-brand-badge">OFFICIAL SIKA PRODUCTS</div>
        <h3 class="fw-bold mb-5" style="letter-spacing: -0.5px;">Material Berkualitas Tinggi untuk Proyek Anda</h3>
        
        <div class="row g-0">
            <div class="col-md-3 col-6">
                <div class="product-item">
                    <i class="bi bi-droplet-half product-icon"></i>
                    <p class="product-name">Waterproofing</p>
                    <p class="product-desc">Solusi anti bocor premium untuk atap, kolam, & basement.</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="product-item">
                    <i class="bi bi-bricks product-icon"></i>
                    <p class="product-name">Flooring</p>
                    <p class="product-desc">Lapisan lantai industri, epoxy, & dekoratif lantai kualitas tinggi.</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="product-item">
                    <i class="bi bi-box-seam product-icon"></i>
                    <p class="product-name">Grouting</p>
                    <p class="product-desc">Pengisi celah beton, baut mesin, & perkuatan struktur utama.</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="product-item">
                    <i class="bi bi-patch-check product-icon"></i>
                    <p class="product-name">Admixture</p>
                    <p class="product-desc">Cairan tambahan kimia beton untuk kekuatan & performa maksimal.</p>
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
                    <h4 class="fw-bold text-warning mb-3"><i class="bi bi-eye-fill me-2"></i> Visi Kami</h4>
                    <p class="text-muted lh-lg" style="font-size: 1.05rem;">
                        Menjadi penyedia solusi material konstruksi dan jasa kontraktor nomor satu di Indonesia yang mengutamakan keaslian produk Sika serta ketepatan aplikasi teknis di lapangan guna membangun infrastruktur yang kokoh dan tahan lama.
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card-visi-misi">
                    <h4 class="fw-bold text-warning mb-3"><i class="bi bi-rocket-takeoff-fill me-2"></i> Misi Kami</h4>
                    <ul class="list-unstyled text-muted lh-lg" style="font-size: 1rem;">
                        <li class="mb-3 d-flex align-items-start">
                            <span class="me-3 text-warning">⭐</span>
                            <span>Menjamin ketersediaan produk Sika original dan rantai pasok yang efisien bagi seluruh klien.</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <span class="me-3 text-warning">⭐</span>
                            <span>Memberikan edukasi teknis dan konsultasi penggunaan material yang tepat sasaran.</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <span class="me-3 text-warning">⭐</span>
                            <span>Menyelesaikan setiap proyek konstruksi dengan standar kualitas internasional dan ketelitian tinggi.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 4. Gudang Kami Section (SESUAI FOTO) --}}
<section class="warehouse-section">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Gudang Kami</h2>
            <p class="text-muted mt-n3">Fasilitas penyimpanan material original untuk memastikan stok selalu tersedia.</p>
            <div class="title-line"></div>
        </div>

        <div class="row g-4 mt-4">
            {{-- Card 1: Fokus pada produk drum/pail biru & semen --}}
            <div class="col-md-4">
                <div class="warehouse-card">
                    <span class="warehouse-badge">PRODUCT</span>
                    <div class="warehouse-img-wrapper">
                        <img src="{{ asset('images/gudang1.jpeg') }}" alt="Gudang JPM Area 1">
                        <div class="warehouse-overlay">
                            <div class="warehouse-info">
                                <h5>Ready Stock</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card 2: Fokus pada deretan pail kuning Sika --}}
            <div class="col-md-4">
                <div class="warehouse-card">
                    <span class="warehouse-badge">PRODUCT</span>
                    <div class="warehouse-img-wrapper">
                        <img src="{{ asset('images/gudang4.jpeg') }}" alt="Gudang JPM Area 2">
                        <div class="warehouse-overlay">
                            <div class="warehouse-info">
                                <h5>Ready Stock</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card 3: Fokus pada tumpukan jerigen kuning --}}
            <div class="col-md-4">
                <div class="warehouse-card">
                    <span class="warehouse-badge">PRODUCT</span>
                    <div class="warehouse-img-wrapper">
                        <img src="{{ asset('images/gudang5.jpeg') }}" alt="Gudang JPM Area 3">
                        <div class="warehouse-overlay">
                            <div class="warehouse-info">
                                <h5>Ready Stock</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  

{{-- 5. Nilai-Nilai Utama --}}
<section class="bg-dark-values text-center">
    <div class="container">
        <h2 class="section-title text-white">Prinsip Kerja Kami</h2>
        <div class="title-line"></div>
        <div class="row mt-5 g-4">
            <div class="col-md-4">
                <div class="value-box">
                    <i class="bi bi-shield-fill-check display-4 text-warning"></i>
                    <h5 class="mt-3 fw-bold text-uppercase" style="letter-spacing: 1px;">Keaslian Produk</h5>
                    <p class="small text-secondary px-lg-4">Kami menjamin 100% keaslian brand Sika langsung dari pabrikan utama untuk keamanan proyek Anda.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="value-box">
                    <i class="bi bi-tools display-4 text-warning"></i>
                    <h5 class="mt-3 fw-bold text-uppercase" style="letter-spacing: 1px;">Tenaga Ahli</h5>
                    <p class="small text-secondary px-lg-4">Dikerjakan oleh aplikator tersertifikasi yang memiliki jam terbang tinggi di berbagai medan proyek.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="value-box">
                    <i class="bi bi-clock-history display-4 text-warning"></i>
                    <h5 class="mt-3 fw-bold text-uppercase" style="letter-spacing: 1px;">Tepat Waktu</h5>
                    <p class="small text-secondary px-lg-4">Manajemen waktu proyek yang presisi dan efisien adalah prioritas utama kami untuk kepuasan mitra.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 6. Call To Action --}}
<div class="container">
    <div class="cta-card shadow-lg">
        <h2 class="fw-bold mb-3 text-white">Butuh Material Sika atau Jasa Konstruksi?</h2>
        <p class="mb-5 text-white opacity-75 fs-5">Hubungi tim ahli PT. Jasa Prima Makmur untuk konsultasi produk gratis dan estimasi biaya proyek Anda.</p>
        <a href="{{ url('/kontak') }}" class="btn btn-dark-custom shadow-lg">
            Hubungi Kami Sekarang <i class="bi bi-arrow-right ms-2"></i>
        </a>
    </div>
</div>

<div style="height: 150px;"></div>

@endsection