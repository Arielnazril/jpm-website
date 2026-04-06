<x-guest-layout>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            background: url('{{ asset('images/bg-jpm.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        /* Overlay gelap */
        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.78);
            z-index: 0;
        }

        /* Card register */
        .register-card {
            position: relative;
            z-index: 1;
            width: 420px;
            padding: 35px 40px;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(14px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.35);
            color: #f2f2f2;
        }

        .logo {
            width: 85px;
            display: block;
            margin: 0 auto 15px;
        }

        /* Input group */
        .input-group-text {
            background: rgba(255,255,255,0.85);
            border-radius: 10px 0 0 10px;
            border: none;
            color: #444;
        }

        input.form-control {
            border-radius: 0 10px 10px 0;
            border: none;
            padding: 10px;
            background: rgba(255,255,255,0.85);
        }

        input.form-control:focus {
            box-shadow: 0 0 6px rgba(255,255,255,0.35);
        }

        /* Tombol Register (kuning soft) */
        .btn-register {
            background: #f6b556; /* kuning soft */
            color: #fff;
            font-weight: 600;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 10px;
            margin-top: 22px;
            transition: 0.25s;
        }

        .btn-register:hover {
            background: #e0a24c;
            transform: scale(1.02);
        }

        /* Link login */
        .link-login {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #e2e2e2;
            font-size: 14px;
            text-decoration: none;
        }

        .link-login:hover {
            text-decoration: underline;
        }

        .footer {
            position: absolute;
            bottom: 15px;
            width: 100%;
            text-align: center;
            font-size: 13px;
            color: #ccc;
            z-index: 1;
        }
    </style>

    <div class="register-card">

        <img src="{{ asset('images/logo-jpm.png') }}" class="logo" alt="logo">

        <h4 class="text-center mb-3 fw-semibold">Daftar Akun Baru</h4>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <label class="fw-light">Nama Lengkap</label>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text" name="name" class="form-control" placeholder="Nama lengkap"
                       value="{{ old('name') }}" required autofocus>
            </div>
            <x-input-error :messages="$errors->get('name')" class="text-warning small mb-2" />

            <!-- Email -->
            <label class="fw-light">Email</label>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" name="email" class="form-control" placeholder="Email aktif"
                       value="{{ old('email') }}" required>
            </div>
            <x-input-error :messages="$errors->get('email')" class="text-warning small mb-2" />

            <!-- Password -->
            <label class="fw-light">Password</label>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" name="password" class="form-control"
                       placeholder="Password" required>
            </div>
            <x-input-error :messages="$errors->get('password')" class="text-warning small mb-2" />

            <!-- Confirm Password -->
            <label class="fw-light">Konfirmasi Password</label>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-shield-check"></i></span>
                <input type="password" name="password_confirmation"
                       class="form-control" placeholder="Ulangi password" required>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="text-warning small mb-2" />

            <button type="submit" class="btn-register">
                <i class="bi bi-person-plus me-1"></i> Daftar Sekarang
            </button>

            <a href="{{ route('login') }}" class="link-login">
                Sudah punya akun? Login di sini
            </a>
        </form>
    </div>

    <div class="footer">© 2025 PT. Jasa Prima Makmur</div>

</x-guest-layout>
