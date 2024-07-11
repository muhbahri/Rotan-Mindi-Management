<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Rotan Mindi</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: 'Figtree', sans-serif;
                background: white;
            }

            .container {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                text-align: center;
                position: relative;
                z-index: 1;
            }

            .logo img {
                width: 200px;
            }

            .background-shape {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-image: url('{{ asset('logo/bg-welcome.png') }}');
                background-size: cover;
                background-position: center;
                z-index: 0;
                opacity: 0.3;
            }

            .text {
                position: relative;
                z-index: 1;
                color: #333;
            }

            .text h1 {
                margin: 0;
                font-size: 2em;
                color: #666;
            }

            .text p {
                margin: 5px 0;
                color: #777;
                font-family: "Poppins", sans-serif;
            }

            .button-container {
                margin-bottom: 50px;
                margin-top: 20px;
            }

            .button-container a {
                text-decoration: none;
                color: #fff;
                background-color: #A4896B;
                padding: 10px 20px;
                border-radius: 5px;
                transition: background-color 0.3s, transform 0.3s;
            }

            .button-container a:hover {
                background-color: #634D39;
                transform: scale(1.05);
                margin-to
            }
        </style>
    </head>

    <body>
        <div class="background-shape"></div>
        <div class="container">
            <div class="logo">
                <img src="{{ asset('logo/logo-rotan-mindi.png') }}" alt="Rotan Mindi Logo">
            </div>
            @if (Route::has('login'))
                <div class="button-container">
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Log in</a>
                    @endauth
                </div>
            @endif
            <div class="text">
                <p>Website Manajemen Pesanan dan</p>
                <p>Pengelolaan Inventori Produksi Rotan</p>
                <p>2024</p>
            </div>
        </div>
    </body>

</html>
