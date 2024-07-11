<!DOCTYPE html>
<html lang="en">

<head>
    @include('manager.css')
    <style>
        .profile-container {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }

        .profile-card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            margin-bottom: 20px;
        }
    </style>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="wrapper">
        @include('manager.sidebar')

        <div class="main">
            @include('manager.navbar')

            <main>
                    @yield('content')
            </main>

            <footer class="footer">
                @include('manager.footer')
            </footer>
        </div>
    </div>

    @include('manager.js')
</body>

</html>
