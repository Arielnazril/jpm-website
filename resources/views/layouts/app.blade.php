<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PT. Jasa Prima Makmur')</title>

    {{-- Bootstrap & Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Animate.css untuk Transisi Modern --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    {{-- Custom Styles --}}
    @yield('custom_styles')

    <style>
        :root {
            --color-primary: #FFA500;
            --color-dark: #1e293b;
            --color-dark-footer: #444;
            --color-light-blue: #001F3F;
            --nav-bg: rgba(255, 255, 255, 0.9);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f5f7fa;
            scroll-behavior: smooth;
        }

        /* PERBAIKAN: Memastikan SweetAlert selalu muncul di lapisan paling depan */
        .swal2-container {
            z-index: 99999 !important;
        }

        .swal2-popup-custom {
            border-radius: 24px !important;
            padding: 2rem !important;
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            box-shadow: 0 20px 50px rgba(0,0,0,0.1) !important;
        }
        .swal2-title-custom {
            font-weight: 800 !important;
            color: var(--color-dark) !important;
            font-size: 1.5rem !important;
        }
        .swal2-html-custom {
            color: #64748b !important;
            line-height: 1.6 !important;
            font-weight: 500 !important;
            font-size: 1rem !important;
        }
        .swal2-confirm-custom {
            padding: 12px 35px !important;
            border-radius: 12px !important;
            font-weight: 700 !important;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            background: linear-gradient(135deg, #FFA500 0%, #FF8C00 100%) !important;
            border: none !important;
        }
        .swal2-cancel-custom {
            padding: 12px 35px !important;
            border-radius: 12px !important;
            font-weight: 700 !important;
            text-transform: uppercase;
            background: #f1f5f9 !important;
            color: #64748b !important;
            border: none !important;
        }

        /* ===== NAVBAR ELEGAN & PREMIUM ===== */
        nav.navbar {
            background: var(--nav-bg) !important;
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            box-shadow: 0 4px 30px rgba(0,0,0,0.03);
            padding: 10px 0;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border-bottom: 3px solid var(--color-primary);
        }
        @media (max-width: 768px) {
            .navbar-brand img { height: 50px; }
            .navbar-brand span { font-size: 0.9rem; }
        }

        .navbar-brand {
            color: var(--color-dark) !important;
            font-weight: 800;
            letter-spacing: -0.8px;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            height: 75px;
            margin-right: 12px;
            transition: transform 0.3s ease;
            width: auto;
        }

        .navbar-brand:hover img { transform: scale(1.05); }

        .navbar-nav .nav-link {
            color: #64748b !important;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 10px 18px !important;
            position: relative;
            transition: all 0.3s ease;
            border-radius: 8px;
        }

        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--color-primary);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .navbar-nav .nav-link:hover::after,
        .navbar-nav .nav-link.active::after { width: 25px; }

        .navbar-nav .nav-link:hover {
            color: var(--color-primary) !important;
            background: rgba(255, 165, 0, 0.03);
        }

        .navbar-nav .nav-link.active {
            color: var(--color-primary) !important;
            font-weight: 800;
        }

        .btn-login {
            background: linear-gradient(135deg, #FFA500 0%, #FF8C00 100%);
            color: white !important;
            padding: 12px 30px;
            border-radius: 12px;
            border: none;
            text-transform: uppercase;
            font-weight: 800;
            font-size: 0.8rem;
            letter-spacing: 1px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            margin-left: 20px;
            box-shadow: 0 4px 15px rgba(255, 165, 0, 0.3);
            text-decoration: none;
            display: inline-block;
        }

        .btn-login:hover {
            background: var(--color-light-blue);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 31, 63, 0.4);
            color: white !important;
        }

        .user-dropdown-wrapper {
            background: #f8fafc;
            padding: 5px 15px;
            border-radius: 50px;
            border: 1px solid #e2e8f0;
            transition: 0.3s;
        }

        .user-dropdown-wrapper:hover {
            border-color: var(--color-primary);
            background: white;
        }

        .user-dropdown {
            color: var(--color-dark) !important;
            font-size: 0.9rem;
            font-weight: 700 !important;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border-radius: 15px;
            padding: 10px;
            margin-top: 15px !important;
        }

        .dropdown-item {
            padding: 10px 15px;
            border-radius: 8px;
            font-weight: 600;
            color: #475569;
            transition: 0.2s;
        }

        .dropdown-item:hover {
            background: rgba(255, 165, 0, 0.1);
            color: var(--color-primary);
        }

        main { padding-top: 90px; }

        @media (max-width: 991px) {
            .navbar-collapse {
                background: white;
                margin-top: 15px;
                padding: 20px;
                border-radius: 15px;
                box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            }
            .btn-login { margin-left: 0; margin-top: 10px; width: 100%; text-align: center; }
        }
    </style>
</head>
<body>

{{-- ========== NAVBAR ========== --}}
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo-sika1.png') }}" alt="Logo JPM">
            <span>OFFICIAL DISTRIBUTOR SIKA PRODUCT</span>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="bi bi-list fs-1"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('tentang') ? 'active' : '' }}" href="{{ url('/tentang') }}">Tentang Kami</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('bisnis') ? 'active' : '' }}" href="{{ url('/bisnis') }}">Bisnis Kami</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('proyek') ? 'active' : '' }}" href="{{ url('/proyek') }}">Partner Project</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('kontak') ? 'active' : '' }}" href="{{ url('/kontak') }}">Kontak</a></li>

                @auth
                    <li class="nav-item dropdown ms-lg-3">
                        <div class="user-dropdown-wrapper">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle user-dropdown d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle fs-5 me-2 text-primary"></i>
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow">
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a></li>
                                <li><a class="dropdown-item" href="{{ route('products.index') }}"><i class="bi bi-box-seam me-2"></i> Kelola Produk</a></li>
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="bi bi-person-gear me-2"></i> Profil</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    {{-- PERBAIKAN: Menambahkan ID agar mudah ditarget oleh script --}}
                                    <button type="button" id="btn-logout-trigger" class="dropdown-item text-danger fw-bold">
                                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endauth
            </ul>
            
            @guest
                <a href="{{ route('login') }}" class="btn-login">Login</a>
            @endguest
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

<footer style="background: #111; color: #fff; padding: 80px 0 0 0; border-top: 6px solid #FFA500; font-family: 'Plus Jakarta Sans', sans-serif;">
    <div class="container">
        <div class="row g-4 mb-5">
            <div class="col-lg-5 col-md-12">
                <div class="footer-logo-section">
                    <img src="{{ asset('images/logo-jpm.png') }}" alt="Logo JPM" style="height: 70px; margin-bottom: 25px; filter: brightness(1.2);">
                    <p style="color: #aaa; line-height: 1.8; font-size: 1rem; max-width: 400px;">
                        Membangun masa depan Indonesia dengan integritas, kualitas, dan inovasi konstruksi yang berkelanjutan. Kami berkomitmen memberikan solusi teknik terbaik bagi bangsa.
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <h4 style="color: #FFA500; font-weight: 800; font-size: 1.1rem; text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 30px;">Tautan Cepat</h4>
                <ul style="list-style: none; padding: 0;">
                    <li style="margin-bottom: 15px;"><a href="{{ url('/') }}" style="color: #ddd;"><i class="bi bi-chevron-right me-2" style="color: #FFA500;"></i> Beranda</a></li>
                    <li style="margin-bottom: 15px;"><a href="{{ url('/tentang') }}" style="color: #ddd;"><i class="bi bi-chevron-right me-2" style="color: #FFA500;"></i> Tentang Kami</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6">
                <h4 style="color: #FFA500; font-weight: 800; font-size: 1.1rem; text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 30px;">Hubungi Kami</h4>
                <div style="background: #1a1a1a; padding: 25px; border-radius: 15px; border: 1px solid #333;">
                    <p style="color: #ddd; display: flex; align-items: center; gap: 12px;">
                        <i class="bi bi-envelope-fill" style="color: #FFA500;"></i>
                        <span>info@jasaprimamakmur.com</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <div style="background: #000; padding: 25px 0; border-top: 1px solid #222;">
        <div class="container text-center">
            <p style="margin: 0; color: #777; font-size: 0.9rem;">
                © {{ date('Y') }} <strong>PT. Jasa Prima Makmur</strong>. Seluruh Hak Cipta Dilindungi.
            </p>
        </div>
    </div>
</footer>

{{-- Scripts --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
{{-- Library diletakkan di bawah agar siap dipanggil --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // PERBAIKAN: Menggunakan Listener agar tombol pasti berfungsi meski ada delay pemuatan
    document.addEventListener('DOMContentLoaded', function() {
        const logoutBtn = document.getElementById('btn-logout-trigger');
        if(logoutBtn) {
            logoutBtn.addEventListener('click', function() {
                confirmLogout();
            });
        }
    });

    function confirmLogout() {
        Swal.fire({
            title: 'Apakah Anda yakin ingin keluar dari halaman ini?',
            text: "Pastikan semua perubahan telah disimpan sebelum melanjutkan.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#FFA500',
            cancelButtonColor: '#f1f5f9',
            confirmButtonText: 'Ya, Keluar',
            cancelButtonText: 'Batal',
            reverseButtons: true,
            customClass: {
                popup: 'swal2-popup-custom animate__animated animate__fadeInUp',
                title: 'swal2-title-custom',
                htmlContainer: 'swal2-html-custom',
                confirmButton: 'swal2-confirm-custom shadow-sm',
                cancelButton: 'swal2-cancel-custom shadow-sm'
            },
            showClass: {
                popup: 'animate__animated animate__fadeInUp animate__faster'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutDown animate__faster'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }

    @if(session('logout_success'))
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: '{{ session("logout_success") }}',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        });
    @endif
</script>

</body>
</html>