@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative w-full h-[600px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-black/50 z-10"></div>
        <img alt="Moroccan Surf Scene" class="w-full h-full object-cover" data-alt="Group of surfers walking on a Moroccan beach at sunset" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCuCKosRv7F2uFvNN_5jHrPyquVs4k34_GAGCy8LnMrdQZIdOQEgoK29_UPj6maUi40naHvF9Rj2xX-AY7MPK59CWcyEhhovTQP0lcEI12KIITPFa9XTxjuw2YYGATW0Nmx2kYEMyWlvPrf1Dhn-4UcZV-9qNTWIUoqiqY9Orxlyn4cK7l4JS0qQWshX1ugy8Y2Hb8Wuhu4kzXTF8MewO-gQS8b9i2gPAcJqIR8adcfqbz1jGkOH2ztGdAiTzb8TxZgCSiwlbNvTfU"/>
    </div>
    <div class="relative z-20 text-center max-w-4xl px-4">
        <h1 class="text-white text-4xl md:text-6xl font-black leading-tight mb-6">
            WeSurfSkateMorocco Events & Adventures — More Than Just Surfing
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
        Events & Adventures
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
                    <span class="text-lg font-medium">Natural Pools & Waterfalls</span>
                </li>
                <li class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-accent-blue font-bold">check_circle</span>
                    <span class="text-lg font-medium">Relaxing Jungle Vibe</span>
                </li>
                <li class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-accent-blue font-bold">check_circle</span>
                    <span class="text-lg font-medium">Perfect for Photos & Swimming</span>
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
            <h3 class="text-3xl md:text-4xl font-bold text-slate-900">Barbecue & DJ Night</h3>
            <p class="text-slate-600 text-lg leading-relaxed">
                As the sun dips below the horizon, the camp comes alive with the smell of fresh Moroccan barbecue and the beats of local DJs. We gather around the fire for stories, music, and an incredible view of the Saharan stars.
            </p>
            <ul class="space-y-4">
                <li class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-accent-blue font-bold">check_circle</span>
                    <span class="text-lg font-medium">Fresh Barbecue & Local Cuisine</span>
                </li>
                <li class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-accent-blue font-bold">check_circle</span>
                    <span class="text-lg font-medium">Live DJ & Chill Vibes</span>
                </li>
                <li class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-accent-blue font-bold">check_circle</span>
                    <span class="text-lg font-medium">Campfire & Stargazing Moments</span>
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
@endsection
