@extends('layouts.app')

@section('title', 'Katalog Produk Premium | PT. Jasa Prima Makmur')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<style>
    /* --- 1. Global Reset --- */
    nav, .navbar, #main-nav, header:not(.admin-header) { display: none !important; }
    
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #f0f4f8;
        background-image: 
            radial-gradient(circle at 10% 20%, rgba(247, 158, 27, 0.05) 0%, transparent 40%),
            radial-gradient(circle at 90% 80%, rgba(30, 41, 59, 0.05) 0%, transparent 40%);
        color: #1e293b;
        margin: 0;
    }

    /* --- 2. Floating Admin Header & Rundown Menu --- */
    .admin-header {
        position: fixed; top: 25px; right: 50px; z-index: 1000;
    }

    .user-profile-wrapper {
        position: relative;
        display: inline-block;
    }

    .user-pill {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(15px);
        padding: 8px 8px 8px 20px;
        border-radius: 50px;
        border: 1px solid rgba(255, 255, 255, 0.6);
        display: flex; align-items: center; gap: 15px;
        cursor: pointer;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .user-pill:hover {
        transform: translateY(-2px);
        border-color: #f79e1b;
        background: white;
    }

    .avatar-box {
        width: 40px; height: 40px;
        background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
        color: #f79e1b; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-weight: 800; border: 2px solid white;
    }

    /* Rundown Dropdown Box */
    .dropdown-rundown {
        position: absolute;
        top: calc(100% + 15px);
        right: 0;
        width: 250px;
        background: white;
        border-radius: 24px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.15);
        border: 1px solid #f1f5f9;
        padding: 12px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .user-profile-wrapper:hover .dropdown-rundown {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .menu-label {
        padding: 10px 15px;
        font-size: 0.65rem;
        font-weight: 800;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 1.5px;
    }

    .menu-item {
        display: flex; align-items: center; gap: 12px;
        padding: 12px 15px;
        color: #475569;
        text-decoration: none;
        font-weight: 700;
        font-size: 0.9rem;
        border-radius: 15px;
        transition: 0.2s;
    }

    .menu-item i { font-size: 1.1rem; color: #64748b; }

    .menu-item:hover {
        background: #f8fafc;
        color: #1e293b;
    }

    .menu-item:hover i { color: #f79e1b; }

    .menu-item.logout {
        color: #ef4444;
        margin-top: 5px;
        border-top: 1px solid #f1f5f9;
        padding-top: 15px;
        border-radius: 0 0 15px 15px;
    }

    .menu-item.logout:hover { background: #fef2f2; color: #dc2626; }

    /* --- 3. Dashboard Content Layout --- */
    .wrapper {
        padding: 120px 50px 50px;
        max-width: 1600px;
        margin: 0 auto;
    }

    .action-bar {
        display: flex; justify-content: space-between; align-items: flex-end;
        margin-bottom: 40px;
    }

    .welcome-text h1 {
        font-weight: 800; font-size: 2.2rem; letter-spacing: -1.5px;
        background: linear-gradient(90deg, #1e293b, #f79e1b);
        -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        margin: 0;
    }

    .stats-row {
        display: grid; grid-template-columns: repeat(4, 1fr); gap: 25px;
        margin-bottom: 40px;
    }

    .glass-card {
        background: white; border-radius: 30px; padding: 25px;
        border: 1px solid rgba(255,255,255,0.8);
        box-shadow: 0 20px 40px rgba(0,0,0,0.02);
        transition: 0.3s;
    }

    .glass-card:hover { transform: translateY(-10px); }

    .stat-label { font-size: 0.75rem; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 1px; }
    .stat-value { font-size: 1.8rem; font-weight: 800; display: block; margin: 5px 0; color: #1e293b; }

    /* --- 4. Table Styling --- */
    .main-container {
        background: white; border-radius: 40px;
        box-shadow: 0 40px 100px rgba(0,0,0,0.04);
        overflow: hidden; border: 1px solid #f1f5f9;
    }

    .table-header-tool {
        padding: 30px 40px; border-bottom: 1px solid #f1f5f9;
        display: flex; justify-content: space-between; align-items: center;
        background: #fafbfc;
    }

    .search-input-group {
        background: white; border: 1px solid #e2e8f0;
        padding: 10px 20px; border-radius: 15px; width: 400px;
        display: flex; align-items: center; gap: 15px;
    }

    .search-input-group input { border: none; outline: none; width: 100%; font-weight: 600; background: transparent; }

    .custom-table thead th {
        padding: 25px 40px; background: white;
        color: #94a3b8; font-weight: 800; font-size: 0.7rem;
        text-transform: uppercase; letter-spacing: 1.5px; border: none;
    }

    .custom-table tbody td { padding: 25px 40px; border-top: 1px solid #f8fafc; vertical-align: middle; }
    
    .product-name { font-weight: 800; color: #1e293b; font-size: 1.05rem; }
    
    .badge-premium { padding: 8px 16px; border-radius: 12px; font-weight: 800; font-size: 0.75rem; }
    .badge-kemasan { background: #f1f5f9; color: #475569; }
    .badge-kategori { background: #eff6ff; color: #2563eb; }
    
    .price-display {
        font-size: 1.1rem; font-weight: 800; color: #1e293b;
        background: #f8fafc; padding: 10px 20px; border-radius: 15px;
    }

    .btn-action {
        width: 45px; height: 45px; border-radius: 15px;
        display: inline-flex; align-items: center; justify-content: center;
        transition: 0.3s; border: none; text-decoration: none;
    }

    .btn-edit { background: #eff6ff; color: #2563eb; }
    .btn-delete { background: #fff1f2; color: #e11d48; }

    .btn-create {
        background: #1e293b; color: white; padding: 15px 35px;
        border-radius: 20px; font-weight: 800; text-decoration: none;
        display: flex; align-items: center; gap: 12px;
        box-shadow: 0 10px 25px rgba(30, 41, 59, 0.2);
    }
    
    .btn-create:hover { background: #f79e1b; color: white; transform: translateY(-3px); }
</style>

<header class="admin-header">
    <div class="user-profile-wrapper">
        <div class="user-pill">
            <div class="text-end d-none d-md-block">
                <div class="fw-800" style="font-size: 0.85rem; line-height: 1;">{{ Auth::user()->name }}</div>
                <small class="text-success fw-bold" style="font-size: 10px;">Executive Admin</small>
            </div>
            <div class="avatar-box">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <i class="bi bi-chevron-down text-muted small"></i>
        </div>

        <div class="dropdown-rundown">
            <div class="menu-label">Navigasi Rundown</div>
            
            <a href="{{ url('/home') }}" class="menu-item">
                <i class="bi bi-grid-1x2-fill"></i>
                Dashboard Utama
            </a>
            
            <a href="{{ url('/profile') }}" class="menu-item">
                <i class="bi bi-person-gear"></i>
                Setelan Profil
            </a>

            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                @csrf
                <a href="#" class="menu-item logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-power"></i>
                    Keluar Sistem
                </a>
            </form>
        </div>
    </div>
</header>

<div class="wrapper">
    <div class="action-bar">
        <div class="welcome-text">
            <small class="fw-800 text-warning text-uppercase" style="letter-spacing: 2px;">Asset Management</small>
            <h1>Katalog Produk JPM</h1>
        </div>
        <a href="{{ url('/products/create') }}" class="btn-create">
            <i class="bi bi-plus-circle-fill"></i> Tambah Produk Baru
        </a>
    </div>

    <div class="stats-row">
        <div class="glass-card">
            <span class="stat-label">Total Inventaris</span>
            <span class="stat-value">{{ count($products) }}</span>
            <span class="badge bg-success-subtle text-success border-0 small px-2 py-1 rounded-pill" style="font-size: 0.7rem;">
                <i class="bi bi-check-circle"></i> Terkini
            </span>
        </div>

        <div class="glass-card">
            <span class="stat-label">Varian Kategori</span>
            <span class="stat-value">{{ $products->unique('produk')->count() }}</span>
            <small class="text-muted fw-bold">Jenis Produk Aktif</small>
        </div>

        <div class="glass-card">
            <span class="stat-label">Nilai Rata-rata</span>
            @php
                $avgPrice = $products->whereNotNull('satuan')->filter(fn($p) => is_numeric($p->satuan))->avg('satuan');
            @endphp
            <span class="stat-value" style="font-size: 1.4rem;">
                Rp {{ number_format($avgPrice ?? 0, 0, ',', '.') }}
            </span>
            <small class="text-muted fw-bold">Per Satuan Aset</small>
        </div>

        <div class="glass-card" style="background: linear-gradient(135deg, #1e293b 0%, #334155 100%); color: white;">
            <span class="stat-label" style="color: rgba(255,255,255,0.5);">Update Terakhir</span>
            <span class="stat-value" style="font-size: 1.2rem; margin-top: 15px; color: white;">
                {{ date('d M Y') }}
            </span>
            <small class="fw-bold" style="color: #f79e1b;">System Synchronized</small>
        </div>
    </div>

    <div class="main-container">
        <div class="table-header-tool">
            <div class="search-input-group">
                <i class="bi bi-search text-muted"></i>
                <input type="text" id="searchInput" placeholder="Cari nama produk...">
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-light rounded-pill px-4 fw-800 border small"><i class="bi bi-filter"></i> Filter</button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th width="80">No.</th>
                        <th>Nama Produk</th>
                        <th>Kemasan</th>
                        <th>Kategori</th>
                        <th>Kapasitas</th>
                        <th>Harga Satuan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $index => $product)
                    <tr>
                        <td class="text-muted fw-bold">{{ $index + 1 }}</td>
                        <td><div class="product-name">{{ $product->nama_produk }}</div></td>
                        <td><span class="badge-premium badge-kemasan">{{ $product->kemasan }}</span></td>
                        <td><span class="badge-premium badge-kategori">{{ $product->produk }}</span></td>
                        <td><span class="fw-800 text-dark">{{ $product->berat }}</span></td>
                        <td>
                            <span class="price-display">
                                @if(is_numeric($product->satuan))
                                    <small class="text-muted fw-bold" style="font-size: 0.6rem;">RP</small> {{ number_format($product->satuan, 0, ',', '.') }}
                                @else
                                    {{ $product->satuan }}
                                @endif
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="d-flex gap-2 justify-content-center">
                                <a href="{{ url('/products/'.$product->id.'/edit') }}" class="btn-action btn-edit" title="Edit">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ url('/products/'.$product->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete" onclick="return confirm('Hapus produk?')" title="Hapus">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center py-5">Data produk tidak ditemukan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // Search Filter
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('.custom-table tbody tr');
        rows.forEach(row => {
            let nameElement = row.querySelector('.product-name');
            if(nameElement) {
                let name = nameElement.innerText.toLowerCase();
                row.style.display = name.includes(filter) ? "" : "none";
            }
        });
    });
</script>
@endsection