@extends('layouts.app')

@section('title', 'Edit Profil | PT. Jasa Prima Makmur')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<style>
    /* 🚫 Sembunyikan Navbar Bawaan */
    nav, .navbar, #main-nav, header:not(.admin-header) { 
        display: none !important; 
    }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #f8fafc;
        background-image: 
            radial-gradient(at 0% 0%, rgba(247, 158, 27, 0.05) 0px, transparent 50%),
            radial-gradient(at 100% 0%, rgba(30, 41, 59, 0.05) 0px, transparent 50%);
        min-height: 100vh;
        margin: 0;
    }

    /* 🎩 Floating Admin Header & Rundown Fix */
    .admin-header {
        position: fixed;
        top: 25px;
        right: 40px;
        z-index: 1000;
    }

    .user-profile-wrapper {
        position: relative;
        padding-bottom: 20px; /* Jembatan invisible agar menu tidak hilang saat kursor pindah */
    }

    .user-profile-dropdown {
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 12px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(15px);
        padding: 8px 18px;
        border-radius: 50px;
        border: 1px solid rgba(226, 232, 240, 0.8);
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        transition: 0.3s;
    }

    .user-profile-wrapper:hover .user-profile-dropdown {
        border-color: #f79e1b;
        transform: translateY(-2px);
        background: white;
    }

    .avatar-circle {
        width: 35px;
        height: 35px;
        background: #1e293b;
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
        top: 55px;
        right: 0;
        width: 240px;
        background: white;
        border-radius: 22px;
        border: 1px solid #f1f5f9;
        box-shadow: 0 20px 40px rgba(0,0,0,0.12);
        display: none;
        overflow: hidden;
        z-index: 1001;
    }

    /* Munculkan menu saat hover wrapper */
    .user-profile-wrapper:hover .dropdown-content { 
        display: block; 
        animation: rundownSlide 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }

    @keyframes rundownSlide {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .menu-header-label {
        padding: 15px 20px 5px;
        font-size: 0.65rem;
        font-weight: 800;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .dropdown-item {
        padding: 12px 20px;
        display: flex;
        align-items: center;
        gap: 12px;
        color: #475569;
        text-decoration: none;
        font-weight: 700;
        font-size: 0.85rem;
        transition: 0.2s;
    }

    .dropdown-item i { font-size: 1.1rem; color: #64748b; }

    .dropdown-item:hover {
        background: #f8fafc;
        color: #1e293b;
    }

    .dropdown-item:hover i { color: #f79e1b; }

    .btn-logout-item {
        width: 100%;
        border: none;
        background: none;
        border-top: 1px solid #f1f5f9;
        padding: 15px 20px;
        color: #ef4444 !important;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 700;
        font-size: 0.85rem;
    }

    .btn-logout-item:hover { background: #fef2f2; }

    /* 📝 Master Profile Card Styling */
    .profile-container {
        padding: 120px 20px 60px;
        display: flex;
        justify-content: center;
    }

    .profile-card {
        background: white;
        border-radius: 40px;
        border: 1px solid #f1f5f9;
        width: 100%;
        max-width: 650px;
        overflow: hidden;
        box-shadow: 0 30px 60px -12px rgba(0, 0, 0, 0.05);
    }

    .card-header-premium {
        background: #1e293b;
        padding: 60px 40px;
        text-align: center;
        position: relative;
    }

    .profile-icon-box {
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border-radius: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: #f79e1b;
        font-size: 2rem;
    }

    .card-body-premium {
        padding: 50px;
    }

    .form-label {
        font-weight: 800;
        color: #1e293b;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 10px;
        display: block;
    }

    .form-control {
        border-radius: 15px;
        padding: 15px 20px;
        border: 2px solid #f1f5f9;
        background: #f8fafc;
        font-weight: 600;
        color: #334155;
        transition: 0.3s;
    }

    .form-control:focus {
        background: white;
        border-color: #f79e1b;
        box-shadow: 0 0 0 4px rgba(247, 158, 27, 0.1);
        outline: none;
    }

    .btn-save-profile {
        width: 100%;
        background: #1e293b;
        color: white;
        border: none;
        padding: 18px;
        border-radius: 18px;
        font-weight: 800;
        margin-top: 20px;
        transition: 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .btn-save-profile:hover {
        background: #f79e1b;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(247, 158, 27, 0.2);
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 30px 0 20px;
        color: #94a3b8;
    }

    .section-title hr { flex: 1; border-color: #f1f5f9; opacity: 1; }
    .section-title span { font-size: 0.7rem; font-weight: 800; text-transform: uppercase; }
</style>

<header class="admin-header">
    <div class="user-profile-wrapper">
        <div class="user-profile-dropdown">
            <div class="avatar-circle">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div class="text-start d-none d-md-block">
                <p class="m-0 fw-800 text-dark" style="font-size: 0.85rem; line-height: 1;">{{ Auth::user()->name }}</p>
                <small class="text-success fw-bold" style="font-size: 10px;">Executive Admin</small>
            </div>
            <i class="bi bi-chevron-down text-muted small ms-1"></i>
        </div>

        <div class="dropdown-content">
            <div class="menu-header-label">Akses Kendali</div>
            <a href="{{ url('/home') }}" class="dropdown-item">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard Utama
            </a>
            <a href="{{ route('products.index') }}" class="dropdown-item">
                <i class="bi bi-box-seam-fill"></i> Katalog Produk
            </a>
            <a href="{{ url('/profile') }}" class="dropdown-item" style="color: #f79e1b;">
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

<div class="container profile-container">
    <div class="profile-card">
        <div class="card-header-premium">
            <div class="profile-icon-box">
                <i class="bi bi-shield-lock-fill"></i>
            </div>
            <h3 class="fw-800 text-white mb-1">Manajemen Profil</h3>
            <p class="text-white opacity-50 small mb-0">Perbarui informasi identitas dan keamanan akun Anda</p>
        </div>

        <div class="card-body-premium">
            @if (session('success'))
                <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4 p-3 d-flex align-items-center gap-3" style="background: #f0fdf4; color: #166534;">
                    <i class="bi bi-check-circle-fill fs-4"></i>
                    <span class="fw-bold">{{ session('success') }}</span>
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
                    <label class="form-label">Alamat Email</label>
                    <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
                </div>

                <div class="section-title">
                    <span>Keamanan Password</span>
                    <hr>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Password Baru</label>
                        <input type="password" name="password" class="form-control" placeholder="••••••••">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="••••••••">
                    </div>
                </div>
                <small class="text-muted d-block mt-3">
                    <i class="bi bi-info-circle me-1"></i> Kosongkan jika tidak ingin mengganti password.
                </small>

                <button type="submit" class="btn-save-profile">
                    <i class="bi bi-shield-check fs-5"></i> Simpan Perubahan Akun
                </button>
            </form>
        </div>
    </div>
</div>

<footer class="text-center pb-5">
    <p class="text-muted small" style="letter-spacing: 1px;">
        &copy; {{ date('Y') }} <strong>PT Jasa Prima Makmur</strong>.
    </p>
</footer>
@endsection