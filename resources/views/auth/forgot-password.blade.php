<x-guest-layout>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc; /* SAMA seperti login */
        }

        .reset-card {
            max-width: 400px;
            margin: 40px auto;
            background: #fff;
            padding: 30px 28px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .logo {
            width: 90px;
            display: block;
            margin: 0 auto;
            margin-bottom: 15px;
        }

        .title {
            text-align: center;
            font-weight: 600;
            color: #333;
        }

        .desc {
            text-align: center;
            font-size: 14px;
            color: #777;
        }

        .btn-orange {
            background-color: #f79e1b;
            color: #fff;
            border-radius: 6px;
            padding: 10px;
            width: 100%;
            font-weight: bold;
            border: none;
            transition: 0.3s;
        }

        .btn-orange:hover {
            background-color: #e68a00;
        }

        .btn-back {
            background: #ffffff;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-weight: 500;
            padding: 10px;
            width: 100%;
            color: #444;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-back:hover {
            background: #f1f1f1;
        }
    </style>

    <div class="reset-card">

        <!-- Logo sama seperti login -->
        <img src="{{ asset('images/logo-jpm.png') }}" class="logo" alt="Logo">

        <h5 class="title">Reset Password</h5>
        <p class="desc">Masukkan email Anda untuk menerima link reset password.</p>

        <!-- Status -->
        <x-auth-session-status class="mb-3" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email -->
            <label class="fw-semibold mt-2">Email</label>
            <div class="input-group mb-3 mt-1">
                <span class="input-group-text">
                    <i class="bi bi-envelope"></i>
                </span>
                <input
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="Email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                >
            </div>

            <x-input-error :messages="$errors->get('email')" class="text-danger small mb-3" />

            <!-- Kirim Link -->
            <button type="submit" class="btn-orange mt-2">
                <i class="bi bi-send-fill me-1"></i>
                Kirim Link Reset
            </button>

            <!-- Kembali ke Login -->
            <a href="{{ route('login') }}" class="btn-back mt-3 d-block text-center">
                <i class="bi bi-arrow-left-circle me-1"></i>
                Kembali ke Login
            </a>

        </form>
    </div>

</x-guest-layout>
