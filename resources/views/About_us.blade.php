<!DOCTYPE html>

<html class="scroll-smooth" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
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
                        "background-dark": "#1A1A1A",
                    },
                    fontFamily: {
                        "display": ["Public Sans", "sans-serif"]
                    },
                    borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
                },
            },
        }
    </script>
</head>
<body class="bg-background-light font-display text-slate-900">
<!-- 1. Header: Persistent Sticky Navbar -->
<header class="sticky top-0 z-50 bg-background-light/95 backdrop-blur-md border-b border-slate-200">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="flex items-center justify-between h-20">
<div class="flex items-center gap-3">
<div class="text-primary">
<span class="material-symbols-outlined text-4xl">surfing</span>
</div>
<h1 class="text-xl font-bold tracking-tight text-slate-900 uppercase">Skate Surf Camp</h1>
</div>
<nav class="hidden md:flex items-center gap-8">
<a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Home</a>
<a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Packages</a>
<a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Yoga</a>
<a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Surf</a>
<a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Skate</a>
<a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Accommodation</a>
<a class="text-sm font-semibold text-primary" href="#">About</a>
<a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Contact</a>
</nav>
<button class="bg-primary hover:bg-primary/90 text-white px-6 py-2.5 rounded-xl font-bold text-sm transition-all">
                    Book Now
                </button>
</div>
</div>
</header>
<main>
<!-- 2. Why Choose Us Section -->
<section class="py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
<div class="relative">
<div class="aspect-[4/5] rounded-3xl overflow-hidden shadow-2xl bg-slate-200" data-alt="Modern surf camp exterior illuminated at night" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAqGQ88KUlqfaBuF0FTmSDwZd26-MKhagE2NMe3CpYfWqZpyf18fzCGY7JDWjrSla2akKKw0bN9j0m9OvnZpQqk3zcI5pMJ8_PBRAi1gguyO1QcarhcbwVTsx0zzmVKhO9qnpJ6NhSIhn0Mih5SZ_ZaKd6-hVI7CiwA4TIhuYpcBmEz2vh8NVkcp8H9JDhSy4BIfEEhP8uVF_5Z3oxbO-JnMQtoOaMfdl4P4NMY5wHGpzY6q9B5SZDJOrBG4fBl4xih_ResVGrgX9E"); background-size: cover; background-position: center;'>
</div>
<div class="absolute -bottom-6 -right-6 w-48 h-48 bg-primary/10 rounded-full -z-10"></div>
</div>
<div class="space-y-8">
<div>
<span class="text-primary font-medium tracking-widest uppercase text-sm block mb-4">Discover Our Story</span>
<h2 class="text-4xl lg:text-5xl font-bold leading-tight text-slate-900">Why Choose Our Community?</h2>
<p class="mt-6 text-lg text-slate-600 leading-relaxed">
                            Nestled in the heart of Morocco's coastline, Skate Surf Camp isn't just a destination—it's a lifestyle. We've built a sanctuary where professional coaching meets authentic local culture, creating memories that last a lifetime.
                        </p>
</div>
<div class="space-y-6">
<div class="space-y-2">
<div class="flex justify-between text-sm font-bold">
<span>Best Services</span>
<span>90%</span>
</div>
<div class="w-full bg-slate-200 h-2 rounded-full overflow-hidden">
<div class="bg-primary h-full w-[90%] rounded-full"></div>
</div>
</div>
<div class="space-y-2">
<div class="flex justify-between text-sm font-bold">
<span>Tour Agents</span>
<span>95%</span>
</div>
<div class="w-full bg-slate-200 h-2 rounded-full overflow-hidden">
<div class="bg-primary h-full w-[95%] rounded-full"></div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- 3. CTA Banner -->
<section class="bg-primary py-12">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-8">
<h3 class="text-3xl font-bold text-white text-center md:text-left">Ready for an unforgettable tour?</h3>
<button class="bg-background-dark text-white px-8 py-4 rounded-xl font-bold hover:bg-slate-800 transition-colors shadow-lg">
                    Book With Us Now
                </button>
</div>
</section>
<!-- 4. Video Promo Section -->
<section class="relative h-[600px] flex items-center justify-center overflow-hidden">
<div class="absolute inset-0 z-0 bg-fixed bg-center bg-cover brightness-50" data-alt="Breathtaking aerial view of Moroccan coastline waves" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAQ9ABas6qK6QstBXBdRPbbPJdYfyNUjH0EUfSBmjU_bGgX5NqMyPqZksQMkFArtOkor0izM2H9pQxMyWUtylraGKISRObWq_bwlxSfE5fECdTc7egETXP15OignHPdSsfeskkwXLFouqTqlIDqzbPqVi-x1QnxrfP7S3jxbitssfPt7tC9OdqQXNT3dpmbsxXmcS9Nb4gPKBUshW0f5KZWUpFbnPAyRqWIiV_Ts1HMkRFatYganhH2z4IvOyRlW3zJ_0h-OC5bcrQ");'>
</div>
<div class="relative z-10">
<button class="group relative flex items-center justify-center">
<div class="absolute inset-0 bg-primary rounded-full animate-ping opacity-25"></div>
<div class="w-24 h-24 bg-primary text-white rounded-full flex items-center justify-center shadow-2xl group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-5xl translate-x-1">play_arrow</span>
</div>
</button>
</div>
</section>
<!-- 5. Floating Stats Row -->
<section class="relative z-20 -mt-20 max-w-6xl mx-auto px-4">
<div class="bg-white rounded-2xl shadow-2xl grid grid-cols-2 md:grid-cols-4 p-8 md:p-12 gap-8 border border-slate-100">
<div class="flex flex-col items-center text-center space-y-2">
<span class="material-symbols-outlined text-primary text-4xl mb-2">groups</span>
<span class="text-3xl font-black">+1,568</span>
<span class="text-xs font-bold text-slate-500 uppercase tracking-widest">Happy Guests</span>
</div>
<div class="flex flex-col items-center text-center space-y-2">
<span class="material-symbols-outlined text-primary text-4xl mb-2">skateboarding</span>
<span class="text-3xl font-black">+10,000</span>
<span class="text-xs font-bold text-slate-500 uppercase tracking-widest">Surf &amp; Skate Lessons</span>
</div>
<div class="flex flex-col items-center text-center space-y-2">
<span class="material-symbols-outlined text-primary text-4xl mb-2">public</span>
<span class="text-3xl font-black">+35</span>
<span class="text-xs font-bold text-slate-500 uppercase tracking-widest">Countries</span>
</div>
<div class="flex flex-col items-center text-center space-y-2">
<span class="material-symbols-outlined text-primary text-4xl mb-2">calendar_month</span>
<span class="text-3xl font-black">7</span>
<span class="text-xs font-bold text-slate-500 uppercase tracking-widest">Years Experience</span>
</div>
</div>
</section>
<!-- 6. Meet The Team Section -->
<section class="py-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center mb-16">
<span class="text-primary font-medium tracking-widest uppercase text-sm block mb-4 italic font-serif">The People Behind the Passion</span>
<h2 class="text-4xl font-bold text-slate-900">Meet Our Coaches</h2>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
<!-- Team Member 1 -->
<div class="relative group aspect-[3/4] rounded-2xl overflow-hidden shadow-lg">
<div class="absolute inset-0 bg-cover bg-center" data-alt="Portrait of Khalid, Surf Coach" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuA1SPaZKYWO1p3KwdQRK1JUXojnrlLIu7ynyiv1O0C2l14FoYJvKciiveYBSITs4Kew6zi_rnuUWx6WygdRJTt051aQZ0VFlsLf28mzU4CfBs6SgXgMxtwTA7bSt4G8OJGj5_sYNNzAoEjwRQu5sfmxLdOaIrhK13fn3PDYAKRjsKrFSJdkoc3j8azgVKEMBM1UZtwRwbwzInwz_TH9O3PEPwZv117H74iYMQOx9hvhPe8DVI7ddVRtX2bnF1hO98ruqcViryNP6o4');"></div>
<div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
<div class="absolute bottom-4 left-4 right-4 bg-white/95 p-5 rounded-xl backdrop-blur-sm">
<h4 class="text-slate-900 font-bold text-lg">Khalid</h4>
<p class="text-primary font-semibold text-sm">Lead Surf Coach</p>
</div>
</div>
<!-- Team Member 2 -->
<div class="relative group aspect-[3/4] rounded-2xl overflow-hidden shadow-lg">
<div class="absolute inset-0 bg-cover bg-center" data-alt="Portrait of Aziz Adel, Skate Instructor" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBjp0tbym-KhiAGTPtzkZCZpNudt_8vsE0_DElDek2jo_kgTp-I0vaDwPU71J65c8fhqFExLWqNKbhPMCV87CYr4BIa-p5L_NWH479VHsM-0uRcwPzLb00hJTEDXVXYeHWL2JDWCWlDP-tb5DZ6TbXMiSPazGh-xnUYwuftKZYvGRTF7ScJA9ZBI5FQeayUzmjYEWY16r2RtWFEcBuj8Nx0NCI0FRKH2S4uhW71kdTjXAlnxiTrb5BryAfV1IWxOL3dMb_xkFiDi08');"></div>
<div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
<div class="absolute bottom-4 left-4 right-4 bg-white/95 p-5 rounded-xl backdrop-blur-sm">
<h4 class="text-slate-900 font-bold text-lg">Aziz Adel</h4>
<p class="text-primary font-semibold text-sm">Skateboarding Director</p>
</div>
</div>
<!-- Team Member 3 -->
<div class="relative group aspect-[3/4] rounded-2xl overflow-hidden shadow-lg">
<div class="absolute inset-0 bg-cover bg-center" data-alt="Portrait of Zakarya Hari, Logistics Manager" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD2PdZTToSF6e419RkmhovCfCEP8kYUAhNlN6ARvXmrdIUotjf-Zbd4RcVnTjfSOvlT6fbKckiEdLEWkziQNA_9QU9Xp_cLZXL2oCvdD71upDqV4D-0X1Fdvq5BbpY9YrLBxjyQUd3s72riEtHv8G1gQYGucoUuTTqnuFvHXetRugNYJX4m_WBye8RABfcRvFLhHa6gIe8JXE4pxWLRYIWfjj5YycFWfdo3Z-dwbojl3m9TtntIrGlHWf8790e3M0fkbYMWFe8EsNU');"></div>
<div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
<div class="absolute bottom-4 left-4 right-4 bg-white/95 p-5 rounded-xl backdrop-blur-sm">
<h4 class="text-slate-900 font-bold text-lg">Zakarya Hari</h4>
<p class="text-primary font-semibold text-sm">Camp Manager</p>
</div>
</div>
<!-- Team Member 4 -->
<div class="relative group aspect-[3/4] rounded-2xl overflow-hidden shadow-lg">
<div class="absolute inset-0 bg-cover bg-center" data-alt="Portrait of Coach Abdullah, Technical Coach" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAwqzkCS5Z2G91Fix5kvutrQOp0aBt6TZZn4-KcXL_GNy2SQKI1ZB0a1xVTdEpYHNnkkLUUSo6i48RKaIG9CNfilW13bcNCQml4ZtIhk4kA_IEspisynjXVbNbnqLPsSywnZ0ngK4H-lh0L167IQuH2f42mpD2mxDe-sQoTawdDPOzTOA1E1fd7YriwBBIn7YOp2jA6NBDYSdcd7ainZ2_bqE-BgK2sn-FNXzjGQXfa10NAtt1iYuP2m7fB7d5wr_V4BzA7NU1X0B4');"></div>
<div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
<div class="absolute bottom-4 left-4 right-4 bg-white/95 p-5 rounded-xl backdrop-blur-sm">
<h4 class="text-slate-900 font-bold text-lg">Coach Abdullah</h4>
<p class="text-primary font-semibold text-sm">Technical Coach</p>
</div>
</div>
</div>
</section>
<!-- 7. Partner Logo Slider -->
<section class="py-12 border-y border-slate-200 bg-slate-50">
<div class="max-w-7xl mx-auto px-4 flex flex-wrap justify-center items-center gap-12 md:gap-24 opacity-50 grayscale hover:grayscale-0 transition-all duration-500">
<span class="material-symbols-outlined text-6xl">waves</span>
<span class="material-symbols-outlined text-6xl">water_drop</span>
<span class="material-symbols-outlined text-6xl">eco</span>
<span class="material-symbols-outlined text-6xl">travel_explore</span>
<span class="material-symbols-outlined text-6xl">travel_explore</span>
</div>
</section>
</main>
<!-- 8. Footer (Dark Navy/Charcoal) -->
<footer class="bg-background-dark text-slate-400 py-16">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
<div class="space-y-6">
<div class="flex items-center gap-3 text-white">
<span class="material-symbols-outlined text-3xl text-primary">surfing</span>
<h2 class="text-xl font-bold uppercase">Skate Surf Camp</h2>
</div>
<p class="text-sm leading-relaxed">
                        The ultimate destination for surfing and skating enthusiasts in the heart of Morocco. Join our community for an experience you'll never forget.
                    </p>
</div>
<div>
<h4 class="text-white font-bold mb-6">Quick Links</h4>
<ul class="space-y-4 text-sm">
<li><a class="hover:text-primary" href="#">Packages &amp; Pricing</a></li>
<li><a class="hover:text-primary" href="#">Surf School</a></li>
<li><a class="hover:text-primary" href="#">Skate Park</a></li>
<li><a class="hover:text-primary" href="#">Yoga Studio</a></li>
</ul>
</div>
<div>
<h4 class="text-white font-bold mb-6">Contact Us</h4>
<ul class="space-y-4 text-sm">
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary text-xl">location_on</span>
                            Taghazout Bay, Morocco
                        </li>
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary text-xl">call</span>
                            +212 5XX XX XX XX
                        </li>
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary text-xl">mail</span>
                            hello@skatesurfcamp.com
                        </li>
</ul>
</div>
<div>
<h4 class="text-white font-bold mb-6">Newsletter</h4>
<p class="text-sm mb-4">Subscribe to get the latest surf reports and camp news.</p>
<div class="flex">
<input class="bg-slate-800 border-none rounded-l-lg px-4 py-2 w-full text-white text-sm focus:ring-1 focus:ring-primary" placeholder="Email Address" type="email"/>
<button class="bg-primary text-white px-4 py-2 rounded-r-lg hover:bg-primary/90 transition-colors">
<span class="material-symbols-outlined text-xl">send</span>
</button>
</div>
</div>
</div>
<div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs font-medium">
<p>© 2024 Skate Surf Camp Morocco. All rights reserved.</p>
<div class="flex gap-6">
<a class="hover:text-white" href="#">Privacy Policy</a>
<a class="hover:text-white" href="#">Terms of Service</a>
</div>
</div>
</div>
</footer>
</body></html>