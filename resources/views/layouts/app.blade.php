<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Skate Surf Camp Morocco | Ride into Twilight Energy')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800;900&family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: '#00AEEF',
                        darkCharcoal: '#1A1A1A',
                        deepNavy: '#0F172A',
                        "background-light": "#f8f6f6",
                        "background-dark": "#221610",
                    },
                    fontFamily: {
                        sans: ['Montserrat', 'sans-serif'],
                        "display": ["Public Sans", "Inter", "sans-serif"],
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Public Sans', 'Montserrat', sans-serif; }
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
        .sticky-nav {
            position: sticky;
            top: 0;
            z-index: 50;
        }
        .sidebar-sticky {
            position: sticky;
            top: 100px;
        }
    </style>
    @yield('styles')
</head>
<body class="bg-white text-gray-800 font-sans antialiased">
    <!-- BEGIN: Navbar -->
    @include('partials.navbar')
    <!-- END: Navbar -->

    <!-- BEGIN: Main Content -->
    <main>
        @yield('content')
    </main>
    <!-- END: Main Content -->

    <!-- BEGIN: Footer -->
    @include('partials.footer')
    <!-- END: Footer -->

    @yield('scripts')
</body>
</html>
