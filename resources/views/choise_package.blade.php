<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "secondary-container": "#e2dfde",
                    "surface-container-lowest": "#ffffff",
                    "on-background": "#181c1e",
                    "surface-container-highest": "#e0e3e5",
                    "on-surface-variant": "#3e4850",
                    "on-surface": "#181c1e",
                    "primary": "#00658d",
                    "on-tertiary-container": "#003c5f",
                    "tertiary-fixed": "#cde5ff",
                    "secondary-fixed-dim": "#c8c6c5",
                    "surface-dim": "#d7dadc",
                    "on-secondary-fixed": "#1c1b1b",
                    "inverse-on-surface": "#eef1f3",
                    "error-container": "#ffdad6",
                    "tertiary-fixed-dim": "#94ccff",
                    "surface-bright": "#f7fafc",
                    "on-primary-container": "#003e58",
                    "secondary-fixed": "#e5e2e1",
                    "background": "#f7fafc",
                    "surface-tint": "#00658d",
                    "surface-container": "#ebeef0",
                    "surface": "#f7fafc",
                    "primary-fixed": "#c6e7ff",
                    "on-error": "#ffffff",
                    "on-tertiary": "#ffffff",
                    "on-error-container": "#93000a",
                    "surface-container-low": "#f1f4f6",
                    "on-tertiary-fixed-variant": "#004b74",
                    "on-tertiary-fixed": "#001d32",
                    "on-secondary-fixed-variant": "#474746",
                    "tertiary": "#006399",
                    "outline-variant": "#bdc8d1",
                    "inverse-surface": "#2d3133",
                    "inverse-primary": "#82cfff",
                    "on-secondary-container": "#636262",
                    "primary-container": "#00aeef",
                    "on-primary-fixed-variant": "#004c6b",
                    "error": "#ba1a1a",
                    "secondary": "#5f5e5e",
                    "on-primary-fixed": "#001e2d",
                    "primary-fixed-dim": "#82cfff",
                    "surface-container-high": "#e5e9eb",
                    "surface-variant": "#e0e3e5",
                    "on-primary": "#ffffff",
                    "outline": "#6e7881",
                    "on-secondary": "#ffffff",
                    "tertiary-container": "#55a9eb"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "2xl": "1.5rem",
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
        body { font-family: 'Inter', sans-serif; }
        .script-font { font-family: 'Inter', sans-serif; font-style: italic; font-weight: 500; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-surface text-on-surface antialiased min-h-screen flex flex-col">
<!-- TopAppBar -->
<nav class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-md flex justify-between items-center px-6 h-16 w-full fixed top-0 z-50 shadow-sm">
<div class="text-xl font-bold text-sky-700 dark:text-sky-300 font-inter tracking-tight">Coastal Escape</div>
<div class="flex items-center gap-4">
<div class="hidden md:flex gap-8 text-slate-600 dark:text-slate-400 font-medium">
<a class="text-sky-600 dark:text-sky-400 font-semibold hover:text-sky-500 transition-colors" href="#">Home</a>
<a class="hover:text-sky-500 transition-colors" href="#">Book</a>
<a class="hover:text-sky-500 transition-colors" href="#">My Trips</a>
</div>
<span class="material-symbols-outlined text-slate-600 dark:text-slate-400 cursor-pointer">account_circle</span>
</div>
</nav>
<!-- Main Booking Content -->
<main class="flex-grow flex items-center justify-center pt-24 pb-32 px-4">
<div class="max-w-5xl w-full">
<!-- Header Section -->
<div class="text-center mb-16">
<p class="text-primary-container font-medium tracking-wide uppercase text-xs mb-3">Start your journey</p>
<h1 class="text-4xl md:text-5xl font-extrabold text-on-surface tracking-tight leading-tight">
                    How would you like to book?
                </h1>
</div>
<!-- The Dual-Card Layout -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-stretch">
<!-- Card 1: Standard Package -->
<div class="group relative bg-surface-container-lowest rounded-2xl p-8 shadow-[0_20px_40px_rgba(24,28,30,0.06)] transition-all duration-300 hover:scale-105 border-4 border-transparent hover:border-primary-container/20 cursor-pointer">
<div class="flex flex-col h-full">
<div class="mb-8 flex">
<div class="w-14 h-14 rounded-xl bg-primary-fixed flex items-center justify-center">
<span class="material-symbols-outlined text-primary text-3xl" data-icon="sailing">sailing</span>
</div>
</div>
<div class="mb-10">
<h2 class="text-2xl font-bold text-on-surface mb-3">Standard Package</h2>
<p class="text-on-surface-variant leading-relaxed opacity-80">
                                Pre-curated coastal routes designed for ultimate relaxation and scenic Mediterranean views.
                            </p>
</div>
<div class="mt-auto">
<button class="w-full bg-primary-container hover:bg-primary text-white font-bold py-4 px-6 rounded-full transition-all duration-200 transform active:scale-95 shadow-lg shadow-primary-container/20 uppercase tracking-widest text-xs">
                                Choose Standard
                            </button>
</div>
</div>
</div>
<!-- Card 2: Custom Adventure -->
<div class="group relative bg-surface-container-lowest rounded-2xl p-8 shadow-[0_20px_40px_rgba(24,28,30,0.06)] transition-all duration-300 hover:scale-105 border-4 border-transparent hover:border-primary-container/20 cursor-pointer">
<div class="flex flex-col h-full">
<div class="mb-8 flex">
<div class="w-14 h-14 rounded-xl bg-primary-fixed flex items-center justify-center">
<span class="material-symbols-outlined text-primary text-3xl" data-icon="explore">explore</span>
</div>
</div>
<div class="mb-10">
<h2 class="text-2xl font-bold text-on-surface mb-3">Custom Adventure</h2>
<p class="text-on-surface-variant leading-relaxed opacity-80">
                                Build your own itinerary. Choose your ports, activities, and duration for a bespoke experience.
                            </p>
</div>
<div class="mt-auto">
<button class="w-full bg-primary-container hover:bg-primary text-white font-bold py-4 px-6 rounded-full transition-all duration-200 transform active:scale-95 shadow-lg shadow-primary-container/20 uppercase tracking-widest text-xs">
                                Create Custom
                            </button>
</div>
</div>
</div>
</div>
<!-- Aesthetic Layering Image Decor -->
<div class="mt-12 flex justify-center opacity-30">
<img alt="Coastal landscape" class="w-full max-w-2xl h-48 object-cover rounded-2xl" data-alt="blurred aerial view of a turquoise Mediterranean bay with soft white sand and gentle waves at morning light" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCLNb3u7d6hcJQUoN5WhYmzTtMzDZ4wPWlOzHp4LygWed3_FLcDskpH6N8szItlMknwKkg7fp9ZjFo2-Hsto7SXtdJ_2MwWmloYq7kALX-KQWsSTMfliQp3HUxZyUhKRbGUtkrAHilyHfXMf17B41X23fWq3w_YUOBmn_qAlgX4J8TU80gw56UKjx2wDqslGO9U9h23GKojMq59hArW9TJmAoymH5KY2r9HLOQDqmGBOEtRXQgO1TszWlbv0gbyovYp9doyKhwkDhk"/>
</div>
</div>
</main>
<!-- BottomNavBar (Mobile Only) -->
<nav class="md:hidden fixed bottom-0 left-0 w-full z-50 flex justify-around items-end px-4 pb-4 h-20 bg-white/90 dark:bg-slate-900/90 backdrop-blur-lg rounded-t-3xl shadow-[0_-10px_30px_rgba(0,0,0,0.05)]">
<div class="flex flex-col items-center justify-center text-slate-400 p-2">
<span class="material-symbols-outlined" data-icon="home">home</span>
<span class="text-[10px] uppercase tracking-widest font-bold mt-1">Home</span>
</div>
<div class="flex flex-col items-center justify-center bg-sky-500 text-white rounded-full p-3 mb-2 transform -translate-y-2 shadow-lg shadow-sky-200/50">
<span class="material-symbols-outlined" data-icon="calendar_today">calendar_today</span>
<span class="text-[10px] uppercase tracking-widest font-bold mt-1">Book</span>
</div>
<div class="flex flex-col items-center justify-center text-slate-400 p-2">
<span class="material-symbols-outlined" data-icon="sailing">sailing</span>
<span class="text-[10px] uppercase tracking-widest font-bold mt-1">My Trips</span>
</div>
<div class="flex flex-col items-center justify-center text-slate-400 p-2">
<span class="material-symbols-outlined" data-icon="person">person</span>
<span class="text-[10px] uppercase tracking-widest font-bold mt-1">Profile</span>
</div>
</nav>
</body></html>