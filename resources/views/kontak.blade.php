@extends('layouts.app')

@section('title', 'Kontak Kami | PT. Jasa Prima Makmur')

@section('custom_styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
    :root {
        --primary-orange: #FFA500;
        --dark-navy: #0a192f;
        --glass-white: rgba(255, 255, 255, 0.95);
    }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #f4f7f9;
    }

    /* ===== MODERN HERO ===== */
    .hero-kontak {
        background: linear-gradient(rgba(10, 25, 47, 0.8), rgba(10, 25, 47, 0.8)), 
                    url("{{ asset('images/kontak.jpg') }}") center/cover no-repeat fixed;
        height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
        clip-path: polygon(0 0, 100% 0, 100% 85%, 0% 100%);
    }

    .hero-kontak h1 {
        font-size: 4rem;
        font-weight: 800;
        letter-spacing: -1px;
    }

    /* ===== CONTACT WRAPPER ===== */
    .contact-container {
        margin-top: -120px;
        margin-bottom: 80px;
        position: relative;
        z-index: 20;
    }

    /* Glassmorphism Card */
    .contact-card-main {
        background: var(--glass-white);
        backdrop-filter: blur(10px);
        border-radius: 40px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 25px 50px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    /* Sisi Kiri: Info */
    .info-sidebar {
        background: var(--dark-navy);
        color: white;
        padding: 60px 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .info-sidebar h2 {
        font-weight: 800;
        margin-bottom: 20px;
        color: var(--primary-orange);
    }

    .contact-detail-box {
        display: flex;
        align-items: center;
        margin-bottom: 30px;
        transition: 0.3s;
    }

    .contact-detail-box:hover {
        transform: translateX(10px);
    }

    .icon-box {
        width: 50px;
        height: 50px;
        background: rgba(255, 165, 0, 0.15);
        border: 1px solid var(--primary-orange);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        color: var(--primary-orange);
        margin-right: 20px;
    }

    /* Sisi Kanan: Form */
    .form-content {
        padding: 60px;
    }

    .form-content h3 {
        font-weight: 700;
        margin-bottom: 30px;
        color: var(--dark-navy);
    }

    .form-floating > .form-control:focus ~ label,
    .form-floating > .form-control:not(:placeholder-shown) ~ label {
        color: var(--primary-orange);
    }

    .form-control {
        border: 1px solid #e0e0e0;
        border-radius: 12px;
        padding: 15px;
        background: #f8f9fa;
    }

    .form-control:focus {
        box-shadow: 0 0 15px rgba(255, 165, 0, 0.1);
        border-color: var(--primary-orange);
    }

    .btn-submit {
        background: var(--primary-orange);
        color: white;
        padding: 15px 30px;
        border-radius: 15px;
        font-weight: 700;
        border: none;
        width: 100%;
        transition: 0.4s;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn-submit:hover {
        background: #e69500;
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(255, 165, 0, 0.3);
    }

    /* Map Styling */
    .map-wrapper {
        border-radius: 30px;
        overflow: hidden;
        border: 10px solid white;
        box-shadow: 0 15px 40px rgba(0,0,0,0.05);
    }

    /* Floating WhatsApp Button */
    .wa-float {
        position: fixed;
        bottom: 30px;
        right: 30px;
        background-color: #25d366;
        color: white;
        width: 60px;
        height: 60px;
        border-radius: 50px;
        text-align: center;
        font-size: 30px;
        box-shadow: 2px 5px 15px rgba(0,0,0,0.3);
        z-index: 100;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.3s;
    }

    .wa-float:hover {
        transform: scale(1.1);
        color: white;
    }
</style>
@endsection

@section('content')

{{-- Tombol WA Melayang --}}
<a href="https://wa.me/6281256426582" class="wa-float" target="_blank">
    <i class="bi bi-whatsapp"></i>
</a>

{{-- Hero Section --}}
<section class="hero-kontak">
    <div class="container">
        <h1 class="display-3">Hubungi Kami</h1>
        <p class="lead opacity-75">Solusi Konstruksi Profesional di Kalimantan Barat</p>
    </div>
</section>

{{-- Main Content --}}
<div class="container contact-container">
    <div class="contact-card-main">
        <div class="row g-0">
            
            {{-- Info Sidebar --}}
            <div class="col-lg-5 info-sidebar">
                <h2>Mari Terhubung</h2>
                <p class="opacity-75 mb-5">Kami siap melayani konsultasi pengerjaan struktur, sipil, hingga waterproofing Sika.</p>

                <div class="contact-detail-box">
                    <div class="icon-box"><i class="bi bi-geo-alt-fill"></i></div>
                    <div>
                        <small class="text-warning d-block">Alamat Gudang</small>
                        <strong>Jalan Sei Raya A Ujung, KalBar</strong>
                    </div>
                </div>

                <div class="contact-detail-box">
                    <div class="icon-box"><i class="bi bi-whatsapp"></i></div>
                    <div>
                        <small class="text-warning d-block">WhatsApp Center</small>
                        <strong>+62 812-5642-6582</strong>
                    </div>
                </div>

                <div class="contact-detail-box">
                    <div class="icon-box"><i class="bi bi-envelope-paper-fill"></i></div>
                    <div>
                        <small class="text-warning d-block">Email Support</small>
                        <strong>jasaprimamakmur@gmail.com</strong>
                    </div>
                </div>

            </div>

            {{-- Form Content --}}
            <div class="col-lg-7 form-content">
                <h3>Kirimkan Pesan Anda</h3>
                <form action="#" method="POST">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" placeholder="Nama">
                                <label for="name">Nama Lengkap</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" placeholder="Email">
                                <label for="email">Email Aktif</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="subject" placeholder="Subjek">
                                <label for="subject">Subjek Proyek</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" id="message" style="height: 150px" placeholder="Pesan"></textarea>
                                <label for="message">Ceritakan Kebutuhan Proyek Anda...</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-submit shadow-lg py-3">
                                <i class="bi bi-send-fill me-2"></i> Kirim Pesan Sekarang
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Google Maps Section --}}
<div class="container mb-5 pb-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Lokasi Proyek & Kantor</h2>
        <div style="width: 80px; height: 5px; background: var(--primary-orange); margin: 15px auto;"></div>
    </div>
    <div class="map-wrapper">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15959.227284758!2d109.355!3d-0.088!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d5a2!2sJl.%20Sei%20Raya%20Dalam%2C%20Kalimantan%20Barat!5e0!3m2!1sid!2sid!4v1700000000000" 
            width="100%" 
            height="500" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy">
        </iframe>
    </div>
</div>

@endsection