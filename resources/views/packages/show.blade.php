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

@endsection
