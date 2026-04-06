<x-guest-layout>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            /* Overlay gradient agar background gambar tidak mengganggu keterbacaan */
            background: linear-gradient(rgba(15, 23, 42, 0.7), rgba(15, 23, 42, 0.7)), 
                        url("{{ asset('images/bg-jpm.jpg') }}") center/cover no-repeat fixed;
        }

        /* Card Container Utama */
        .auth-card {
            width: 100%;
            max-width: 440px;
            background: rgba(255, 255, 255, 0.98);
            border-radius: 28px;
            padding: 50px 40px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            margin: 20px;
            text-align: center;
        }

        /* Styling Logo */
        .brand-logo {
            width: 130px;
            margin: 0 auto 30px;
            display: block;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1));
        }

        /* Header Text */
        .auth-header h2 {
            font-weight: 800;
            color: #0f172a;
            font-size: 1.8rem;
            margin-bottom: 10px;
            letter-spacing: -0.5px;
        }

        .auth-header p {
            color: #64748b;
            font-size: 0.95rem;
            margin-bottom: 35px;
            font-weight: 500;
        }

        /* Input Styling */
        .input-wrapper {
            position: relative;
            margin-bottom: 20px;
            text-align: left;
        }

        .input-wrapper i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1.2rem;
            transition: 0.3s;
        }

        .form-control {
            width: 100%;
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 14px;
            padding: 14px 14px 14px 50px;
            font-size: 15px;
            font-weight: 500;
            color: #1e293b;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        .form-control:focus {
            outline: none;
            background: #ffffff;
            border-color: #f79e1b;
            box-shadow: 0 0 0 4px rgba(247, 158, 27, 0.1);
        }

        .form-control:focus + i {
            color: #f79e1b;
        }

        /* Checkbox Row */
        .options-row {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin: -5px 0 25px 5px;
            font-size: 14px;
            color: #475569;
            font-weight: 500;
        }

        .options-row input {
            width: 18px;
            height: 18px;
            margin-right: 12px;
            accent-color: #f79e1b;
            cursor: pointer;
        }

        /* Button Utama */
        .btn-submit {
            width: 100%;
            background: #f79e1b;
            color: white;
            border: none;
            padding: 16px;
            border-radius: 14px;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 10px 15px -3px rgba(247, 158, 27, 0.3);
        }

        .btn-submit:hover {
            background: #e68a00;
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(247, 158, 27, 0.4);
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 30px 0;
            color: #cbd5e1;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .divider::before, .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1.5px solid #f1f5f9;
        }

        .divider::before { margin-right: 15px; }
        .divider::after { margin-left: 15px; }

        /* Secondary Links */
        .btn-secondary {
            width: 100%;
            padding: 13px;
            border-radius: 14px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: 0.3s;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        .link-forgot {
            border: 1.5px solid #e2e8f0;
            color: #64748b;
        }

        .link-forgot:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
            color: #0f172a;
        }

        .link-register {
            background: #eff6ff;
            color: #2563eb;
        }

        .link-register:hover {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .footer-copy {
            margin-top: 25px;
            font-size: 12px;
            color: #94a3b8;
            font-weight: 500;
        }
    </style>

    <div class="auth-card">
        <img src="{{ asset('images/logo-jpm.png') }}" alt="Logo JPM" class="brand-logo">

        <div class="auth-header">
            <h2>Selamat Datang</h2>
            <p>Kelola proyek Anda dengan akses akun JPM</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-wrapper">
                <input id="email" class="form-control" type="email" name="email"
                    value="{{ old('email') }}" required autofocus placeholder="Alamat Email">
                <i class="bi bi-envelope"></i>
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-[-15px] mb-3 text-left text-xs text-red-500" />

            <div class="input-wrapper">
                <input id="password" class="form-control" type="password" name="password"
                    required autocomplete="current-password" placeholder="Kata Sandi">
                <i class="bi bi-lock"></i>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-[-15px] mb-3 text-left text-xs text-red-500" />

            <div class="options-row">
                <label style="display: flex; align-items: center; cursor: pointer;">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span>Ingat saya di perangkat ini</span>
                </label>
            </div>

            <button type="submit" class="btn-submit">
                <i class="bi bi-box-arrow-in-right"></i> Masuk Sekarang
            </button>

            <div class="divider">Pilihan Lain</div>

            <div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="btn-secondary link-forgot">
                        <i class="bi bi-shield-lock"></i> Lupa Kata Sandi?
                    </a>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-secondary link-register">
                        <i class="bi bi-person-plus"></i> Buat Akun Baru
                    </a>
                @endif
            </div>
        </form>

    </div>
</x-guest-layout>