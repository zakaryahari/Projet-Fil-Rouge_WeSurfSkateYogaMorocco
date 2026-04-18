@extends('layouts.app')

@section('content')
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Package Detail -->
    <article class="bg-white rounded-[2.5rem] overflow-hidden shadow-xl">
        <!-- Package Image -->
        <div class="relative h-96 overflow-hidden">
            <img alt="{{ $package->name }}" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDGi8OeFWu9tfG3iiv560d8YpJpNV8cPzTniZ5xEpNtTVCQ4sE9wvPwFm7LWQtzCwLrtqkj5Ii-HysBhZfOc_FIjJiKAhAk_K_QaE1mllarUW3JCXCHt2NOXXQdkxlD82db2C7Ld22QZlJ_v3LRoxmzDoF1qTaFdjBZJi-5lRtK1V4MBP5I_hxhBoNA47wkRcaiucd0Hl6Ba87cDviO7ZfN8zjdOWMdPIZ_IINAUlLuf9U2vVmWjRe9uKBqRGIspARwZ9yUSaADm7o">
            <span class="absolute top-6 left-6 bg-primary text-white text-[10px] font-black px-4 py-1.5 rounded-full uppercase tracking-[0.2em] shadow-lg">Featured</span>
        </div>

        <!-- Package Info -->
        <div class="p-12">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-6 uppercase leading-tight text-darkCharcoal">{{ $package->name }}</h1>

            <p class="text-gray-600 text-lg mb-8 leading-relaxed">{{ $package->description }}</p>

            <!-- Key Details -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12 py-8 border-y border-gray-200">
                <div>
                    <span class="text-gray-400 text-sm uppercase font-bold block mb-2">Duration</span>
                    <span class="text-3xl font-extrabold text-primary">{{ $package->duration_days }} Days</span>
                </div>
                <div>
                    <span class="text-gray-400 text-sm uppercase font-bold block mb-2">Difficulty</span>
                    <span class="text-3xl font-extrabold text-primary">Expert Level</span>
                </div>
                <div>
                    <span class="text-gray-400 text-sm uppercase font-bold block mb-2">Price starts at</span>
                    <span class="text-3xl font-extrabold text-darkCharcoal">€{{ number_format($package->base_price, 0) }}</span>
                </div>
            </div>

            <!-- Description -->
            <div class="mb-12">
                <h2 class="text-2xl font-extrabold text-darkCharcoal mb-4">About This Package</h2>
                <p class="text-gray-600 text-base leading-relaxed">
                    Experience the ultimate adventure combining world-class {{ strtolower($package->name) }}. Our expert instructors will guide you through an unforgettable journey designed for all skill levels.
                </p>
            </div>

            <!-- Includes -->
            <div class="mb-12">
                <h2 class="text-2xl font-extrabold text-darkCharcoal mb-4">What's Included</h2>
                <ul class="space-y-3">
                    <li class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 text-primary mr-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        Accommodation in private rooms
                    </li>
                    <li class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 text-primary mr-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        Daily professional instruction
                    </li>
                    <li class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 text-primary mr-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        Meals and refreshments
                    </li>
                    <li class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 text-primary mr-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        Equipment rental included
                    </li>
                </ul>
            </div>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 pt-8 border-t border-gray-200">
                <a href="{{ route('home') }}" class="border-2 border-primary text-primary px-8 py-3 rounded-full font-bold hover:bg-primary hover:text-white transition-all text-center">
                    ← Back to Packages
                </a>
                <a href="{{ route('bookings.packages') }}" class="bg-primary text-white px-8 py-3 rounded-full font-bold hover:bg-darkCharcoal transition-all text-center">
                    Book This Package →
                </a>
            </div>
        </div>
    </article>
</main>
@endsection
