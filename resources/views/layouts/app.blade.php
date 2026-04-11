<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Skate Surf Camp Morocco | Ride into Twilight Energy')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&display=swap" rel="stylesheet"/>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#00AEEF',
                        darkCharcoal: '#1A1A1A',
                        deepNavy: '#0F172A',
                    },
                    fontFamily: {
                        sans: ['Montserrat', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        .nav-scrolled {
            background-color: rgba(26, 26, 26, 0.98);
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.4);
        }
        .transition-all-300 {
            transition: all 0.3s ease-in-out;
        }
        .hover-scale {
            transition: transform 0.3s ease;
        }
        .hover-scale:hover {
            transform: scale(1.03);
        }
    </style>
    @yield('styles')
</head>
<body class="bg-white text-gray-800 font-sans antialiased">

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    @yield('scripts')
</body>
</html>
