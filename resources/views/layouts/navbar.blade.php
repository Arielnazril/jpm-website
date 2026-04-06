<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'PT. Jasa Prima Makmur'))</title>

    <!-- BOOTSTRAP 5.3 CSS - Wajib ada untuk styling JPM -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- SLOT UNTUK CSS KHUSUS HALAMAN (dari beranda.blade.php) -->
    @yield('custom_styles') 

    <style>
        /* Gaya Kustom Tambahan untuk Konsistensi Warna JPM */
        :root {
            --jpm-yellow: #ffc107; /* Warna Kuning (Primary) */
            --jpm-dark: #1f2937; /* Warna Gelap (Teks/Secondary) */
        }
        .navbar-custom {
            background-color: var(--jpm-yellow) !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }
        .navbar-brand {
            font-weight: 700;
            color: var(--jpm-dark) !important;
        }
        .nav-link {
            font-weight: 500;
            color: var(--jpm-dark) !important;
            transition: color 0.3s;
        }
        .nav-link:hover {
            color: white !important;
        }
        .btn-primary {
            background-color: var(--jpm-dark);
            border-color: var(--jpm-dark);
            color: white;
            font-weight: 600;
        }
        .btn-primary:hover {
            background-color: #374151;
            border-color: #374151;
        }
    </style>
</head>
<body>

    <!-- NAVIGASI KUSTOM JPM -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                 {{-- Anda bisa menambahkan logo di sini, misalnya: <img src="{{ asset('images/logo.png') }}" alt="JPM Logo" height="30"> --}}
                JPM - PT. Jasa Prima Makmur
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">BERANDA</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/tentang') }}">TENTANG KAMI</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/bisnis') }}">BISNIS KAMI</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/proyek') }}">PROYEK</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/kontak') }}">KONTAK</a></li>
                    
                    {{-- Tombol Login/Logout Aman (Mengatasi error 'name' on null) --}}
                    @guest
                        <li class="nav-item ms-lg-3">
                            <a class="btn btn-primary btn-sm" href="{{ route('login') }}">LOGIN</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item dropdown ms-lg-3">
                            <a class="nav-link dropdown-toggle btn btn-primary btn-sm text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Halo, {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- SLOT KONTEN UTAMA HALAMAN -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-dark text-white text-center py-4 mt-5">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} PT. Jasa Prima Makmur. Solusi Konstruksi Profesional.</p>
        </div>
    </footer>

    <!-- BOOTSTRAP 5.3 JS - Wajib di akhir body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>