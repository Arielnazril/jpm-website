@extends('layouts.app')

@section('title', 'Dashboard | PT. Jasa Prima Makmur')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<style>
    /* 🚫 Menghilangkan Navbar Bawaan */
    nav, .navbar, #main-nav, header:not(.admin-header) { 
        display: none !important; 
    }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #f8fafc;
        background-image: radial-gradient(#cbd5e1 0.5px, transparent 0.5px);
        background-size: 24px 24px;
        margin: 0 !important;
        padding: 0 !important;
    }

    /* 🎩 Admin Header Nav (Pojok Kanan Atas) */
    .admin-header {
        position: fixed;
        top: 0;
        right: 0;
        left: 0;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        padding: 0 40px;
        z-index: 1000;
        background: rgba(248, 250, 252, 0.8);
        backdrop-filter: blur(10px);
    }

    .user-profile-dropdown {
        position: relative;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 12px;
        background: white;
        padding: 8px 16px;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    }

    .user-profile-dropdown:hover {
        border-color: #f79e1b;
        box-shadow: 0 10px 15px -3px rgba(247, 158, 27, 0.1);
    }

    .avatar-circle {
        width: 35px;
        height: 35px;
        background: #1e293b;
        color: #f79e1b;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        font-weight: 700;
    }

    /* Dropdown Menu */
    .dropdown-content {
        position: absolute;
        top: calc(100% + 10px);
        right: 0;
        width: 220px;
        background: white;
        border-radius: 20px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        overflow: hidden;
    }

    .user-profile-dropdown:focus-within .dropdown-content {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .dropdown-item {
        padding: 12px 20px;
        display: flex;
        align-items: center;
        gap: 12px;
        color: #475569;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        transition: 0.2s;
    }

    .dropdown-item:hover {
        background: #f8fafc;
        color: #f79e1b;
    }

    .dropdown-item.logout {
        color: #ef4444;
        border-top: 1px solid #f1f5f9;
    }

    /* 🏷️ Dashboard Main Content */
    .dashboard-container {
        padding-top: 100px;
        margin-bottom: 80px;
    }

    .welcome-box {
        background: #1e293b;
        border-radius: 32px;
        padding: 50px 40px;
        color: white;
        margin-bottom: 40px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 25px 50px -12px rgba(30, 41, 59, 0.25);
    }

    .welcome-box::after {
        content: '';
        position: absolute;
        top: -40px;
        right: -40px;
        width: 250px;
        height: 250px;
        background: linear-gradient(135deg, rgba(247, 158, 27, 0.3) 0%, transparent 70%);
        border-radius: 50%;
    }

    .user-highlight { color: #f79e1b; }

    .stat-card-premium {
        background: white;
        border-radius: 24px;
        padding: 28px;
        border: 1px solid rgba(226, 232, 240, 0.8);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        display: flex;
        align-items: center;
        gap: 22px;
        height: 100%;
    }

    .stat-card-premium:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05);
        border-color: #f79e1b;
    }

    .icon-box {
        width: 64px;
        height: 64px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        flex-shrink: 0;
    }

    .action-card {
        background: white;
        border-radius: 40px;
        padding: 50px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
    }

    .status-banner {
        background: #f0fdf4;
        border: 1px solid #dcfce7;
        padding: 22px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
        color: #166534;
        font-weight: 700;
        margin-bottom: 40px;
    }

    .menu-btn {
        padding: 18px 35px;
        border-radius: 22px;
        font-weight: 800;
        transition: 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        text-decoration: none;
    }

    .btn-dark-jpm { background: #1e293b; color: white; }
    .btn-gold-jpm { background: #f79e1b; color: white; }

    .footer-label {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
</style>

<header class="admin-header">
    <div class="user-profile-dropdown" tabindex="0">
        <div class="avatar-circle">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>
        <div class="text-start d-none d-md-block">
            <p class="m-0 fw-bold text-dark small" style="line-height: 1;">{{ Auth::user()->name }}</p>
            <small class="text-muted" style="font-size: 10px;">Administrator</small>
        </div>
        <i class="bi bi-chevron-down text-muted small"></i>

        <div class="dropdown-content">
            <div class="p-3 border-bottom bg-light">
                <p class="m-0 small fw-bold text-dark">Manajemen Akun</p>
            </div>
            <a href="{{ route('profile.edit') }}" class="dropdown-item">
                <i class="bi bi-person-circle text-primary"></i> Lihat Profil
            </a>
            <a href="{{ route('products.index') }}" class="dropdown-item">
                <i class="bi bi-box-seam text-warning"></i> Inventaris Produk
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item logout w-100 border-0 bg-transparent text-start">
                    <i class="bi bi-power"></i> Keluar Sistem
                </button>
            </form>
        </div>
    </div>
</header>

<div class="container dashboard-container">
    <div class="welcome-box shadow-lg">
        <div class="row align-items-center">
            <div class="col-md-9">
                <span class="badge mb-3 shadow-sm" style="background: rgba(255,255,255,0.15); padding: 10px 20px; border-radius: 12px;">Sistem Manajemen JPM v2.0</span>
                <h1 class="display-4 fw-bolder">Halo, <span class="user-highlight">{{ Auth::user()->name }}</span>!</h1>
                <p class="opacity-75 fs-5 mb-0">Selamat datang di pusat kendali operasional PT. Jasa Prima Makmur.</p>
            </div>
            <div class="col-md-3 text-end d-none d-md-block">
                <i class="bi bi-rocket-takeoff" style="font-size: 6rem; opacity: 0.15; transform: rotate(15deg); display: inline-block;"></i>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-lg-4">
            <div class="stat-card-premium shadow-sm">
                <div class="icon-box" style="background: #eff6ff; color: #3b82f6;">
                    <i class="bi bi-shield-check"></i>
                </div>
                <div>
                    <h6 class="text-muted small fw-bold text-uppercase mb-1">Status Keamanan</h6>
                    <span class="fw-extrabold fs-5 text-dark">Tersertifikasi</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="stat-card-premium shadow-sm">
                <div class="icon-box" style="background: #fff7ed; color: #f79e1b;">
                    <i class="bi bi-cpu-fill"></i>
                </div>
                <div>
                    <h6 class="text-muted small fw-bold text-uppercase mb-1">Infrastruktur</h6>
                    <span class="fw-extrabold fs-5 text-dark">Optimal</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="stat-card-premium shadow-sm">
                <div class="icon-box" style="background: #f0fdf4; color: #22c55e;">
                    <i class="bi bi-clock-history"></i>
                </div>
                <div>
                    <h6 class="text-muted small fw-bold text-uppercase mb-1">Sesi Aktif</h6>
                    <span class="fw-extrabold fs-5 text-dark">{{ \Carbon\Carbon::now('Asia/Jakarta')->format('H:i') }} WIB</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="action-card text-center shadow-sm">
                <div class="status-banner">
                    <i class="bi bi-patch-check-fill fs-3 text-success"></i>
                    <span>Sistem Terverifikasi: Dashboard Anda siap mengelola data secara real-time.</span>
                </div>

                <h2 class="fw-extrabold mb-5 text-dark">Pusat Kendali Navigasi</h2>
                
                <div class="row g-4 justify-content-center">
                    <div class="col-md-5 col-lg-4">
                        <a href="{{ route('profile.edit') }}" class="menu-btn btn-dark-jpm shadow-lg">
                            <i class="bi bi-person-lines-fill fs-5"></i>
                            <span>Profil Pengguna</span>
                        </a>
                    </div>
                    <div class="col-md-5 col-lg-4">
                        <a href="{{ route('products.index') }}" class="menu-btn btn-gold-jpm shadow-lg">
                            <i class="bi bi-grid-1x2-fill fs-5"></i>
                            <span>Kelola Produk</span>
                        </a>
                    </div>
                </div>

                <div class="footer-label mt-5 pt-4 border-top">
                    <p class="text-muted small mb-0">&copy; {{ date('Y') }} PT Jasa Prima Makmur &bull; Infrastructure & Excellence</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection