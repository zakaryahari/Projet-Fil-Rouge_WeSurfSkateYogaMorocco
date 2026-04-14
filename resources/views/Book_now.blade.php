<!DOCTYPE html>

<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Booking - Skate Surf Camp Morocco</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#00AEEF",
                        "background-light": "#f8f6f6",
                        "background-dark": "#221610",
                    },
                    fontFamily: {
                        "display": ["Public Sans"]
                    },
                    borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
                },
            },
        }
    </script>
</head>
<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100 transition-colors duration-200">
<!-- Persistent Sticky Navbar -->
<nav class="sticky top-0 z-50 w-full bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-md border-b border-slate-200 dark:border-slate-800">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="flex justify-between h-16 items-center">
<div class="flex items-center gap-2 text-primary">
<span class="material-symbols-outlined text-3xl">surfing</span>
<span class="font-bold text-xl tracking-tight text-slate-900 dark:text-white">Skate Surf Camp</span>
</div>
<div class="hidden md:flex items-center gap-8">
<a class="text-sm font-medium hover:text-primary transition-colors" href="#">Home</a>
<a class="text-sm font-medium hover:text-primary transition-colors text-primary" href="#">Packages</a>
<a class="text-sm font-medium hover:text-primary transition-colors" href="#">Gallery</a>
<a class="text-sm font-medium hover:text-primary transition-colors" href="#">About</a>
<button class="bg-primary text-white px-5 py-2 rounded-xl text-sm font-bold hover:bg-primary/90 transition-all">Sign In</button>
</div>
</div>
</div>
</nav>
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
<!-- 3-Step Progress Bar -->
<div class="mb-12 max-w-3xl mx-auto">
<div class="flex items-center justify-between mb-4">
<div class="flex flex-col items-center gap-2">
<div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold">1</div>
<span class="text-xs font-semibold text-primary">Select Package</span>
</div>
<div class="flex-1 h-1 bg-primary mx-4 rounded-full"></div>
<div class="flex flex-col items-center gap-2">
<div class="w-10 h-10 rounded-full bg-slate-200 dark:bg-slate-700 text-slate-500 flex items-center justify-center font-bold">2</div>
<span class="text-xs font-semibold text-slate-400">Personal Details</span>
</div>
<div class="flex-1 h-1 bg-slate-200 dark:bg-slate-700 mx-4 rounded-full"></div>
<div class="flex flex-col items-center gap-2">
<div class="w-10 h-10 rounded-full bg-slate-200 dark:bg-slate-700 text-slate-500 flex items-center justify-center font-bold">3</div>
<span class="text-xs font-semibold text-slate-400">Confirmation</span>
</div>
</div>
</div>
<div class="flex flex-col lg:flex-row gap-8">
<!-- Left Column: Multi-step form -->
<div class="lg:w-2/3 space-y-10">
<!-- Step 1: Choose Adventure -->
<section>
<div class="flex items-center gap-3 mb-6">
<span class="material-symbols-outlined text-primary">explore</span>
<h2 class="text-2xl font-bold">Step 1: Choose Your Adventure</h2>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
<!-- Card 1 -->
<div class="relative group cursor-pointer border-2 border-primary rounded-xl overflow-hidden bg-white dark:bg-slate-800 shadow-sm hover:shadow-md transition-all">
<div class="h-32 bg-cover bg-center" data-alt="Surfer catching a wave in Morocco" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAMmL_F0XZaaHgaH2jLGIo2ozGl_rVczAq0JaOBDl9nn7J513o1_BCYZH264iziMyFIjuwGQkCp_EPQ8bOOtzPoG7g5HIy-ekaPBNqrL1PvUl_xGht-HLN7s8WNqSUHCNcY1TjqZO_OlKdbjDTiayS2L53I42YGJLTYaa2jv3UAFu0tWr7u7y7jxDoX9xEHUxO1rfCfc5udXeVIDVsMRcwvrFG2EzEraQ0e8uegguBtWFuWBGRTvBsRdhCSrxJGRu1W0vmytS8SS9c')"></div>
<div class="p-4">
<h3 class="font-bold text-lg">Surf Coaching</h3>
<p class="text-sm text-slate-500 dark:text-slate-400">All levels welcome</p>
<p class="text-primary font-bold mt-2">$599/week</p>
</div>
<div class="absolute top-2 right-2 bg-primary text-white rounded-full p-1">
<span class="material-symbols-outlined text-sm">check</span>
</div>
</div>
<!-- Card 2 -->
<div class="relative group cursor-pointer border-2 border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden bg-white dark:bg-slate-800 shadow-sm hover:border-primary/50 transition-all">
<div class="h-32 bg-cover bg-center" data-alt="Skateboarder on a mini ramp by the ocean" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAMmDxPD5uw5EWtoxowOtU_7M63QZ7ZVkmoswxWpfURyqnlEQnVyPf2D27q3VZnIlQ4Ncv-2VyXBjWhbtLEpNT325VKT5_ENwBeG2GUPVNrJNL3TQbbuyEXya2MHdsF7kyXci43jHHbWqU7tVwUuU9ghF40bsVwvsnu2nGtooDEB2l42MN2y32IRho4aeVHBXHDcp5KPHN3kxG8jmfEQiy86NjZOcbEPE47xgmVs7-cz-pkGO9AuRpceYPckPLwER87fsVOs6lweUI')"></div>
<div class="p-4">
<h3 class="font-bold text-lg">Surf &amp; Skate</h3>
<p class="text-sm text-slate-500 dark:text-slate-400">Waves and ramps</p>
<p class="text-primary font-bold mt-2">$699/week</p>
</div>
</div>
<!-- Card 3 -->
<div class="relative group cursor-pointer border-2 border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden bg-white dark:bg-slate-800 shadow-sm hover:border-primary/50 transition-all">
<div class="h-32 bg-cover bg-center" data-alt="Professional surfing equipment on a beach" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDnH-QYODp2z1M52yekXKGPA7_GT1WxdvgMYAvlyJkbGvAn7zECku2SzXcu1ayr_XI9iaJXbmbq-IUtTy9-0PdBgMgBR-b9YE2DrDP2EGwgSrZhgRG0nKqHAB90agNQagK_LCDkwymbbCn6XxW9ltRQIyAAZRiFMdXckkt8chZI0uaGfoN-9v-yz9-a4s2ARkCVzNrhWEiJgwm2jqWExSdR-ixXcgnNLzY6YDJ1Z2RTZrjL8vvvh6a1zO49seBW-o5Q-t2jsT6UKLY')"></div>
<div class="p-4">
<h3 class="font-bold text-lg">Elite Surf Camp</h3>
<p class="text-sm text-slate-500 dark:text-slate-400">Advanced coaching</p>
<p class="text-primary font-bold mt-2">$899/week</p>
</div>
</div>
</div>
</section>
<!-- Step 2: Stay Details -->
<section>
<div class="flex items-center gap-3 mb-6">
<span class="material-symbols-outlined text-primary">calendar_month</span>
<h2 class="text-2xl font-bold">Step 2: Stay Details</h2>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700">
<div class="flex flex-col gap-2">
<label class="text-sm font-semibold text-slate-600 dark:text-slate-300">Arrival Date</label>
<input class="bg-slate-50 dark:bg-slate-900 border-slate-200 dark:border-slate-700 rounded-lg p-3 focus:ring-primary focus:border-primary" type="date"/>
</div>
<div class="flex flex-col gap-2">
<label class="text-sm font-semibold text-slate-600 dark:text-slate-300">Duration</label>
<select class="bg-slate-50 dark:bg-slate-900 border-slate-200 dark:border-slate-700 rounded-lg p-3 focus:ring-primary focus:border-primary">
<option>1 Week</option>
<option>2 Weeks</option>
<option>10 Days</option>
</select>
</div>
</div>
</section>
<!-- Step 3: Accommodation -->
<section>
<div class="flex items-center gap-3 mb-6">
<span class="material-symbols-outlined text-primary">bed</span>
<h2 class="text-2xl font-bold">Step 3: Accommodation</h2>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
<div class="border-2 border-slate-200 dark:border-slate-700 p-5 rounded-xl bg-white dark:bg-slate-800 hover:border-primary transition-colors cursor-pointer">
<span class="material-symbols-outlined text-3xl text-primary mb-2">person</span>
<h3 class="font-bold">Single Room</h3>
<p class="text-sm text-slate-500 mb-4">Private privacy</p>
<p class="font-bold text-slate-900 dark:text-white">+$200</p>
</div>
<div class="border-2 border-primary p-5 rounded-xl bg-primary/5 dark:bg-primary/10 transition-colors cursor-pointer relative">
<span class="material-symbols-outlined text-3xl text-primary mb-2">group</span>
<h3 class="font-bold">Double Room</h3>
<p class="text-sm text-slate-500 mb-4">Shared with one</p>
<p class="font-bold text-slate-900 dark:text-white">+$100</p>
<span class="absolute top-4 right-4 text-xs font-bold bg-primary text-white px-2 py-0.5 rounded-full">Popular</span>
</div>
<div class="border-2 border-slate-200 dark:border-slate-700 p-5 rounded-xl bg-white dark:bg-slate-800 hover:border-primary transition-colors cursor-pointer">
<span class="material-symbols-outlined text-3xl text-primary mb-2">groups</span>
<h3 class="font-bold">Triple Room</h3>
<p class="text-sm text-slate-500 mb-4">Dorm style vibe</p>
<p class="font-bold text-slate-900 dark:text-white">Included</p>
</div>
</div>
</section>
<!-- Step 4: Personal Info -->
<section>
<div class="flex items-center gap-3 mb-6">
<span class="material-symbols-outlined text-primary">contact_page</span>
<h2 class="text-2xl font-bold">Step 4: Personal Info</h2>
</div>
<div class="bg-white dark:bg-slate-800 p-8 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 space-y-6">
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="flex flex-col gap-2">
<label class="text-sm font-semibold">Full Name</label>
<input class="bg-slate-50 dark:bg-slate-900 border-slate-200 dark:border-slate-700 rounded-lg p-3" placeholder="John Doe" type="text"/>
</div>
<div class="flex flex-col gap-2">
<label class="text-sm font-semibold">Email Address</label>
<input class="bg-slate-50 dark:bg-slate-900 border-slate-200 dark:border-slate-700 rounded-lg p-3" placeholder="john@example.com" type="email"/>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="flex flex-col gap-2">
<label class="text-sm font-semibold">Phone Number</label>
<input class="bg-slate-50 dark:bg-slate-900 border-slate-200 dark:border-slate-700 rounded-lg p-3" placeholder="+212 6..." type="tel"/>
</div>
<div class="flex flex-col gap-2">
<label class="text-sm font-semibold">Skill Level</label>
<select class="bg-slate-50 dark:bg-slate-900 border-slate-200 dark:border-slate-700 rounded-lg p-3">
<option>Beginner</option>
<option>Intermediate</option>
<option>Advanced</option>
</select>
</div>
</div>
<div class="flex flex-col gap-2">
<label class="text-sm font-semibold">Special Requirements / Allergies</label>
<textarea class="bg-slate-50 dark:bg-slate-900 border-slate-200 dark:border-slate-700 rounded-lg p-3" placeholder="Let us know anything else..." rows="3"></textarea>
</div>
</div>
</section>
</div>
<!-- Right Column: Order Summary -->
<div class="lg:w-1/3">
<div class="sticky top-24 bg-white dark:bg-slate-800 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
<div class="p-6 border-b border-slate-100 dark:border-slate-700">
<h3 class="text-xl font-bold">Order Summary</h3>
</div>
<div class="p-6 space-y-4">
<div class="flex justify-between text-sm">
<span class="text-slate-500 dark:text-slate-400">Package:</span>
<span class="font-semibold">Surf Coaching</span>
</div>
<div class="flex justify-between text-sm">
<span class="text-slate-500 dark:text-slate-400">Accommodation:</span>
<span class="font-semibold">Double Room</span>
</div>
<div class="flex justify-between text-sm">
<span class="text-slate-500 dark:text-slate-400">Duration:</span>
<span class="font-semibold">1 Week (7 Nights)</span>
</div>
<div class="flex justify-between text-sm">
<span class="text-slate-500 dark:text-slate-400">Dates:</span>
<span class="font-semibold">Oct 12 - Oct 19</span>
</div>
<div class="pt-4 border-t border-slate-100 dark:border-slate-700">
<div class="flex justify-between items-end">
<span class="text-lg font-bold">Total Price</span>
<div class="text-right">
<p class="text-3xl font-bold text-primary">$699</p>
<p class="text-xs text-slate-400">Includes all taxes &amp; fees</p>
</div>
</div>
</div>
<div class="bg-green-50 dark:bg-green-900/20 p-3 rounded-lg flex items-center gap-3 text-green-700 dark:text-green-400">
<span class="material-symbols-outlined text-xl">verified_user</span>
<span class="text-xs font-semibold uppercase tracking-wider">Safe &amp; Secure Checkout</span>
</div>
<button class="w-full bg-primary text-white py-4 rounded-xl font-bold text-lg hover:shadow-lg hover:shadow-primary/30 transition-all flex items-center justify-center gap-2">
<span>Confirm Booking</span>
<span class="material-symbols-outlined">arrow_forward</span>
</button>
<p class="text-[10px] text-center text-slate-400 px-4">
                            By clicking Confirm Booking, you agree to our Terms of Service and Cancellation Policy.
                        </p>
</div>
</div>
</div>
</div>
</main>
<!-- Footer -->
<footer class="bg-slate-900 text-slate-400 py-16 mt-20">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="grid grid-cols-1 md:grid-cols-4 gap-12">
<div class="col-span-1 md:col-span-1">
<div class="flex items-center gap-2 text-primary mb-6">
<span class="material-symbols-outlined text-3xl">surfing</span>
<span class="font-bold text-xl text-white">Skate Surf Camp</span>
</div>
<p class="text-sm leading-relaxed">Experience the ultimate combination of Atlantic waves and world-class skate facilities in the heart of Morocco.</p>
</div>
<div>
<h4 class="text-white font-bold mb-6 uppercase text-xs tracking-widest">Navigation</h4>
<ul class="space-y-4 text-sm">
<li><a class="hover:text-primary transition-colors" href="#">Our Packages</a></li>
<li><a class="hover:text-primary transition-colors" href="#">The Location</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Surf School</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Skate Park</a></li>
</ul>
</div>
<div>
<h4 class="text-white font-bold mb-6 uppercase text-xs tracking-widest">Support</h4>
<ul class="space-y-4 text-sm">
<li><a class="hover:text-primary transition-colors" href="#">Help Center</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Contact Us</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Privacy Policy</a></li>
<li><a class="hover:text-primary transition-colors" href="#">FAQs</a></li>
</ul>
</div>
<div>
<h4 class="text-white font-bold mb-6 uppercase text-xs tracking-widest">Join the Tribe</h4>
<div class="flex gap-4">
<a class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-primary transition-colors" href="#">
<span class="material-symbols-outlined text-white">share</span>
</a>
<a class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-primary transition-colors" href="#">
<span class="material-symbols-outlined text-white">mail</span>
</a>
<a class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-primary transition-colors" href="#">
<span class="material-symbols-outlined text-white">thumb_up</span>
</a>
</div>
</div>
</div>
<div class="mt-16 pt-8 border-t border-slate-800 text-center text-xs">
                © 2024 Skate Surf Camp Morocco. Ride the dream.
            </div>
</div>
</footer>
</body></html>