@extends('layouts.app')

@section('title', 'Edit Produk | PT. Jasa Prima Makmur')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<style>
    /* 1. Reset & Global Styles */
    nav, .navbar, #main-nav, header:not(.admin-header) { 
        display: none !important; 
    }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #f8fafc;
        background-image: 
            radial-gradient(at 0% 0%, rgba(247, 158, 27, 0.05) 0px, transparent 50%),
            radial-gradient(at 100% 100%, rgba(30, 41, 59, 0.05) 0px, transparent 50%);
        min-height: 100vh;
        margin: 0;
    }

    /* 2. Admin Floating Header */
    .admin-header {
        position: fixed;
        top: 20px;
        right: 30px;
        z-index: 9999;
    }

    .dropdown-wrapper {
        position: relative;
        padding-bottom: 15px;
    }

    .user-profile-dropdown {
        cursor: pointer;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(12px);
        padding: 6px 16px;
        border-radius: 14px;
        border: 1px solid rgba(226, 232, 240, 0.7);
        box-shadow: 0 10px 30px rgba(0,0,0,0.04);
        display: flex;
        align-items: center;
        gap: 12px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .user-profile-dropdown:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.08);
        border-color: #f79e1b;
    }

    .avatar-circle {
        width: 38px; height: 38px; 
        background: #1e293b; 
        color: #f79e1b;
        display: flex; align-items: center; justify-content: center; 
        border-radius: 12px; font-weight: 800;
        font-size: 1.1rem;
    }

    /* Dropdown Menu Custom */
    .dropdown-menu-custom {
        position: absolute;
        top: 60px;
        right: 0;
        width: 240px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.1);
        border: 1px solid #edf2f7;
        display: none; 
        overflow: hidden;
        z-index: 10000;
    }

    .dropdown-wrapper:hover .dropdown-menu-custom {
        display: block;
        animation: slideIn 0.3s ease-out;
    }

    @keyframes slideIn {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .dropdown-item-custom {
        padding: 14px 20px;
        display: flex;
        align-items: center;
        gap: 12px;
        color: #475569;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.85rem;
        transition: 0.2s;
    }

    .dropdown-item-custom:hover {
        background: #fffbeb;
        color: #f79e1b;
        padding-left: 28px;
    }

    /* 3. Main Form Container */
    .edit-wrapper { 
        padding: 100px 20px 80px; 
        display: flex; 
        justify-content: center; 
    }
    
    .form-container {
        width: 100%; 
        max-width: 850px;
        background: white; 
        border-radius: 35px;
        box-shadow: 0 50px 100px -20px rgba(0,0,0,0.05);
        border: 1px solid #eef2f6; 
        overflow: hidden;
    }

    .form-header {
        background: #1e293b; 
        padding: 45px 50px; 
        color: white;
        display: flex; 
        align-items: center; 
        justify-content: space-between;
    }

    .header-content { display: flex; align-items: center; gap: 20px; }
    .header-content i { 
        font-size: 2.8rem; 
        color: #f79e1b; 
        background: rgba(247, 158, 27, 0.1);
        padding: 15px;
        border-radius: 20px;
    }
    
    .form-header h3 { font-size: 24px; font-weight: 800; margin: 0; letter-spacing: -0.5px; }
    .form-header p { margin: 0; opacity: 0.6; font-size: 0.9rem; }

    /* 4. Form Controls */
    .form-body { padding: 50px; }

    .input-group-custom {
        margin-bottom: 25px;
    }

    .form-label {
        font-weight: 800; 
        color: #1e293b; 
        font-size: 0.75rem;
        text-transform: uppercase; 
        letter-spacing: 1.2px; 
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-label i { color: #f79e1b; font-size: 1rem; }

    .input-wrapper {
        position: relative;
    }

    .form-control {
        width: 100%;
        border-radius: 16px; 
        padding: 15px 20px;
        border: 2px solid #f1f5f9; 
        background: #f8fafc;
        font-weight: 600; 
        color: #1e293b;
        transition: all 0.3s;
        box-sizing: border-box;
    }

    .form-control:focus {
        border-color: #f79e1b; 
        box-shadow: 0 0 0 5px rgba(247, 158, 27, 0.08);
        background: white; 
        outline: none;
    }

    /* 5. Action Buttons */
    .action-area {
        margin-top: 40px;
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 15px;
        align-items: center;
    }

    .btn-update {
        background: #1e293b; 
        color: white; 
        border: none;
        padding: 18px; 
        border-radius: 18px; 
        font-weight: 800;
        font-size: 1rem;
        transition: 0.4s;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .btn-update:hover { 
        background: #f79e1b; 
        transform: translateY(-4px); 
        box-shadow: 0 15px 30px rgba(247, 158, 27, 0.3);
    }

    .btn-cancel {
        background: #f1f5f9;
        color: #64748b;
        padding: 18px;
        border-radius: 18px;
        text-decoration: none;
        text-align: center;
        font-weight: 700;
        transition: 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-cancel:hover { 
        background: #fee2e2; 
        color: #ef4444; 
    }

    /* Responsive */
    @media (max-width: 768px) {
        .action-area { grid-template-columns: 1fr; }
        .form-header { padding: 30px; }
        .form-body { padding: 30px; }
    }
</style>

<header class="admin-header">
    <div class="dropdown-wrapper">
        <div class="user-profile-dropdown">
            <div class="avatar-circle">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
            <div class="text-start d-none d-md-block">
                <p class="m-0 fw-bold text-dark small" style="line-height: 1;">{{ Auth::user()->name }}</p>
                <small class="text-muted" style="font-size: 10px;">Administrator</small>
            </div>
            <i class="bi bi-chevron-down text-muted small"></i>
        </div>

        <div class="dropdown-menu-custom">
            <div class="px-4 py-3 border-bottom bg-light">
                <small class="text-muted fw-bold" style="font-size: 9px; text-transform: uppercase; letter-spacing: 1px;">Navigasi Sistem</small>
            </div>
            <a href="{{ url('/dashboard') }}" class="dropdown-item-custom">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>
            <a href="{{ url('/products') }}" class="dropdown-item-custom">
                <i class="bi bi-archive-fill"></i> Database Produk
            </a>
            <hr class="m-0" style="opacity: 0.05;">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item-custom w-100 border-0 bg-transparent text-danger">
                    <i class="bi bi-box-arrow-right"></i> Keluar Sistem
                </button>
            </form>
        </div>
    </div>
</header>

<div class="edit-wrapper">
    <div class="form-container">
        <div class="form-header">
            <div class="header-content">
                <i class="bi bi-pencil-square"></i>
                <div>
                    <h3>Perbarui Informasi Produk</h3>
                    <p>Silahkan sesuaikan data inventaris di bawah ini</p>
                </div>
            </div>
            <img src="{{ asset('images/logo-jpm.png') }}" alt="Logo JPM" style="height: 45px; opacity: 0.2; filter: brightness(0) invert(1);">
        </div>

        <div class="form-body">
            <form action="{{ url('/products/'.$product->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-12 input-group-custom">
                        <label class="form-label"><i class="bi bi-tag"></i> Nama Produk Resmi</label>
                        <input type="text" name="nama_produk" class="form-control" value="{{ old('nama_produk', $product->nama_produk) }}" placeholder="Contoh: SikaTop 107 Seal" required>
                    </div>

                    <div class="col-md-6 input-group-custom">
                        <label class="form-label"><i class="bi bi-box-seam"></i> Tipe Kemasan</label>
                        <input type="text" name="kemasan" class="form-control" value="{{ old('kemasan', $product->kemasan) }}" placeholder="Contoh: Set (A+B)" required>
                    </div>

                    <div class="col-md-6 input-group-custom">
                        <label class="form-label"><i class="bi bi-layers"></i> Kategori Produk</label>
                        <input type="text" name="produk" class="form-control" value="{{ old('produk', $product->produk) }}" placeholder="Contoh: Waterproofing" required>
                    </div>

                    <div class="col-md-6 input-group-custom">
                        <label class="form-label"><i class="bi bi-moisture"></i> Berat / Volume</label>
                        <input type="text" name="berat" class="form-control" value="{{ old('berat', $product->berat) }}" placeholder="Contoh: 25 Kg" required>
                    </div>

                    <div class="col-md-6 input-group-custom">
                        <label class="form-label"><i class="bi bi-hash"></i> Kuantitas Satuan</label>
                        <input type="number" name="per_satuan" class="form-control" value="{{ old('per_satuan', $product->per_satuan) }}" required>
                    </div>

                    <div class="col-md-12 input-group-custom">
                        <label class="form-label"><i class="bi bi-cash-stack"></i> Estimasi Harga Satuan (Rp)</label>
                        <input type="text" name="satuan" class="form-control" value="{{ old('satuan', $product->satuan) }}" placeholder="Masukkan nominal tanpa titik/koma" required>
                    </div>
                </div>

                <div class="action-area">
                    <button type="submit" class="btn-update">
                        <i class="bi bi-check-all"></i> Konfirmasi & Simpan Perubahan
                    </button>
                    
                    <a href="{{ url('/products') }}" class="btn-cancel">
                        <i class="bi bi-arrow-left"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection