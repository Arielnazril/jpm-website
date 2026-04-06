<x-guest-layout>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            background-image: 
                radial-gradient(at 0% 0%, rgba(247, 158, 27, 0.08) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(30, 41, 59, 0.05) 0px, transparent 50%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px 20px;
            margin: 0;
        }

        /* Card Utama dengan Efek Soft Shadow */
        .main-form-card {
            width: 100%;
            max-width: 700px;
            background: #ffffff;
            padding: 50px;
            border-radius: 32px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.06);
            border: 1px solid #f1f5f9;
            position: relative;
            transition: transform 0.3s ease;
        }

        /* Accent Bar di bagian atas */
        .main-form-card::before {
            content: "";
            position: absolute;
            top: 0; left: 0; width: 100%; height: 6px;
            background: linear-gradient(90deg, #1e293b 0%, #f79e1b 100%);
            border-radius: 32px 32px 0 0;
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo-wrapper {
            background: #f8fafc;
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            border: 1px solid #eef2f6;
        }

        .form-header h2 {
            font-size: 26px;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 10px;
            letter-spacing: -0.5px;
        }

        .form-header p {
            color: #64748b;
            font-size: 0.95rem;
        }

        /* Layout Grid */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            column-gap: 24px;
            row-gap: 28px;
        }

        .full-width {
            grid-column: span 2;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        /* Label dengan Ikon */
        label {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
            color: #475569;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 12px;
            transition: color 0.3s;
        }

        .form-group:focus-within label {
            color: #f79e1b;
        }

        .form-group:focus-within label i {
            color: #1e293b !important;
        }

        /* Input Styling */
        input {
            width: 100%;
            padding: 15px 20px;
            border-radius: 16px;
            border: 2px solid #f1f5f9;
            font-size: 14px;
            color: #1e293b;
            font-weight: 600;
            background: #f8fafc;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-sizing: border-box;
        }

        input::placeholder {
            color: #94a3b8;
            font-weight: 400;
        }

        input:focus {
            outline: none;
            border-color: #f79e1b;
            box-shadow: 0 0 0 5px rgba(247, 158, 27, 0.1);
            background: #fff;
            transform: translateY(-2px);
        }

        /* Group Tombol */
        .btn-container {
            display: flex;
            gap: 16px;
            margin-top: 45px;
        }

        .btn-base {
            padding: 16px 24px;
            border-radius: 16px;
            font-weight: 800;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
            cursor: pointer;
            border: none;
        }

        .btn-cancel {
            flex: 1;
            background: #f1f5f9;
            color: #64748b;
        }

        .btn-cancel:hover {
            background: #fee2e2;
            color: #ef4444;
        }

        .btn-save {
            flex: 2;
            background: #1e293b;
            color: #ffffff;
            box-shadow: 0 10px 20px rgba(30, 41, 59, 0.15);
        }

        .btn-save:hover {
            background: #f79e1b;
            box-shadow: 0 15px 25px rgba(247, 158, 27, 0.25);
            transform: translateY(-3px);
        }

        .btn-save:active {
            transform: translateY(0);
        }

        @media (max-width: 600px) {
            .form-grid { grid-template-columns: 1fr; }
            .full-width { grid-column: span 1; }
            .main-form-card { padding: 30px 20px; }
            .btn-container { flex-direction: column-reverse; }
        }
    </style>

    <div class="main-form-card">
        <div class="form-header">
            <div class="logo-wrapper">
                <img src="{{ asset('images/logo-jpm.png') }}" alt="Logo JPM" style="width: 50px;">
            </div>
            <h2>Inventaris Baru</h2>
            <p>Masukkan detail produk untuk memperbarui database JPM</p>
        </div>

        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-grid">
                <div class="form-group full-width">
                    <label><i class="bi bi-tag-fill text-warning"></i> Nama Lengkap Produk</label>
                    <input type="text" name="nama_produk" value="{{ old('nama_produk') }}" placeholder="Contoh: SikaTop 107 Seal (Grey)" required>
                </div>

                <div class="form-group">
                    <label><i class="bi bi-box-seam-fill text-warning"></i> Jenis Kemasan</label>
                    <input type="text" name="kemasan" value="{{ old('kemasan') }}" placeholder="Sak / Galon / Pail" required>
                </div>

                <div class="form-group">
                    <label><i class="bi bi-collection-fill text-warning"></i> Kategori</label>
                    <input type="text" name="produk" value="{{ old('produk') }}" placeholder="Impor / Lokal" required>
                </div>

                <div class="form-group">
                    <label><i class="bi bi-moisture text-warning"></i> Berat / Vol</label>
                    <input type="text" name="berat" value="{{ old('berat') }}" placeholder="25 kg / 1 Liter" required>
                </div>

                <div class="form-group">
                    <label><i class="bi bi-calculator-fill text-warning"></i> Per Satuan</label>
                    <input type="text" name="per_satuan" value="{{ old('per_satuan') }}" placeholder="1 Sak / 1 Pail" required>
                </div>

                <div class="form-group full-width">
                    <label><i class="bi bi-cash-stack text-warning"></i> Estimasi Harga Satuan (Rp)</label>
                    <input type="number" name="satuan" value="{{ old('satuan') }}" placeholder="850000" required>
                </div>
            </div>

            <div class="btn-container">
                <a href="{{ route('products.index') }}" class="btn-base btn-cancel">
                    <i class="bi bi-x-lg"></i> Batalkan
                </a>
                <button type="submit" class="btn-base btn-save">
                    <i class="bi bi-plus-circle-fill"></i> Tambahkan Ke Sistem
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>