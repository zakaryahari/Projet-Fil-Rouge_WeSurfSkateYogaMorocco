@extends('layouts.app')

@section('content')
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header Section -->
    <div class="text-center mb-16">
        <p class="text-primary font-medium tracking-wide uppercase text-xs mb-3">Our Experiences</p>
        <h1 class="text-4xl md:text-5xl font-extrabold text-darkCharcoal tracking-tight leading-tight">
            Explore Our Packages
        </h1>
    </div>

    <!-- Packages Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        @forelse($packages as $package)
            <a href="{{ route('packages.detail', $package->id) }}" class="group relative bg-white rounded-[2.5rem] overflow-hidden shadow-xl hover-scale block text-decoration-none transition-all hover:shadow-2xl">
                <!-- Package Image -->
                <div class="relative h-72 overflow-hidden">
                    <img alt="{{ $package->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDGi8OeFWu9tfG3iiv560d8YpJpNV8cPzTniZ5xEpNtTVCQ4sE9wvPwFm7LWQtzCwLrtqkj5Ii-HysBhZfOc_FIjJiKAhAk_K_QaE1mllarUW3JCXCHt2NOXXQdkxlD82db2C7Ld22QZlJ_v3LRoxmzDoF1qTaFdjBZJi-5lRtK1V4MBP5I_hxhBoNA47wkRcaiucd0Hl6Ba87cDviO7ZfN8zjdOWMdPIZ_IINAUlLuf9U2vVmWjRe9uKBqRGIspARwZ9yUSaADm7o">
                    <span class="absolute top-6 left-6 bg-primary text-white text-[10px] font-black px-4 py-1.5 rounded-full uppercase tracking-[0.2em] shadow-lg">Featured</span>
                </div>

                <!-- Package Info -->
                <div class="p-10">
                    <h3 class="text-2xl font-extrabold mb-4 uppercase leading-tight text-darkCharcoal">{{ $package->name }}</h3>
                    <p class="text-gray-600 text-sm mb-6 line-clamp-2">{{ $package->description }}</p>

                    <div class="flex items-center text-primary font-bold text-sm mb-6">
                        <span>{{ $package->duration_days }} Days</span>
                        <span class="mx-3 opacity-30">|</span>
                        <span>Expert Level</span>
                    </div>

                    <!-- Price & CTA -->
                    <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                        <div>
                            <span class="text-gray-400 text-[10px] uppercase font-bold block mb-1">Price starts at</span>
                            <span class="text-3xl font-extrabold text-darkCharcoal">€{{ number_format($package->base_price, 0) }}</span>
                        </div>
                        <div class="bg-primary text-white p-4 rounded-full group-hover:bg-darkCharcoal transition-colors">
                            <svg class="lucide lucide-arrow-right" fill="none" height="20" stroke="currentColor" stroke-width="3" viewbox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                        </div>
                    </div>
                </div>
            </a>
        @empty
            <div class="col-span-full text-center py-16 text-gray-500">
                <span class="material-symbols-outlined text-6xl opacity-30 mb-4">inbox</span>
                <p class="text-lg">No packages available</p>
            </div>
        @endforelse
    </div>

    <!-- Back Button -->
    <div class="mt-16 flex justify-center">
        <a href="{{ route('home') }}" class="border-2 border-primary text-primary px-8 py-3 rounded-full font-bold hover:bg-primary hover:text-white transition-all">
            ← Back Home
        </a>
    </div>
</main>
@endsection
