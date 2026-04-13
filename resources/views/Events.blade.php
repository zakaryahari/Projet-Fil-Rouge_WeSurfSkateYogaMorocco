<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#ec5b13",
                        "accent-blue": "#00AEEF",
                        "background-light": "#f8f6f6",
                        "background-dark": "#221610",
                    },
                    fontFamily: {
                        "display": ["Public Sans", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "2xl": "1.5rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
<style>
        .script-font { font-style: italic; font-weight: 600; }
    </style>
</head>
<body class="bg-background-light font-display text-slate-900 transition-colors duration-300">
<!-- Sticky Navbar -->
<nav class="sticky top-0 z-50 w-full border-b border-slate-200 bg-background-light/80 backdrop-blur-md">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="flex justify-between items-center h-20">
<div class="flex items-center gap-3">
<div class="text-primary">
<span class="material-symbols-outlined text-4xl">surfing</span>
</div>
<span class="text-xl font-black tracking-tighter uppercase text-slate-900">Skate Surf Camp</span>
</div>
<div class="hidden md:flex items-center gap-10">
<a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Home</a>
<a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Surf</a>
<a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Skate</a>
<a class="text-sm font-semibold text-primary" href="#">Events</a>
<a class="text-sm font-semibold hover:text-primary transition-colors" href="#">About</a>
</div>
<div class="flex items-center gap-4">
<button class="bg-primary hover:bg-primary/90 text-white px-6 py-2.5 rounded-full text-sm font-bold transition-all transform hover:scale-105">
                        Book Now
                    </button>
<div class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center overflow-hidden border-2 border-primary/20">
<img alt="User Profile" data-alt="Close up portrait of a smiling man" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAEufMrpdCYHUz1PIvyoUO6EwXPg93PSgG7URhKlyZKk2kKD-DmJcQ9ppWSRgfl52GHuyzZ4GNiHzKIRr6n2FH9INg-5RR93uoJVuNaBFlEzfFt1TOwr5BNXgGhpGFmeo2_HrMooHnDOP0biHXC4qzJ2na-QSenQ870ylF4_pSbgkijOl1N_cYSp_RzC6X8twCg6KrzCuGXbF9b_EstgjpLCRN5qlwK2VIKbQCreTPDIf3wflBqIafMaA05zkLBQDk7rFFmrrMprP4"/>
</div>
</div>
</div>
</div>
</nav>
<main class="w-full">
<!-- Hero Section -->
<section class="relative w-full h-[600px] flex items-center justify-center overflow-hidden">
<div class="absolute inset-0 z-0">
<div class="absolute inset-0 bg-black/50 z-10"></div>
<img alt="Moroccan Surf Scene" class="w-full h-full object-cover" data-alt="Group of surfers walking on a Moroccan beach at sunset" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCuCKosRv7F2uFvNN_5jHrPyquVs4k34_GAGCy8LnMrdQZIdOQEgoK29_UPj6maUi40naHvF9Rj2xX-AY7MPK59CWcyEhhovTQP0lcEI12KIITPFa9XTxjuw2YYGATW0Nmx2kYEMyWlvPrf1Dhn-4UcZV-9qNTWIUoqiqY9Orxlyn4cK7l4JS0qQWshX1ugy8Y2Hb8Wuhu4kzXTF8MewO-gQS8b9i2gPAcJqIR8adcfqbz1jGkOH2ztGdAiTzb8TxZgCSiwlbNvTfU"/>
</div>
<div class="relative z-20 text-center max-w-4xl px-4">
<h1 class="text-white text-4xl md:text-6xl font-black leading-tight mb-6">
                    WeSurfSkateMorocco Events &amp; Adventures — More Than Just Surfing
                </h1>
<p class="text-white/90 text-lg md:text-xl leading-relaxed font-medium">
                    Experience the soul of Morocco through our curated adventures. From hidden waterfalls in the Atlas Mountains to vibrant local markets and rhythmic nights under the starlit desert sky. Join our community for unforgettable moments.
                </p>
<div class="mt-10">
<button class="bg-accent-blue hover:bg-accent-blue/90 text-white px-10 py-4 rounded-xl text-lg font-bold transition-all">
                        Explore Our Calendar
                    </button>
</div>
</div>
</section>
<!-- Page Title Section -->
<div class="py-16 text-center">
<h2 class="text-4xl md:text-5xl font-black tracking-tight text-slate-900 uppercase">
                Events &amp; Adventures
            </h2>
<div class="w-24 h-1.5 bg-primary mx-auto mt-6 rounded-full"></div>
</div>
<!-- Event 1: Paradise Valley -->
<section class="max-w-7xl mx-auto px-4 py-16">
<div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
<div class="w-full lg:w-1/2 relative group">
<div class="absolute -inset-4 bg-primary/10 rounded-2xl -z-10 group-hover:scale-105 transition-transform"></div>
<img alt="Paradise Valley Morocco" class="w-full aspect-[4/3] object-cover rounded-2xl shadow-2xl" data-alt="Turquoise natural pools surrounded by palm trees and mountains" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAqMmLxUVC62mnYxnvxn9Q4ButGfxidOYJTcVKd2TFelvd1G17QwDEmPH1gbmWrOe4qx-Mw4XShSbzA2tIs2NVZhuhA5x-tNhCizCNBWPLTCiiQs8vC9b8QTzmUiENlvmFekpAX1t64gknGRgj1C7f4m0765TT9f-qUDJ3RQxe26MN9nky7lNHfs9HQK1ivU8ukuajxBsw_PeAJ1fZn1dEZW3Z4yxZWVtb_parHj6a_47HGJuy50s1tgc70pfAYT8wvHQpEn0ILJ88"/>
<div class="absolute top-1/2 -left-4 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-lg cursor-pointer">
<span class="material-symbols-outlined text-slate-900">chevron_left</span>
</div>
<div class="absolute top-1/2 -right-4 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-lg cursor-pointer">
<span class="material-symbols-outlined text-slate-900">chevron_right</span>
</div>
</div>
<div class="w-full lg:w-1/2 space-y-6">
<span class="script-font text-primary text-2xl">Adventure</span>
<h3 class="text-3xl md:text-4xl font-bold text-slate-900">Paradise Valley Day Trip</h3>
<p class="text-slate-600 text-lg leading-relaxed">
                        Journey deep into the Atlas Mountains to discover a hidden oasis. Paradise Valley is a natural wonderland of rock pools and palm groves where we spend the day swimming and jumping from limestone cliffs into crystal clear water.
                    </p>
<ul class="space-y-4">
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-accent-blue font-bold">check_circle</span>
<span class="text-lg font-medium">Natural Pools &amp; Waterfalls</span>
</li>
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-accent-blue font-bold">check_circle</span>
<span class="text-lg font-medium">Relaxing Jungle Vibe</span>
</li>
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-accent-blue font-bold">check_circle</span>
<span class="text-lg font-medium">Perfect for Photos &amp; Swimming</span>
</li>
</ul>
</div>
</div>
</section>
<!-- Event 2: Agadir Souk Market -->
<section class="bg-slate-100 py-20">
<div class="max-w-7xl mx-auto px-4">
<div class="flex flex-col lg:flex-row-reverse items-center gap-12 lg:gap-20">
<div class="w-full lg:w-1/2 relative group">
<div class="absolute -inset-4 bg-accent-blue/10 rounded-2xl -z-10 group-hover:scale-105 transition-transform"></div>
<img alt="Agadir Souk Market" class="w-full aspect-[4/3] object-cover rounded-2xl shadow-2xl" data-alt="Colorful spice market with pyramids of colorful powders" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDbrDbip8WWX4IRRl5-0MPSu_eg8v1mSmnMV0iU3mgR0xjlcFoBKNCtutAdqBhFXYmr6_PhBj5jpd9cvUBe2uNeOe9_H-_ML3qpjKAiqn-FmxC71Jg7KQARVRGSGEwtq2g3eZRvZ6KZjeyMSWY4dWvMdhRPYMljVMZFJIboKMnZLXS9bWlq_UaiC7DKTQ--wHwV82tHBZzonITsh5exyf1GhioYeuwUPUqi-NytmOnUVQucfMdmHueb4pTqh2fbIKCYWlUN26wtFg8"/>
<div class="absolute top-1/2 -left-4 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-lg cursor-pointer">
<span class="material-symbols-outlined text-slate-900">chevron_left</span>
</div>
<div class="absolute top-1/2 -right-4 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-lg cursor-pointer">
<span class="material-symbols-outlined text-slate-900">chevron_right</span>
</div>
</div>
<div class="w-full lg:w-1/2 space-y-6">
<span class="script-font text-primary text-2xl">Visit</span>
<h3 class="text-3xl md:text-4xl font-bold text-slate-900">Agadir Souk El Had</h3>
<p class="text-slate-600 text-lg leading-relaxed">
                            Lose yourself in the vibrant colors and intoxicating scents of one of Morocco's largest markets. Guided by our local team, you'll discover the best crafts, spices, and authentic treasures while learning the art of Moroccan bartering.
                        </p>
<ul class="space-y-4">
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-accent-blue font-bold">check_circle</span>
<span class="text-lg font-medium">Authentic Moroccan Culture</span>
</li>
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-accent-blue font-bold">check_circle</span>
<span class="text-lg font-medium">Handmade Local Products</span>
</li>
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-accent-blue font-bold">check_circle</span>
<span class="text-lg font-medium">A True Sensory Experience</span>
</li>
</ul>
</div>
</div>
</div>
</section>
<!-- Event 3: Barbecue & DJ Night -->
<section class="max-w-7xl mx-auto px-4 py-20">
<div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
<div class="w-full lg:w-1/2 relative group">
<div class="absolute -inset-4 bg-primary/10 rounded-2xl -z-10 group-hover:scale-105 transition-transform"></div>
<img alt="Campfire Party" class="w-full aspect-[4/3] object-cover rounded-2xl shadow-2xl" data-alt="People sitting around a campfire on a beach at night" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDahB-JmznXKiB75SVaNvsodqYfiOON3BrGmTl65Qt-Ett6In0gO_1A3F7j-mmdex2IyU9LL2f2M0qO5Poy0vNRz3hoaORDvmW3GblaO1Dzo5GN6LpkRM4J4y0RcvOCNE2aHuHLrudNokJQR5itvrSra0q6NDrJFYScoIIoxAJUdUsf4YlYBGTRikqfEZrUnICOTkhzYhnaW2F__M4acFpQ9iR8RebKudj3jIwNggzzSwA5iazbJHLiFCEVLVbCj_TICCFd3ukSZSc"/>
<div class="absolute top-1/2 -left-4 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-lg cursor-pointer">
<span class="material-symbols-outlined text-slate-900">chevron_left</span>
</div>
<div class="absolute top-1/2 -right-4 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-lg cursor-pointer">
<span class="material-symbols-outlined text-slate-900">chevron_right</span>
</div>
</div>
<div class="w-full lg:w-1/2 space-y-6">
<span class="script-font text-primary text-2xl">Adventure</span>
<h3 class="text-3xl md:text-4xl font-bold text-slate-900">Barbecue &amp; DJ Night</h3>
<p class="text-slate-600 text-lg leading-relaxed">
                        As the sun dips below the horizon, the camp comes alive with the smell of fresh Moroccan barbecue and the beats of local DJs. We gather around the fire for stories, music, and an incredible view of the Saharan stars.
                    </p>
<ul class="space-y-4">
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-accent-blue font-bold">check_circle</span>
<span class="text-lg font-medium">Fresh Barbecue &amp; Local Cuisine</span>
</li>
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-accent-blue font-bold">check_circle</span>
<span class="text-lg font-medium">Live DJ &amp; Chill Vibes</span>
</li>
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-accent-blue font-bold">check_circle</span>
<span class="text-lg font-medium">Campfire &amp; Stargazing Moments</span>
</li>
</ul>
</div>
</div>
</section>
<!-- Newsletter / CTA -->
<section class="bg-primary py-16">
<div class="max-w-4xl mx-auto px-4 text-center text-white">
<h2 class="text-3xl font-black mb-4">READY FOR YOUR NEXT ADVENTURE?</h2>
<p class="text-white/80 text-lg mb-8">Join our weekly newsletter to get updates on upcoming events and exclusive early-bird bookings.</p>
<div class="flex flex-col sm:flex-row gap-4 justify-center">
<input class="px-6 py-4 rounded-xl text-slate-900 w-full sm:w-80 focus:ring-2 focus:ring-accent-blue outline-none border-none" placeholder="Your email address" type="email"/>
<button class="bg-slate-900 text-white font-bold px-8 py-4 rounded-xl hover:bg-slate-800 transition-colors">Subscribe Now</button>
</div>
</div>
</section>
</main>
<!-- Footer -->
<footer class="bg-background-light border-t border-slate-200 py-12">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="grid grid-cols-1 md:grid-cols-4 gap-12">
<div class="col-span-1 md:col-span-1">
<div class="flex items-center gap-3 mb-6">
<div class="text-primary">
<span class="material-symbols-outlined text-3xl">surfing</span>
</div>
<span class="text-lg font-black tracking-tighter uppercase text-slate-900">Skate Surf Camp</span>
</div>
<p class="text-slate-500 text-sm leading-relaxed">The ultimate destination for surfing and skating enthusiasts in the heart of Morocco.</p>
</div>
<div>
<h4 class="font-bold mb-6 uppercase text-sm tracking-widest text-slate-900">Quick Links</h4>
<ul class="space-y-4 text-sm text-slate-500">
<li><a class="hover:text-primary" href="#">Surf Packages</a></li>
<li><a class="hover:text-primary" href="#">Skate Park</a></li>
<li><a class="hover:text-primary" href="#">Events</a></li>
<li><a class="hover:text-primary" href="#">About Us</a></li>
</ul>
</div>
<div>
<h4 class="font-bold mb-6 uppercase text-sm tracking-widest text-slate-900">Contact</h4>
<ul class="space-y-4 text-sm text-slate-500">
<li class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">location_on</span> Taghazout, Morocco</li>
<li class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">mail</span> hello@wesurfkate.com</li>
<li class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">phone</span> +212 600 000 000</li>
</ul>
</div>
<div>
<h4 class="font-bold mb-6 uppercase text-sm tracking-widest text-slate-900">Follow Us</h4>
<div class="flex gap-4">
<a class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center hover:bg-primary hover:text-white transition-colors" href="#">
<span class="material-symbols-outlined text-xl">share</span>
</a>
<a class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center hover:bg-primary hover:text-white transition-colors" href="#">
<span class="material-symbols-outlined text-xl">public</span>
</a>
<a class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center hover:bg-primary hover:text-white transition-colors" href="#">
<span class="material-symbols-outlined text-xl">video_library</span>
</a>
</div>
</div>
</div>
<div class="mt-12 pt-8 border-t border-slate-200 text-center text-slate-500 text-xs">
                © 2024 Skate Surf Camp Morocco. All rights reserved.
            </div>
</div>
</footer>
</body></html>