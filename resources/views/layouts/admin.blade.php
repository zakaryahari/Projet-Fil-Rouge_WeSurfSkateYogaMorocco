<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'WeSurfSkate Morocco Admin Dashboard')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "surface-tint": "#00658d",
                        "outline": "#6e7881",
                        "on-secondary-container": "#636262",
                        "on-primary-fixed-variant": "#004c6b",
                        "on-error-container": "#93000a",
                        "on-tertiary-container": "#003c5f",
                        "secondary-fixed": "#e5e2e1",
                        "surface-variant": "#e0e3e5",
                        "on-surface": "#181c1e",
                        "tertiary-container": "#55a9eb",
                        "on-tertiary-fixed": "#001d32",
                        "tertiary-fixed": "#cde5ff",
                        "on-secondary-fixed": "#1c1b1b",
                        "on-tertiary": "#ffffff",
                        "secondary-container": "#e2dfde",
                        "primary-container": "#00aeef",
                        "secondary-fixed-dim": "#c8c6c5",
                        "surface-container": "#ebeef0",
                        "primary": "#00658d",
                        "background": "#f7fafc",
                        "error-container": "#ffdad6",
                        "on-secondary": "#ffffff",
                        "on-background": "#181c1e",
                        "on-primary-container": "#003e58",
                        "surface": "#f7fafc",
                        "primary-fixed-dim": "#82cfff",
                        "surface-container-low": "#f1f4f6",
                        "surface-bright": "#f7fafc",
                        "tertiary": "#006399",
                        "error": "#ba1a1a",
                        "secondary": "#5f5e5e",
                        "on-primary": "#ffffff",
                        "surface-container-high": "#e5e9eb",
                        "outline-variant": "#bdc8d1",
                        "inverse-primary": "#82cfff",
                        "inverse-on-surface": "#eef1f3",
                        "surface-container-lowest": "#ffffff",
                        "on-surface-variant": "#3e4850",
                        "on-secondary-fixed-variant": "#474746",
                        "on-tertiary-fixed-variant": "#004b74",
                        "on-error": "#ffffff",
                        "surface-dim": "#d7dadc",
                        "surface-container-highest": "#e0e3e5",
                        "on-primary-fixed": "#001e2d",
                        "tertiary-fixed-dim": "#94ccff",
                        "primary-fixed": "#c6e7ff",
                        "inverse-surface": "#2d3133"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "fontFamily": {
                        "headline": ["Inter"],
                        "body": ["Inter"],
                        "label": ["Inter"]
                    }
                },
            },
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f7fafc; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .sidebar-active { color: #00aeef; font-weight: 700; border-right: 4px solid #00aeef; background-color: rgba(30, 41, 59, 0.5); }
    </style>
    @yield('styles')
</head>
<body class="text-on-surface overflow-hidden">
    <!-- SideNavBar Shell -->
    <aside class="fixed left-0 top-0 h-screen flex flex-col bg-slate-900 w-64 z-50">
        <div class="p-8">
            <h1 class="text-xl font-black text-white"><font face="Montserrat, sans-serif"><span style="font-size: 24px; letter-spacing: -1.2px;">SKATE SURF.</span></font></h1>
            <p class="text-xs text-slate-400 mt-1 uppercase tracking-widest">Back-Office Panel</p>
        </div>
        <nav class="flex-1 px-4 space-y-1">
            <!-- Active Tab: Dashboard -->
            <a class="flex items-center gap-3 px-4 py-3 text-sky-400 font-bold border-r-4 border-sky-400 bg-slate-800/50 transition-all duration-200" href="{{ route('admin.dashboard') }}">
                <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                <span class="text-sm">Dashboard</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white transition-all duration-200 hover:bg-slate-800" href="#">
                <span class="material-symbols-outlined" data-icon="calendar_month">calendar_month</span>
                <span class="text-sm">Bookings</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white transition-all duration-200 hover:bg-slate-800" href="#">
                <span class="material-symbols-outlined" data-icon="bed">bed</span>
                <span class="text-sm">Rooms</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white transition-all duration-200 hover:bg-slate-800" href="#">
                <span class="material-symbols-outlined" data-icon="package">package</span>
                <span class="text-sm">Packages</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white transition-all duration-200 hover:bg-slate-800" href="#">
                <span class="material-symbols-outlined" data-icon="surfing">surfing</span>
                <span class="text-sm">Activities</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white transition-all duration-200 hover:bg-slate-800" href="#">
                <span class="material-symbols-outlined" data-icon="sports_handball">sports_handball</span>
                <span class="text-sm">Coaches</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white transition-all duration-200 hover:bg-slate-800" href="#">
                <span class="material-symbols-outlined" data-icon="group">group</span>
                <span class="text-sm">Users</span>
            </a>
        </nav>
        <div class="p-6">
            <button class="w-full bg-primary-container text-white py-3 px-4 rounded-full font-bold flex items-center justify-center gap-2 hover:brightness-110 transition-all">
                <span class="material-symbols-outlined text-sm" data-icon="add">add</span>
                New Booking
            </button>
        </div>
    </aside>

    <!-- Main Workspace -->
    <main class="ml-64 flex flex-col h-screen overflow-y-auto">
        <!-- TopNavBar Shell -->
        <header class="fixed top-0 right-0 left-64 z-40 flex justify-between items-center px-8 h-16 bg-white/80 backdrop-blur-md shadow-sm">
            <div class="flex items-center gap-4 flex-1">
                <div class="relative w-full max-w-md focus-within:ring-2 focus-within:ring-sky-500 rounded-lg">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-400 text-lg" data-icon="search">search</span>
                    <input class="w-full pl-10 pr-4 py-2 bg-surface-container-low border-none rounded-lg text-sm focus:ring-0" placeholder="Search bookings, customers..." type="text">
                </div>
            </div>
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-4 border-r border-outline-variant pr-6">
                    <button class="text-slate-500 hover:text-sky-500 transition-colors">
                        <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
                    </button>
                    <button class="text-slate-500 hover:text-sky-500 transition-colors">
                        <span class="material-symbols-outlined" data-icon="settings">settings</span>
                    </button>
                </div>
                <div class="flex items-center gap-3">
                    <div class="text-right">
                        <p class="text-sm font-bold text-slate-900">{{ Auth::user()->name }}</p>
                        <p class="text-[0.65rem] text-slate-500 tracking-widest uppercase">{{ ucfirst(Auth::user()->role) }}</p>
                    </div>
                    <img alt="Admin User Profile" class="w-10 h-10 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDxfL2AaawHK3AK_iF71lRjGtF9FSiDjJslvpk9XwEbtHY6G4_YNSKcVZtjAejsf6Mm7ycWt_2tZ4vq85CNbTwGuDVaq5AMuEbtWfR6aagR1DEvvNon2mCMbJmMwcfFu0_ltS51EYLkgTZffFB8rMBacaLfLlJOMOy2SPBM7udcMmOwa4T5gQ0o5oYzubMZ1_2S0YCfiZjh5NvuoHRQh4F96YdMgH3rbOR0wlwlRQvo_OzmadAUfkEEJo2h6SP4WpaA9GuB1Hk6WFQ">
                </div>
            </div>
        </header>

        <!-- Content Canvas -->
        <div class="pt-24 px-8 pb-12">
            @yield('content')
        </div>
    </main>

    @yield('scripts')
</body>
</html>
