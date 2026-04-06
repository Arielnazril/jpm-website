@extends('layouts.app')

@section('title', 'Bisnis Kami | PT. Jasa Prima Makmur')

@section('custom_styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
{{-- Memastikan versi terbaru Bootstrap Icons agar semua ikon terpanggil --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
    :root {
        --primary-orange: #FFA500;
        --sika-red: #ed1c24;
    }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* ===== HERO SECTION ===== */
    .hero-bisnis {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                    url("{{ asset('images/bisnis.jpg') }}") center/cover no-repeat fixed;
        height: 50vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
        border-bottom: 8px solid var(--primary-orange);
    }

    .hero-bisnis h1 {
        font-size: 3.5rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    /* ===== SERVICE CARDS ===== */
    .service-section {
        padding: 100px 0;
        background: #fff;
    }

    .service-card {
        border: none;
        border-radius: 25px;
        background: #ffffff;
        padding: 40px;
        transition: 0.4s;
        height: 100%;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        border-top: 5px solid transparent;
    }

    .service-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 20px 50px rgba(0,0,0,0.1);
        border-top: 5px solid var(--primary-orange);
    }

    .service-icon {
        width: 80px;
        height: 80px;
        background: rgba(255, 165, 0, 0.1);
        color: var(--primary-orange);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.8rem; /* Ukuran diperbesar sedikit */
        margin-bottom: 25px;
    }

    /* ===== SIKA PRODUCT GRID ===== */
    .sika-section {
        background: #111;
        padding: 100px 0;
        color: white;
    }

    .sika-badge {
        background: var(--sika-red);
        color: white;
        padding: 5px 15px;
        border-radius: 5px;
        font-weight: 800;
        font-size: 0.8rem;
        display: inline-block;
        margin-bottom: 10px;
    }

    .sika-item {
        background: #1a1a1a;
        padding: 30px;
        border-radius: 20px;
        border: 1px solid #333;
        transition: 0.3s;
    }

    .sika-item:hover {
        border-color: var(--primary-orange);
        background: #222;
    }

    .sika-item i {
        color: var(--primary-orange);
        font-size: 2rem;
        margin-bottom: 15px;
        display: block;
    }

    .section-title {
        font-weight: 800;
        font-size: 2.5rem;
        margin-bottom: 50px;
    }
</style>
@endsection

@section('content')

{{-- Hero Section --}}
<section class="hero-bisnis">
    <div class="container">
        <h1>Layanan & Bisnis</h1>
        <p class="fs-5 opacity-75">Solusi Menyeluruh untuk Konstruksi Modern dan Material Berkualitas</p>
    </div>
</section>

{{-- Layanan Utama --}}
<section class="service-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Solusi Konstruksi Kami</h2>
            <p class="text-muted mx-auto" style="max-width: 700px;">Kami mengintegrasikan pengalaman lapangan bertahun-tahun dengan teknik modern untuk memberikan hasil terbaik pada setiap proyek.</p>
        </div>

        <div class="row g-4">
            {{-- 1. Konstruksi Gedung --}}
            <div class="col-md-4">
                <div class="service-card text-center">
                    <div class="service-icon mx-auto">
                        <i class="bi bi-buildings"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Konstruksi Gedung</h4>
                    <p class="text-muted">Pembangunan gedung perkantoran, fasilitas publik, dan area komersial dengan manajemen proyek yang ketat.</p>
                </div>
            </div>

            {{-- 2. Teknik Sipil (Ikon Diganti ke bi-cone-striped agar pasti muncul) --}}
            <div class="col-md-4">
                <div class="service-card text-center">
                    <div class="service-icon mx-auto">
                        <i class="bi bi-cone-striped"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Jasa Kontruksi</h4>
                    <p class="text-muted">Spesialisasi dalam struktur berat termasuk jembatan, jalan raya, dan fondasi infrastruktur strategis.</p>
                </div>
            </div>

            {{-- 3. Renovasi & Perawatan --}}
            <div class="col-md-4">
                <div class="service-card text-center">
                    <div class="service-icon mx-auto">
                        <i class="bi bi-paint-bucket"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Renovasi & Perawatan</h4>
                    <p class="text-muted">Layanan pemeliharaan struktur dan peremajaan bangunan guna memastikan aset Anda tetap prima.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Brand Sika Showcase --}}
<section class="sika-section">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <div class="sika-badge">JENIS PRODUCT</div>
                <h2 class="fw-bold display-5">Solusi Produk Sika</h2>
                <p class="text-secondary">Sebagai distributor dan aplikator resmi, kami menyediakan rangkaian produk Sika untuk menjamin ketahanan bangunan Anda.</p>
            </div>
            <div class="col-lg-6 text-lg-end">
                <a href="{{ url('/kontak') }}" class="btn btn-warning btn-lg px-4 rounded-pill fw-bold">Pesan Material</a>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-3">
                <div class="sika-item">
                    <i class="bi bi-water"></i>
                    <h5 class="fw-bold">Waterproofing</h5>
                    <p class="small text-secondary">Sistem pelapis kedap air untuk atap, dak beton, dan area basah.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="sika-item">
                    <i class="bi bi-layers"></i>
                    <h5 class="fw-bold">Flooring Systems</h5>
                    <p class="small text-secondary">Pelapis lantai epoxy dan pengeras beton (Floor Hardener).</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="sika-item">
                    <i class="bi bi-bounding-box-circles"></i>
                    <h5 class="fw-bold">Grouting & Repair</h5>
                    <p class="small text-secondary">Material pengisi celah beton dan perbaikan struktur retak.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="sika-item">
                    <i class="bi bi-shield-shaded"></i>
                    <h5 class="fw-bold">Sealing & Bonding</h5>
                    <p class="small text-secondary">Sealant berkualitas tinggi untuk sambungan konstruksi dan fasad.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-5 bg-warning text-dark text-center">
    <div class="container">
        <h3 class="fw-bold mb-3">Ingin Konsultasi Mengenai Layanan Kami?</h3>
        <p class="mb-4">Tim teknis kami siap memberikan solusi terbaik bagi proyek Anda.</p>
        <a href="{{ url('/kontak') }}" class="btn btn-dark btn-lg px-5 rounded-pill fw-bold">Hubungi Kami</a>
    </div>
</section>

@endsection