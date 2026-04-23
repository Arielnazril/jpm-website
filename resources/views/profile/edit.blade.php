@extends('layouts.app')

@section('title', 'Edit Profil | PT. Jasa Prima Makmur')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<style>
    /* 🚫 Sembunyikan Navbar Bawaan */
    nav, .navbar, #main-nav, header:not(.admin-header) { 
        display: none !important; 
    }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #f8fafc;
        background-image: 
            radial-gradient(at 0% 0%, rgba(247, 158, 27, 0.08) 0px, transparent 50%),
            radial-gradient(at 100% 0%, rgba(30, 41, 59, 0.08) 0px, transparent 50%);
        min-height: 100vh;
        margin: 0;
    }

    /* 🎩 Floating Admin Header */
    .admin-header {
        position: fixed;
        top: 25px;
        right: 40px;
        z-index: 1000;
    }

    .user-profile-wrapper {
        position: relative;
        padding-bottom: 20px; 
    }

    .user-profile-dropdown {
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 12px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(15px);
        padding: 10px 22px;
        border-radius: 50px;
        border: 1px solid rgba(226, 232, 240, 0.8);
        box-shadow: 0 15px 35px rgba(0,0,0,0.08);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .user-profile-wrapper:hover .user-profile-dropdown {
        border-color: #f79e1b;
        transform: translateY(-3px) scale(1.02);
        background: white;
    }

    .avatar-circle {
        width: 38px;
        height: 38px;
        background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
        color: #f79e1b;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-weight: 800;
        border: 2px solid white;
    }

    .dropdown-content {
        position: absolute;
        top: 65px;
        right: 0;
        width: 260px;
        background: white;
        border-radius: 25px;
        border: 1px solid rgba(241, 245, 249, 0.8);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        display: none;
        overflow: hidden;
        z-index: 1001;
    }

    .user-profile-wrapper:hover .dropdown-content { 
        display: block; 
        animation: rundownSlide 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    @keyframes rundownSlide {
        from { opacity: 0; transform: translateY(20px) scale(0.95); }
        to { opacity: 1; transform: translateY(0) scale(1); }
    }

    .menu-header-label {
        padding: 18px 25px 8px;
        font-size: 0.7rem;
        font-weight: 800;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 1.5px;
    }

    .dropdown-item {
        padding: 14px 25px;
        display: flex;
        align-items: center;
        gap: 15px;
        color: #475569;
        text-decoration: none;
        font-weight: 700;
        font-size: 0.9rem;
        transition: 0.3s;
    }

    .dropdown-item:hover { background: #f8fafc; color: #1e293b; padding-left: 30px; }
    .dropdown-item:hover i { color: #f79e1b; }

    .btn-logout-item {
        width: 100%;
        border: none;
        background: none;
        border-top: 1px solid #f1f5f9;
        padding: 18px 25px;
        color: #ef4444 !important;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 15px;
        font-weight: 700;
        font-size: 0.9rem;
    }

    /* 📝 Master Profile Card Styling */
    .profile-container {
        padding: 120px 20px 80px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .profile-card {
        background: white;
        border-radius: 45px;
        border: 1px solid rgba(241, 245, 249, 0.7);
        width: 100%;
        max-width: 700px;
        overflow: hidden;
        box-shadow: 0 40px 100px -20px rgba(30, 41, 59, 0.1);
    }

    .card-header-premium {
        background: #1e293b;
        background-image: linear-gradient(45deg, #1e293b 0%, #334155 100%);
        padding: 70px 50px;
        text-align: center;
        position: relative;
    }

    .card-header-premium::after {
        content: "";
        position: absolute;
        bottom: 0; left: 0; right: 0;
        height: 40px;
        background: white;
        clip-path: ellipse(50% 100% at 50% 100%);
    }

    .profile-icon-box {
        width: 90px;
        height: 90px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(12px);
        border-radius: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #f79e1b;
        font-size: 2.5rem;
    }

    .card-body-premium { padding: 40px 60px 60px; }

    .form-label {
        font-weight: 800;
        color: #64748b;
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 12px;
        display: block;
    }

    .form-control {
        border-radius: 20px;
        padding: 18px 25px;
        border: 2px solid #f1f5f9;
        background: #f8fafc;
        font-weight: 700;
        color: #1e293b;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        background: white;
        border-color: #f79e1b;
        box-shadow: 0 10px 25px rgba(247, 158, 27, 0.1);
        outline: none;
    }

    .btn-save-profile {
        width: 100%;
        background: #1e293b;
        color: white;
        border: none;
        padding: 20px;
        border-radius: 22px;
        font-weight: 800;
        margin-top: 25px;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
    }

    .btn-save-profile:hover {
        background: #f79e1b;
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(247, 158, 27, 0.25);
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: 15px;
        margin: 40px 0 25px;
    }

    .section-title hr { flex: 1; border-color: #f1f5f9; opacity: 1; border-width: 2px; }
    .section-title span { font-size: 0.75rem; font-weight: 800; text-transform: uppercase; color: #94a3b8; }

    /* 📱 MOBILE OPTIMIZATION (FOKUS DI SINI) */
    @media (max-width: 768px) {
        .admin-header {
            top: 15px;
            right: 15px;
        }
        
        .user-profile-dropdown {
            padding: 8px 12px; /* Lebih compact di HP */
        }

        .profile-container {
            padding: 90px 15px 40px; /* Jarak atas dikurangi agar tidak terlalu jauh melayang */
        }

        .profile-card {
            border-radius: 30px; /* Lengkungan lebih kecil agar tidak makan ruang */
        }

        .card-header-premium {
            padding: 40px 25px; /* Kurangi padding tinggi header */
        }

        .profile-icon-box {
            width: 70px;
            height: 70px;
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .card-header-premium h2 {
            font-size: 1.5rem !important;
        }

        .card-body-premium {
            padding: 30px 25px 40px; /* Padding samping dikecilkan agar input lebih lebar */
        }

        .form-control {
            padding: 14px 18px; /* Input tidak terlalu "gemuk" di layar kecil */
            font-size: 0.9rem;
        }

        .btn-save-profile {
            padding: 16px;
            font-size: 0.95rem;
            border-radius: 18px;
        }

        .dropdown-content {
            right: -5px; /* Geser sedikit agar tidak terpotong layar */
            width: 220px;
        }
    }
</style>

{{-- 🎩 HEADER ADMIN --}}
<header class="admin-header animate__animated animate__fadeInDown">
    <div class="user-profile-wrapper">
        <div class="user-profile-dropdown">
            <div class="avatar-circle">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div class="text-start d-none d-md-block">
                <p class="m-0 fw-800 text-dark" style="font-size: 0.9rem; line-height: 1;">{{ Auth::user()->name }}</p>
                <small class="text-warning fw-bold" style="font-size: 10px;">EXECUTIVE ADMIN</small>
            </div>
            <i class="bi bi-chevron-down text-muted small ms-2"></i>
        </div>

        <div class="dropdown-content">
            <div class="menu-header-label">Panel Kendali</div>
            <a href="{{ url('/dashboard') }}" class="dropdown-item">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard Utama
            </a>
            <a href="{{ route('products.index') }}" class="dropdown-item">
                <i class="bi bi-box-seam-fill"></i> Katalog Produk
            </a>
            <a href="{{ url('/profile') }}" class="dropdown-item" style="color: #f79e1b; background: #fffaf0;">
                <i class="bi bi-person-gear"></i> Setelan Profil
            </a>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout-item">
                    <i class="bi bi-power"></i> Keluar Sistem
                </button>
            </form>
        </div>
    </div>
</header>

{{-- 📝 PROFILE CONTENT --}}
<div class="container profile-container">
    <div class="profile-card animate__animated animate__fadeInUp">
        <div class="card-header-premium">
            <div class="profile-icon-box">
                <i class="bi bi-shield-lock-fill"></i>
            </div>
            <h2 class="fw-800 text-white mb-2">Manajemen Akun</h2>
            <p class="text-white opacity-50 small mb-0">Kelola identitas admin Anda</p>
        </div>

        <div class="card-body-premium">
            @if (session('success'))
                <div class="alert alert-success border-0 rounded-4 p-3 mb-4 d-flex align-items-center gap-3" style="background: #f0fdf4; color: #166534;">
                    <i class="bi bi-check-circle-fill"></i>
                    <span class="fw-bold small">{{ session('success') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Alamat Email Resmi</label>
                    <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
                </div>

                <div class="section-title">
                    <span>Otoritas Keamanan</span>
                    <hr>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Password Baru</label>
                        <input type="password" name="password" class="form-control" placeholder="••••••••">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Konfirmasi</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="••••••••">
                    </div>
                </div>

                <button type="submit" class="btn-save-profile">
                    <i class="bi bi-shield-check-fill fs-5"></i> Simpan Konfigurasi
                </button>
            </form>
        </div>
    </div>
</div>

<footer class="text-center pb-5 mt-4">
    <p class="text-muted small" style="letter-spacing: 1.5px; opacity: 0.6;">
        &copy; {{ date('Y') }} <span class="fw-800 text-dark">PT JASA PRIMA MAKMUR</span>
    </p>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('focus', () => input.parentElement.querySelector('.form-label').style.color = '#f79e1b');
            input.addEventListener('blur', () => input.parentElement.querySelector('.form-label').style.color = '#64748b');
        });
    });
</script>
@endsection