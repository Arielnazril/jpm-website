<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'PT. Jasa Prima Makmur'))</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    @yield('custom_styles')

    <style>
        /* 🎨 Warna dan Tema Umum JPM */
        :root {
            --jpm-yellow: #ffc107;
            --jpm-dark: #1f2937;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* NAVBAR */
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

        /* BUTTON STYLE */
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

        /* FOOTER */
        footer {
            background-color: var(--jpm-dark);
            color: white;
            font-size: 0.9rem;
        }
        /* Pastikan teks "Halo, Admin" tetap putih di semua kondisi */
        .navbar .btn.text-white,
        .navbar .btn.text-white:focus,
        .navbar .btn.text-white:hover,
        .navbar .btn.text-white:active {
            color: #fff !important;
        }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                JPM - PT. Jasa Prima Makmur
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('beranda') }}">BERANDA</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('tentang') }}">TENTANG KAMI</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('bisnis') }}">BISNIS KAMI</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('proyek') }}">PROYEK</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('kontak') }}">KONTAK</a></li>

                    {{-- 🔐 Login / Logout Button --}}
                @guest
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-primary btn-sm" href="{{ route('login') }}">LOGIN</a>
                    </li>
                @endguest

                    @auth
                        <li class="nav-item dropdown ms-lg-3">
                        <a class="nav-link dropdown-toggle btn btn-primary btn-sm text-white" href="#"
                            id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Halo, {{ Auth::user()->name }}
                        </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form id="logout-form-main" method="POST" action="{{ route('logout') }}" class="m-0" style="display: none;">
                                        @csrf
                                    </form>
                                    <button type="button" class="dropdown-item" onclick="confirmLogout()">Logout</button>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5">
        @yield('content')
    </main>

    <footer class="text-center py-4 mt-5">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} PT. Jasa Prima Makmur. Solusi Konstruksi Profesional.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // 1. Fungsi Konfirmasi Logout
        function confirmLogout() {
            Swal.fire({
                title: 'Yakin ingin keluar?',
                text: "Anda harus login kembali untuk mengakses area admin.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1f2937', // jpm-dark
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Logout!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form-main').submit();
                }
            });
        }

        // 2. Logika Toast Notifikasi Berhasil Logout
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('logout_success'))
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });

                Toast.fire({
                    icon: 'success',
                    title: '{{ session("logout_success") }}'
                });
            @endif
        });
    </script>

</body>
</html>