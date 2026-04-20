<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'WeSurfSkateYoga') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800;900&family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&display=swap" rel="stylesheet"/>

        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <script>
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        colors: {
                            primary: '#00AEEF',
                            darkCharcoal: '#1A1A1A',
                            deepNavy: '#0F172A',
                        },
                        fontFamily: {
                            sans: ['Montserrat', 'Public Sans', 'sans-serif'],
                            "display": ["Public Sans", "Inter", "sans-serif"],
                        },
                    }
                }
            }
        </script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gradient-to-br from-darkCharcoal via-slate-900 to-darkCharcoal">
        <div class="min-h-screen flex flex-col justify-center items-center py-8 px-4 sm:px-6">
            <!-- Logo -->
            <div class="mb-12">
                <a href="{{ route('home') }}" class="inline-block hover:opacity-80 transition-opacity">
                    <div class="flex flex-col items-center">
                        <div class="text-4xl font-extrabold tracking-tighter text-white mb-2">
                            SKATE SURF<span class="text-primary">.</span>
                        </div>
                        <p class="text-primary text-xs font-bold uppercase tracking-widest">Morocco Experience</p>
                    </div>
                </a>
            </div>

            <!-- Auth Card -->
            <div class="w-full max-w-md bg-white dark:bg-slate-800 shadow-2xl overflow-hidden rounded-2xl border border-slate-200 dark:border-slate-700">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
