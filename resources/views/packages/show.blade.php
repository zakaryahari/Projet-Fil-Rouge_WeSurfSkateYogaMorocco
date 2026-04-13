@extends('layouts.app')

@section('title', $package->name . ' - WeSurfSkate Morocco')

@section('content')
<!-- Header Section -->
<header class="max-w-7xl mx-auto px-4 py-8 pt-24">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
        <div class="flex-1">
            <div class="flex items-center gap-2 mb-2">
                <span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Most Popular</span>
                <div class="flex text-yellow-400">
                    <span class="material-symbols-outlined text-sm">star</span>
                    <span class="material-symbols-outlined text-sm">star</span>
                    <span class="material-symbols-outlined text-sm">star</span>
                    <span class="material-symbols-outlined text-sm">star</span>
                    <span class="material-symbols-outlined text-sm">star</span>
                </div>
            </div>
            <h1 class="text-3xl md:text-4xl font-black leading-tight mb-4">{{ $package->name }}</h1>
            <div class="flex items-center gap-2 text-slate-500">
                <span class="material-symbols-outlined text-primary">location_on</span>
                <p class="text-sm">Hay Aitsoual Tamraght, Agadir 80030, Morocco</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 min-w-[240px]">
            <p class="text-slate-500 text-xs font-bold uppercase mb-1">Starting from</p>
            <p class="text-4xl font-black text-primary mb-2">€ {{ number_format($package->base_price, 2) }}</p>
            <div class="flex items-center gap-2 text-slate-600">
                <span class="material-symbols-outlined text-sm">schedule</span>
                <span class="text-sm font-semibold">Duration: 8 days</span>
            </div>
        </div>
    </div>
</header>

<!-- Main Image Slider Replacement (Static View for Design) -->
<section class="max-w-7xl mx-auto px-4 mb-12 relative group">
    <div class="grid grid-cols-4 grid-rows-2 gap-4 h-[500px]">
        <div class="col-span-4 md:col-span-2 row-span-2 rounded-2xl overflow-hidden relative">
            <img
                class="w-full h-full object-cover"
                alt="{{ $package->name }}"
                src="{{ $package->image_path ? asset('storage/' . $package->image_path) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuAFCCorc_A76mUs6f8pJd_OnXCY1PgvUPqrGAo4zhRNEAdyGtioBpZCic939IKBenFEY1d_c2SZGnHrJc8bxcCNrb86s5v6dPic_DZ-uW08m3BYfM3b1YWz7ddVX3uh9_UbBxGWLe1lhcKpf0CqVJYH3woAKoUhFQrAen_e7tGn0uoVM374_ZT1kkDcwiGxYyvlXi2opiOABPrAPgvMDEQraop_BLlisVrJvRG7fxNo8XdB0I1Mrznt9Ay3sZlPZdvPqQCmn-KIxdc' }}"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
        </div>
        <div class="hidden md:block col-span-1 row-span-1 rounded-2xl overflow-hidden">
            <img
                class="w-full h-full object-cover"
                alt="Beach view"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDq2963GtGtD_xgLND1rBuYFBClbUmOz_HlT3d5mjLQWF8ot52GZeNCtoRsOIV9NCghIl4b1CjKAhtYnwY4Ci_EBQ5DwwKMttN6OMoctnBwhEUhMk9C3faoTXorn-wbmnVqizbYhzWT18mNI0tk4wd7vUiIfek7oFGu2kjdZVigi7zMX09RdaIyFmmXBF6uPaPjOXCW66TmoSuWnbtq6A5NTjmnzXhMLVe-xifZI8cgMr0Px5nIRedfet0hR7Gx70ZEncTabxKcZpo"
            >
        </div>
        <div class="hidden md:block col-span-1 row-span-1 rounded-2xl overflow-hidden">
            <img
                class="w-full h-full object-cover"
                alt="Sunset"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCKBZHu3qzYuw1ZW-s9cFBRdxcnLOX20BspsYMnd-NVrhQ_r1JHtr2OdYolYHIxkcUgnbglE11-ESnldi3XVxJX1ItFmNH0A_5f9RXDezcft_qOVggu73jQHvMGHetEXnntInvcU4NXC_QwsTHkEWgQUf82jvkUKBxoYdlgAhgr2b1yuaX6XESXEv6SdJigf7luGQIj45113MU6olcgQJ68MOaLc7Ne65w9xeNm2WNdXO_prKTVjyUexLjSiMtz3T2bIqdVjtR9TQ8"
            >
        </div>
        <div class="hidden md:block col-span-2 row-span-1 rounded-2xl overflow-hidden">
            <img
                class="w-full h-full object-cover"
                alt="Group"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuANZsGGiy4J8BED7T_yGkNgsE7cxfsYeMOb3s_Op_TjnT4S-bgstxxDtMLRcX453EypFJbDfCyjagINNH464j5sklZ_d1DFFwRgfUXoWEirVc5OZA0uct0H2QNXgVKiL_SBtmnfU9zKh9CBjuONL_3wwD4RGv0PRuciLPOY2uNUWaphM9xPxLF7gkK01gKzs5S1iCHZySHIaA2t2xNgA0xaq41oFuehdpNjeJuGfjRkXwquB9WumfV2GIAd5FdIGFgmJJFr5KjdBrM"
            >
        </div>
    </div>
    <!-- Floating WhatsApp Button -->
    <a class="fixed bottom-8 left-8 z-50 bg-[#25D366] text-white p-4 rounded-full shadow-lg flex items-center gap-2 hover:scale-105 transition-transform" href="#">
        <svg class="w-6 h-6 fill-current" viewbox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766 0-3.18-2.587-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.522-2.961-2.638-.086-.115-.718-.954-.718-1.815 0-.861.451-1.283.612-1.456.16-.173.354-.216.471-.216s.235.004.339.009c.11.005.259-.042.405.314.144.354.494 1.205.537 1.291.043.086.072.187.015.302-.057.116-.086.187-.173.288-.086.101-.181.226-.259.303-.086.086-.174.18-.075.35.099.17.441.728.946 1.178.65.58 1.196.76 1.369.846.173.086.273.072.373-.043.101-.116.432-.504.547-.677.116-.173.231-.144.389-.086s1.008.475 1.181.561c.173.086.288.13.332.202.045.072.045.419-.1.824z"></path></svg>
        <span class="font-bold text-sm">Chat with us</span>
    </a>
    <!-- Slider Navigation Overlay -->
    <div class="absolute inset-x-8 top-1/2 -translate-y-1/2 flex justify-between pointer-events-none">
        <button class="bg-white/20 hover:bg-white/40 backdrop-blur-md p-2 rounded-full pointer-events-auto transition-colors">
            <span class="material-symbols-outlined text-white text-3xl">chevron_left</span>
        </button>
        <button class="bg-white/20 hover:bg-white/40 backdrop-blur-md p-2 rounded-full pointer-events-auto transition-colors">
            <span class="material-symbols-outlined text-white text-3xl">chevron_right</span>
        </button>
    </div>
</section>

<!-- Main Content Grid -->
<main class="max-w-7xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-10 gap-12 pb-24">
    <!-- Left Column (70%) -->
    <div class="lg:col-span-7 flex flex-col gap-12">
        <!-- Description -->
        <section>
            <h2 class="text-2xl font-black mb-6 flex items-center gap-2">
                <span class="w-8 h-1 bg-primary rounded-full"></span>
                Why Choose {{ $package->name }}?
            </h2>
            <p class="text-slate-600 leading-relaxed mb-4">
                {{ $package->description }}
            </p>
            <p class="text-slate-600 leading-relaxed">
                We combine world-class coaching with authentic Moroccan hospitality, premium accommodation, and a vibrant community atmosphere that makes every sunset session unforgettable.
            </p>
        </section>

        <!-- Skill Levels -->
        <section>
            <h3 class="text-xl font-black mb-6">Who is this Package For?</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="p-6 bg-white rounded-2xl border border-slate-100 hover:border-primary/50 transition-colors">
                    <span class="material-symbols-outlined text-primary mb-4 text-3xl">waves</span>
                    <h4 class="font-bold mb-2">Level 1: Beginner</h4>
                    <p class="text-xs text-slate-500">For those who have never surfed or are still learning the basics of standing up.</p>
                </div>
                <div class="p-6 bg-white rounded-2xl border border-slate-100 hover:border-primary/50 transition-colors">
                    <span class="material-symbols-outlined text-primary mb-4 text-3xl">sailing</span>
                    <h4 class="font-bold mb-2">Level 2: Intermediate</h4>
                    <p class="text-xs text-slate-500">For surfers who can stand up consistently and want to start riding green waves.</p>
                </div>
                <div class="p-6 bg-white rounded-2xl border border-slate-100 hover:border-primary/50 transition-colors">
                    <span class="material-symbols-outlined text-primary mb-4 text-3xl">storm</span>
                    <h4 class="font-bold mb-2">Level 3: Advanced</h4>
                    <p class="text-xs text-slate-500">For experienced surfers looking to improve maneuvers and technique.</p>
                </div>
            </div>
        </section>

        <!-- Included / Excluded -->
        <section class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-emerald-50 p-8 rounded-3xl">
                <h3 class="text-lg font-black text-emerald-800 mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined">check_circle</span> What's Included
                </h3>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3 text-sm text-slate-700">
                        <span class="material-symbols-outlined text-emerald-500 text-sm mt-0.5">check</span>
                        7 Nights Premium Accommodation
                    </li>
                    <li class="flex items-start gap-3 text-sm text-slate-700">
                        <span class="material-symbols-outlined text-emerald-500 text-sm mt-0.5">check</span>
                        Daily Breakfast, Lunch & 5 Dinners
                    </li>
                    <li class="flex items-start gap-3 text-sm text-slate-700">
                        <span class="material-symbols-outlined text-emerald-500 text-sm mt-0.5">check</span>
                        6 Days Professional Coaching
                    </li>
                    <li class="flex items-start gap-3 text-sm text-slate-700">
                        <span class="material-symbols-outlined text-emerald-500 text-sm mt-0.5">check</span>
                        Full Equipment Hire (Board & Wetsuit)
                    </li>
                </ul>
            </div>
            <div class="bg-rose-50 p-8 rounded-3xl">
                <h3 class="text-lg font-black text-rose-800 mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined">cancel</span> What's Excluded
                </h3>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3 text-sm text-slate-700">
                        <span class="material-symbols-outlined text-rose-500 text-sm mt-0.5">close</span>
                        Flights to/from Agadir/Marrakech
                    </li>
                    <li class="flex items-start gap-3 text-sm text-slate-700">
                        <span class="material-symbols-outlined text-rose-500 text-sm mt-0.5">close</span>
                        Travel Insurance (Mandatory)
                    </li>
                    <li class="flex items-start gap-3 text-sm text-slate-700">
                        <span class="material-symbols-outlined text-rose-500 text-sm mt-0.5">close</span>
                        Optional Alcohol Drinks
                    </li>
                    <li class="flex items-start gap-3 text-sm text-slate-700">
                        <span class="material-symbols-outlined text-rose-500 text-sm mt-0.5">close</span>
                        Personal Spending Money
                    </li>
                </ul>
            </div>
        </section>

        <!-- Tour Plan Accordion -->
        <section>
            <h3 class="text-xl font-black mb-6">8-Day Tour Plan</h3>
            <div class="space-y-3">
                <div class="border border-slate-200 rounded-xl overflow-hidden">
                    <button class="w-full flex items-center justify-between p-4 bg-white text-left">
                        <span class="font-bold flex items-center gap-4">
                            <span class="bg-primary text-white size-8 rounded-lg flex items-center justify-center text-xs">01</span>
                            Arrival & Sunset Session
                        </span>
                        <span class="material-symbols-outlined">expand_more</span>
                    </button>
                </div>
                <div class="border border-slate-200 rounded-xl overflow-hidden">
                    <button class="w-full flex items-center justify-between p-4 bg-white text-left">
                        <span class="font-bold flex items-center gap-4">
                            <span class="bg-primary/20 text-primary size-8 rounded-lg flex items-center justify-center text-xs">02</span>
                            Mastering the Fundamentals
                        </span>
                        <span class="material-symbols-outlined">expand_more</span>
                    </button>
                </div>
                <div class="border border-slate-200 rounded-xl overflow-hidden">
                    <button class="w-full flex items-center justify-between p-4 bg-white text-left">
                        <span class="font-bold flex items-center gap-4">
                            <span class="bg-primary/20 text-primary size-8 rounded-lg flex items-center justify-center text-xs">03</span>
                            Wave Selection & Paddling Power
                        </span>
                        <span class="material-symbols-outlined text-slate-400">expand_more</span>
                    </button>
                </div>
                <div class="flex justify-center pt-2">
                    <button class="text-primary text-sm font-bold flex items-center gap-1">View full 8-day itinerary <span class="material-symbols-outlined">keyboard_double_arrow_down</span></button>
                </div>
            </div>
        </section>

        <!-- Included Experiences -->
        <section>
            <h3 class="text-xl font-black mb-6">Included Experiences</h3>
            <div class="flex gap-6 overflow-x-auto pb-4 scrollbar-hide">
                <div class="min-w-[160px] text-center">
                    <div class="size-20 bg-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-3">
                        <span class="material-symbols-outlined text-primary text-4xl">self_improvement</span>
                    </div>
                    <p class="font-bold text-sm">Daily Yoga</p>
                </div>
                <div class="min-w-[160px] text-center">
                    <div class="size-20 bg-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-3">
                        <span class="material-symbols-outlined text-primary text-4xl">restaurant</span>
                    </div>
                    <p class="font-bold text-sm">Community Dinner</p>
                </div>
                <div class="min-w-[160px] text-center">
                    <div class="size-20 bg-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-3">
                        <span class="material-symbols-outlined text-primary text-4xl">outdoor_grill</span>
                    </div>
                    <p class="font-bold text-sm">Sunset BBQ</p>
                </div>
                <div class="min-w-[160px] text-center">
                    <div class="size-20 bg-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-3">
                        <span class="material-symbols-outlined text-primary text-4xl">movie</span>
                    </div>
                    <p class="font-bold text-sm">Surf Cinema</p>
                </div>
            </div>
        </section>
    </div>

    <!-- Right Column (30%) - Sidebar -->
    <aside class="lg:col-span-3 space-y-8">
        <!-- Booking Form Card -->
        <div class="bg-white rounded-3xl shadow-xl shadow-primary/5 p-8 border border-slate-100 sticky top-32">
            <h3 class="text-xl font-black mb-6">Book Your Adventure</h3>
            <form class="space-y-4">
                <div class="flex gap-4 mb-4">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input checked="" class="text-primary focus:ring-primary" name="guest_type" type="radio"/>
                        <span class="text-sm font-semibold">Adult</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input class="text-primary focus:ring-primary" name="guest_type" type="radio"/>
                        <span class="text-sm font-semibold">Child</span>
                    </label>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <input class="w-full rounded-xl border-slate-200 text-sm py-3 px-4 focus:ring-primary focus:border-primary" placeholder="First Name" type="text"/>
                    <input class="w-full rounded-xl border-slate-200 text-sm py-3 px-4 focus:ring-primary focus:border-primary" placeholder="Last Name" type="text"/>
                </div>
                <input class="w-full rounded-xl border-slate-200 text-sm py-3 px-4 focus:ring-primary focus:border-primary" placeholder="Email Address" type="email"/>
                <input class="w-full rounded-xl border-slate-200 text-sm py-3 px-4 focus:ring-primary focus:border-primary" placeholder="Phone Number" type="tel"/>
                <select class="w-full rounded-xl border-slate-200 text-sm py-3 px-4 focus:ring-primary focus:border-primary">
                    <option>Room Type: Shared Room</option>
                    <option>Room Type: Private Room</option>
                    <option>Room Type: Deluxe Suite</option>
                </select>
                <input class="w-full rounded-xl border-slate-200 text-sm py-3 px-4 focus:ring-primary focus:border-primary" type="date"/>
                <button class="w-full bg-primary text-white py-4 rounded-xl font-black text-lg shadow-lg shadow-primary/20 hover:opacity-90 transition-opacity mt-2">
                    Book Now
                </button>
            </form>
        </div>

        <!-- Tour Information Box -->
        <div class="bg-slate-900 text-white p-8 rounded-3xl">
            <h4 class="font-black text-lg mb-6">Quick Facts</h4>
            <div class="space-y-6">
                <div class="flex items-center gap-4">
                    <span class="material-symbols-outlined text-primary">groups</span>
                    <div>
                        <p class="text-[10px] uppercase font-bold text-slate-400">Max Guests</p>
                        <p class="text-sm font-bold">35 Surfers</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <span class="material-symbols-outlined text-primary">child_care</span>
                    <div>
                        <p class="text-[10px] uppercase font-bold text-slate-400">Min Age</p>
                        <p class="text-sm font-bold">12+ Years</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <span class="material-symbols-outlined text-primary">translate</span>
                    <div>
                        <p class="text-[10px] uppercase font-bold text-slate-400">Languages</p>
                        <p class="text-sm font-bold">English, French, Arabic</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Last Minute Deals -->
        <div>
            <h4 class="font-black text-lg mb-4">Last Minute Deals</h4>
            <div class="space-y-4">
                <div class="flex gap-4 p-2 bg-white rounded-2xl border border-slate-100">
                    <img class="size-16 rounded-xl object-cover" alt="Yoga" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAiXmLhqo3BeA-nHqzde5zQ9ymOLphLPaE5c9WhfCzGXj8R8uyeBRKQqUsfhbZg-7QT6aZlww_KH0-ZnuZPjTp1ejCGrYSQlFcS_2ongUyccO9umgSV35XmF2NXUWG-v8GL4KhFM1_nYaY4ck92EX-QrvmI0jc4CBTqBwqw8xUZj6Fwt03O6HxhLVqodR28g0XMXwziP3UUqNvxTfyW1Fs-bgOqa8vS1yqyE4eJbfV9ZusEbBNtR1QuQgml-qHnHKVdUadtr_8mKJw"/>
                    <div>
                        <p class="text-sm font-bold leading-tight mb-1">Zen Surf & Yoga</p>
                        <p class="text-primary text-xs font-black">€ 149.00</p>
                    </div>
                </div>
                <div class="flex gap-4 p-2 bg-white rounded-2xl border border-slate-100">
                    <img class="size-16 rounded-xl object-cover" alt="Skate" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC1h0V-sK-yysseYI9mm8H5Jz6bNBxWOOQ7n0j7KLCXwFeGzAK0nEbk5NVYQFQGGvv2aHp96kFz00CKRNUzVMEy2GOA-cwmGnRxJ3xT7VQDMLo7qnGMljvsYTzH2ZzxW4rV1zPK1LtY53hgSY67RD-e3AeAeMASuP142G_J_QJ2I4IpAoO2XQW_k1XmIzj3Zx7lrilo0xSipd_mkF7-Zz3kEfjg8cKYtDO0ajlo5NZRguI75m0yeWtWKRIVM8ygCgjyurWv9mlLmfk"/>
                    <div>
                        <p class="text-sm font-bold leading-tight mb-1">Pro Skate Intensive</p>
                        <p class="text-primary text-xs font-black">€ 229.00</p>
                    </div>
                </div>
            </div>
        </div>
    </aside>
</main>

<!-- Related Tours -->
<section class="max-w-7xl mx-auto px-4 pb-24">
    <h2 class="text-2xl font-black mb-8">You might also like</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Card 1 -->
        <div class="group bg-white rounded-3xl overflow-hidden border border-slate-100 hover:shadow-xl transition-all">
            <div class="relative h-56">
                <img class="w-full h-full object-cover transition-transform group-hover:scale-105" alt="Surfer on a longboard" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDg7Qk_34yUYn5UQi-FLwRg3-D7Yle2EB5oADqe-qjAdrb5YdxbpkbP9KNuqYWd9yhCv5ilzgNBsIMdGI_OM8YvmNO6Pm3C3YnF41rA7Wcn9xsEbfgpZcTpGc7Z2rLgi3EzaGQ5KRdTs1W-MkAFH2iBFNjn-zL2AsIeXUYiufG_EV6uVouq2hP3BgB8dJiiRxgIM1bKAmV-ZxiGhOx0_7OiO6uFC2v89YwLwtpj5SKtX-PdECJL70NQkKG8s8TRDvt27gFXfxkXXm8"/>
                <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-md px-3 py-1 rounded-lg text-xs font-black">€ 249.00</div>
            </div>
            <div class="p-6">
                <div class="flex text-yellow-400 mb-2">
                    <span class="material-symbols-outlined text-xs">star</span><span class="material-symbols-outlined text-xs">star</span><span class="material-symbols-outlined text-xs">star</span><span class="material-symbols-outlined text-xs">star</span><span class="material-symbols-outlined text-xs">star</span>
                </div>
                <h4 class="font-bold mb-4">Surf & Skate Combo</h4>
                <button class="w-full py-2 border border-primary text-primary font-bold rounded-xl hover:bg-primary hover:text-white transition-colors">Details</button>
            </div>
        </div>
        <!-- Card 2 -->
        <div class="group bg-white rounded-3xl overflow-hidden border border-slate-100 hover:shadow-xl transition-all">
            <div class="relative h-56">
                <img class="w-full h-full object-cover transition-transform group-hover:scale-105" alt="Yoga group by the ocean" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCTioRXR4oVgaeNwpRKfWum0nnadGZQkVNh8kUBLa-bhmFbn1_zg-yd5HHSmK-ZVQB0bMmxMhjhs_xMTGdyw06EF5f9Z_Dmi6RWTOCNw_Gpb05Mnni7FvWrvsVoGgu-MtIA72VJdCWl6TtZ_uM0P6GaAYNn5hSVMk-rwCZgv4nOPj6SFZRg7I6v69X4xZNZ15R3gt7iKPOzHP_3rbm9Hj-ILgEs_vYoJqtkYNssRfIqjkhZU4m7YJEHmy8f39OY8WewSli4N6j8bnU"/>
                <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-md px-3 py-1 rounded-lg text-xs font-black">€ 189.00</div>
            </div>
            <div class="p-6">
                <div class="flex text-yellow-400 mb-2">
                    <span class="material-symbols-outlined text-xs">star</span><span class="material-symbols-outlined text-xs">star</span><span class="material-symbols-outlined text-xs">star</span><span class="material-symbols-outlined text-xs">star</span><span class="material-symbols-outlined text-xs">star</span>
                </div>
                <h4 class="font-bold mb-4">Surf & Yoga Retreat</h4>
                <button class="w-full py-2 border border-primary text-primary font-bold rounded-xl hover:bg-primary hover:text-white transition-colors">Details</button>
            </div>
        </div>
        <!-- Card 3 -->
        <div class="group bg-white rounded-3xl overflow-hidden border border-slate-100 hover:shadow-xl transition-all">
            <div class="relative h-56">
                <img class="w-full h-full object-cover transition-transform group-hover:scale-105" alt="Aerial view of surfers in water" src="https://lh3.googleusercontent.com/aida-public/AB6AXuALGmovLzJFEWEFMyzqLYzTAufBrXK0un7infRgw52IW_I6bjrDc_K9lFzNDiSkTu-A9DS2Kx36fa_72QmKexdf9EKhEfoyDSDAg9N8JB3IM4UDnmVGAZLVevpgIvEGUS3RHofUEib1KVT2KCc1cEG-kbwG4UjLR4ZhxdJlGXHX5PacOF9Pqhu8orgDhfZhdxW6HXLpZJSGE0nQzjxOxQDdDv_E-JtV6kzmmi97AXdTuDBjceF3nGy5YD-YHE_QhksNS5NgIRbhAxE"/>
                <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-md px-3 py-1 rounded-lg text-xs font-black">€ 320.00</div>
            </div>
            <div class="p-6">
                <div class="flex text-yellow-400 mb-2">
                    <span class="material-symbols-outlined text-xs">star</span><span class="material-symbols-outlined text-xs">star</span><span class="material-symbols-outlined text-xs">star</span><span class="material-symbols-outlined text-xs">star</span><span class="material-symbols-outlined text-xs">star</span>
                </div>
                <h4 class="font-bold mb-4">Masterclass Surf Week</h4>
                <button class="w-full py-2 border border-primary text-primary font-bold rounded-xl hover:bg-primary hover:text-white transition-colors">Details</button>
            </div>
        </div>
    </div>
</section>
@endsection
