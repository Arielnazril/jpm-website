<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'PT. Jasa Prima Makmur') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            background: url("{{ asset('images/bg-jpm.jpg') }}") no-repeat center center fixed;
            background-size: cover;
            font-family: 'Poppins', sans-serif;
            margin: 0;
        }

        .min-h-screen {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(6px);
            border-radius: 16px;
            box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.25);
            width: 380px;
            padding: 40px 30px;
            text-align: center;
        }

        .login-card img {
            width: 80px;
            margin-bottom: 20px;
        }

        .login-card h5 {
            font-weight: 600;
            color: #333;
            margin-bottom: 25px;
        }

        .form-control {
            width: 100%;
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .btn-login {
            background-color: #ff9900;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 0;
            width: 100%;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-login:hover {
            background-color: #e68a00;
        }

        .forgot-link {
            display: block;
            margin-top: 15px;
            color: #0066cc;
            text-decoration: none;
        }

        .forgot-link:hover {
            color: #004d99;
        }

        .remember {
            text-align: left;
            font-size: 13px;
            margin-bottom: 10px;
        }

        footer {
            position: fixed;
            bottom: 15px;
            text-align: center;
            width: 100%;
            color: #fff;
            font-size: 13px;
            text-shadow: 0 0 4px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
    <div class="min-h-screen">
        <div class="login-card">
            {{ $slot }}
        </div>
    </div>
    <footer>© 2025 PT. Jasa Prima Makmur</footer>
</body>
</html>
