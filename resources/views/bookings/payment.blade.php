<!DOCTYPE html>

<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Secure Payment | Coastal Surf Morocco</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "tertiary-container": "#55a9eb",
                        "outline-variant": "#bdc8d1",
                        "on-tertiary": "#ffffff",
                        "secondary-fixed": "#e5e2e1",
                        "primary-fixed": "#c6e7ff",
                        "on-secondary-container": "#636262",
                        "inverse-primary": "#82cfff",
                        "secondary": "#5f5e5e",
                        "secondary-fixed-dim": "#c8c6c5",
                        "on-primary-fixed": "#001e2d",
                        "on-surface": "#181c1e",
                        "error": "#ba1a1a",
                        "background": "#f7fafc",
                        "on-tertiary-fixed-variant": "#004b74",
                        "on-primary": "#ffffff",
                        "primary": "#00658d",
                        "on-secondary": "#ffffff",
                        "on-primary-fixed-variant": "#004c6b",
                        "on-error": "#ffffff",
                        "surface-tint": "#00658d",
                        "primary-fixed-dim": "#82cfff",
                        "primary-container": "#00aeef",
                        "surface-bright": "#f7fafc",
                        "tertiary": "#006399",
                        "on-primary-container": "#003e58",
                        "surface-dim": "#d7dadc",
                        "surface-container-high": "#e5e9eb",
                        "surface": "#f7fafc",
                        "on-secondary-fixed-variant": "#474746",
                        "inverse-on-surface": "#eef1f3",
                        "surface-container": "#ebeef0",
                        "on-tertiary-container": "#003c5f",
                        "tertiary-fixed-dim": "#94ccff",
                        "outline": "#6e7881",
                        "on-error-container": "#93000a",
                        "surface-container-lowest": "#ffffff",
                        "on-surface-variant": "#3e4850",
                        "secondary-container": "#e2dfde",
                        "error-container": "#ffdad6",
                        "on-secondary-fixed": "#1c1b1b",
                        "tertiary-fixed": "#cde5ff",
                        "inverse-surface": "#2d3133",
                        "on-tertiary-fixed": "#001d32",
                        "on-background": "#181c1e",
                        "surface-variant": "#e0e3e5",
                        "surface-container-low": "#f1f4f6",
                        "surface-container-highest": "#e0e3e5"
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
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7fafc;
            color: #181c1e;
        }
        .editorial-lead {
            font-family: 'Inter', sans-serif;
            font-style: italic;
            color: #00aeef;
        }
    </style>
</head>
<body class="bg-surface selection:bg-primary-container/30">
<!-- TopNavBar -->
<nav class="fixed top-0 w-full z-50 bg-white/80 dark:bg-slate-900/80 backdrop-blur-lg shadow-[0_20px_40px_rgba(24,28,30,0.06)]">
<div class="flex justify-between items-center px-8 py-4 max-w-7xl mx-auto">
<div class="text-2xl font-black tracking-tighter text-slate-900 dark:text-white">Coastal Surf</div>
<div class="hidden md:flex items-center gap-8">
<a class="text-slate-600 dark:text-slate-400 font-inter tracking-tight font-medium hover:text-sky-500 transition-colors duration-200" href="#">Destinations</a>
<a class="text-slate-600 dark:text-slate-400 font-inter tracking-tight font-medium hover:text-sky-500 transition-colors duration-200" href="#">Lessons</a>
<a class="text-slate-600 dark:text-slate-400 font-inter tracking-tight font-medium hover:text-sky-500 transition-colors duration-200" href="#">Gear</a>
<a class="text-slate-600 dark:text-slate-400 font-inter tracking-tight font-medium hover:text-sky-500 transition-colors duration-200" href="#">Journal</a>
</div>
<div class="flex items-center gap-6">
<div class="flex gap-4">
<span class="material-symbols-outlined text-slate-600 dark:text-slate-400 cursor-pointer">shopping_cart</span>
<span class="material-symbols-outlined text-slate-600 dark:text-slate-400 cursor-pointer">account_circle</span>
</div>
<button class="bg-primary-container text-white px-6 py-2.5 rounded-full font-bold text-sm hover:opacity-90 active:scale-95 transition-all">Secure Checkout</button>
</div>
</div>
</nav>
<main class="pt-32 pb-24 px-6 max-w-7xl mx-auto">
<!-- Progress Bar -->
<div class="mb-16 max-w-2xl mx-auto">
<div class="flex items-center justify-between relative">
<!-- Line background -->
<div class="absolute top-1/2 left-0 w-full h-0.5 bg-surface-container-high -translate-y-1/2 z-0"></div>
<!-- Line active -->
<div class="absolute top-1/2 left-0 w-[66%] h-0.5 bg-primary-container -translate-y-1/2 z-0"></div>
<div class="relative z-10 flex flex-col items-center gap-2">
<div class="w-10 h-10 rounded-full bg-primary-container text-white flex items-center justify-center shadow-lg">
<span class="material-symbols-outlined text-xl">check</span>
</div>
<span class="text-[0.75rem] font-bold uppercase tracking-widest text-on-surface">Step 1</span>
</div>
<div class="relative z-10 flex flex-col items-center gap-2">
<div class="w-10 h-10 rounded-full bg-primary-container text-white flex items-center justify-center shadow-lg">
<span class="material-symbols-outlined text-xl">check</span>
</div>
<span class="text-[0.75rem] font-bold uppercase tracking-widest text-on-surface">Step 2</span>
</div>
<div class="relative z-10 flex flex-col items-center gap-2">
<div class="w-10 h-10 rounded-full bg-primary-container text-white flex items-center justify-center shadow-lg border-4 border-white">
<span class="font-bold text-sm">3</span>
</div>
<span class="text-[0.75rem] font-bold uppercase tracking-widest text-primary-container">Payment</span>
</div>
</div>
</div>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
<!-- Left Column: Payment -->
<div class="lg:col-span-7 space-y-10">
<header>
<span class="editorial-lead font-medium text-sm block mb-2">Final Step</span>
<h1 class="text-4xl md:text-5xl font-extrabold tracking-tighter text-on-surface mb-4">Complete your booking.</h1>
<p class="text-on-surface-variant text-lg leading-relaxed">Secure your spot at our Morocco Surf Camp with our encrypted payment gateway.</p>
</header>
<section class="space-y-6">
<h3 class="text-sm font-bold uppercase tracking-widest text-on-surface-variant">Payment Method</h3>
<div class="grid grid-cols-2 gap-4">
<label class="relative group cursor-pointer">
<input checked="" class="peer sr-only" name="payment_method" type="radio"/>
<div class="p-6 rounded-xl border-2 border-transparent bg-surface-container-lowest peer-checked:border-primary-container transition-all hover:bg-surface-container-low flex flex-col gap-3">
<span class="material-symbols-outlined text-primary-container text-3xl">credit_card</span>
<span class="font-bold text-on-surface">Credit / Debit</span>
</div>
</label>
<label class="relative group cursor-pointer">
<input class="peer sr-only" name="payment_method" type="radio"/>
<div class="p-6 rounded-xl border-2 border-transparent bg-surface-container-lowest peer-checked:border-primary-container transition-all hover:bg-surface-container-low flex flex-col gap-3">
<span class="material-symbols-outlined text-secondary text-3xl">payments</span>
<span class="font-bold text-on-surface">PayPal</span>
</div>
</label>
</div>
<!-- Card Form -->
<div class="bg-surface-container-lowest p-8 rounded-xl shadow-[0_20px_40px_rgba(24,28,30,0.06)] space-y-6">
<div class="space-y-2">
<label class="text-[0.75rem] font-bold uppercase tracking-wider text-on-surface-variant">Name on Card</label>
<input class="w-full px-4 py-3 bg-surface-container-low border-none rounded-md focus:ring-2 focus:ring-primary-container transition-all text-on-surface" placeholder="Johnathan Miller" type="text"/>
</div>
<div class="space-y-2 relative">
<label class="text-[0.75rem] font-bold uppercase tracking-wider text-on-surface-variant">Card Number</label>
<div class="relative">
<input class="w-full px-4 py-3 bg-surface-container-low border-none rounded-md focus:ring-2 focus:ring-primary-container transition-all text-on-surface" placeholder="0000 0000 0000 0000" type="text"/>
<div class="absolute right-4 top-1/2 -translate-y-1/2 flex gap-2">
<span class="material-symbols-outlined text-on-surface-variant/40" style="font-variation-settings: 'FILL' 1;">branding_watermark</span>
<span class="material-symbols-outlined text-on-surface-variant/40" style="font-variation-settings: 'FILL' 1;">credit_card_heart</span>
</div>
</div>
</div>
<div class="grid grid-cols-2 gap-6">
<div class="space-y-2">
<label class="text-[0.75rem] font-bold uppercase tracking-wider text-on-surface-variant">Expiry Date</label>
<input class="w-full px-4 py-3 bg-surface-container-low border-none rounded-md focus:ring-2 focus:ring-primary-container transition-all text-on-surface" placeholder="MM / YY" type="text"/>
</div>
<div class="space-y-2">
<label class="text-[0.75rem] font-bold uppercase tracking-wider text-on-surface-variant">CVC</label>
<input class="w-full px-4 py-3 bg-surface-container-low border-none rounded-md focus:ring-2 focus:ring-primary-container transition-all text-on-surface" placeholder="123" type="text"/>
</div>
</div>
</div>
<!-- Security Badge -->
<div class="flex items-center gap-3 py-4 px-6 bg-green-50 rounded-full w-fit">
<span class="material-symbols-outlined text-green-600" style="font-variation-settings: 'FILL' 1;">shield_with_heart</span>
<span class="text-sm font-bold text-green-700">SSL Secure Encryption</span>
<span class="material-symbols-outlined text-green-600 text-sm">lock</span>
</div>
</section>
</div>
<!-- Right Column: Order Summary -->
<div class="lg:col-span-5 sticky top-28">
<div class="bg-surface-container-lowest rounded-2xl shadow-[0_20px_40px_rgba(24,28,30,0.06)] overflow-hidden">
<div class="p-8 space-y-8">
<div>
<h2 class="text-2xl font-extrabold tracking-tight text-on-surface mb-6">Booking Summary</h2>
<div class="flex gap-4 items-start pb-8 border-b border-surface-container-high">
<div class="w-24 h-24 rounded-xl overflow-hidden flex-shrink-0">
<img class="w-full h-full object-cover" data-alt="surfer riding a clean turquoise wave in Morocco under bright morning sunlight" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCiDxE-vr41TQ8mm_6C01e-I3Opo9xYQ6rgMak4Yxl1Y_Ok1yn7JOoNhkhOmVYKzyuX4omr57DY1KnXWmkVdWiGykudt4IgB8d4wLDa6QBYwHihhkEQfhI_EkKD2Kj4SqwSi-CKiFmLtn6F4EAWASJScCxk_wipx0z-MqMivYJDvOa8oW-KjhF1n4x86MOYvIxZalqECZnmYYTRhRV6j45G9aP9AGF9Mwix6y4ulrtquUZfvjQ0p879X-UP9SbqPGKMsCyTuq_yg_I"/>
</div>
<div class="space-y-1">
<h4 class="font-bold text-on-surface">Surf Coaching Package</h4>
<p class="text-sm text-on-surface-variant flex items-center gap-1">
<span class="material-symbols-outlined text-sm">calendar_today</span>
                                        Oct 12 - Oct 19
                                    </p>
<p class="text-sm text-on-surface-variant flex items-center gap-1">
<span class="material-symbols-outlined text-sm">bed</span>
                                        Single Room
                                    </p>
</div>
</div>
</div>
<div class="space-y-4">
<h5 class="text-[0.75rem] font-bold uppercase tracking-widest text-on-surface-variant">Extras</h5>
<ul class="space-y-3">
<li class="flex justify-between text-sm">
<span class="text-on-surface-variant">Paradise Valley Tour</span>
<span class="font-medium text-on-surface">Included</span>
</li>
<li class="flex justify-between text-sm">
<span class="text-on-surface-variant">Daily Yoga Sessions</span>
<span class="font-medium text-on-surface">Included</span>
</li>
</ul>
</div>
<div class="space-y-4 pt-6 border-t border-surface-container-high">
<div class="flex justify-between text-sm">
<span class="text-on-surface-variant">Subtotal</span>
<span class="text-on-surface font-medium">$790.00</span>
</div>
<div class="flex justify-between text-sm">
<span class="text-on-surface-variant">Service Fee</span>
<span class="text-on-surface font-medium">$45.00</span>
</div>
<div class="flex justify-between text-sm">
<span class="text-on-surface-variant">Tax (1.5%)</span>
<span class="text-on-surface font-medium">$15.00</span>
</div>
<div class="flex justify-between pt-4">
<span class="text-xl font-extrabold text-on-surface">Total</span>
<span class="text-2xl font-black text-primary-container">$850.00</span>
</div>
</div>
<div class="space-y-4 pt-4">
<button class="w-full bg-primary-container text-white py-5 rounded-full font-bold text-lg shadow-lg hover:brightness-105 active:scale-[0.98] transition-all">
                                Pay $850.00 &amp; Confirm Booking
                            </button>
<a class="block text-center text-sm font-bold text-on-surface-variant hover:text-primary transition-colors flex items-center justify-center gap-2" href="#">
<span class="material-symbols-outlined text-sm">arrow_back</span>
                                Back to Details
                            </a>
</div>
</div>
<div class="bg-surface-container-low px-8 py-4 text-center">
<p class="text-[0.65rem] text-on-surface-variant leading-tight">
                            By confirming your booking, you agree to our Terms of Service and Privacy Policy. Cancellation fees may apply according to your selected plan.
                        </p>
</div>
</div>
</div>
</div>
</main>
<!-- Footer -->
<footer class="bg-slate-950 w-full py-12">
<div class="flex flex-col md:flex-row justify-between items-center px-12 max-w-7xl mx-auto gap-6">
<div class="text-lg font-bold text-white">Coastal Surf</div>
<div class="flex gap-8">
<a class="font-inter text-xs uppercase tracking-[0.05em] text-slate-500 hover:text-sky-400 transition-all" href="#">Sustainability</a>
<a class="font-inter text-xs uppercase tracking-[0.05em] text-slate-500 hover:text-sky-400 transition-all" href="#">Terms of Booking</a>
<a class="font-inter text-xs uppercase tracking-[0.05em] text-slate-500 hover:text-sky-400 transition-all" href="#">Privacy</a>
<a class="font-inter text-xs uppercase tracking-[0.05em] text-slate-500 hover:text-sky-400 transition-all" href="#">Contact Us</a>
</div>
<div class="text-slate-500 font-inter text-xs uppercase tracking-[0.05em]">
                © 2024 Coastal Surf Editorial. Pure Fluidity.
            </div>
</div>
</footer>
</body></html>