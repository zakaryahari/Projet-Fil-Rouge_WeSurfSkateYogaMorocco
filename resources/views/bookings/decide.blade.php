@extends('layouts.app')

@section('content')
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
            <a href="{{ route('bookings.choose') }}" class="group relative bg-surface-container-lowest rounded-2xl p-8 shadow-[0_20px_40px_rgba(24,28,30,0.06)] transition-all duration-300 hover:scale-105 border-4 border-transparent hover:border-primary-container/20 cursor-pointer block text-decoration-none">
                <div class="flex flex-col h-full">
                    <div class="mb-8 flex">
                        <div class="w-14 h-14 rounded-xl bg-primary-fixed flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-3xl">sailing</span>
                        </div>
                    </div>
                    <div class="mb-10">
                        <h2 class="text-2xl font-bold text-on-surface mb-3">Standard Packages</h2>
                        <p class="text-on-surface-variant leading-relaxed opacity-80">
                            Choose from our pre-curated packages designed to give you the best experience with expert coaching and accommodation included.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <button class="w-full bg-primary-container hover:bg-primary text-white font-bold py-4 px-6 rounded-full transition-all duration-200 transform active:scale-95 shadow-lg shadow-primary-container/20 uppercase tracking-widest text-xs">
                            Browse Packages
                        </button>
                    </div>
                </div>
            </a>

            <!-- Card 2: Custom Adventure -->
            <div class="group relative bg-surface-container-lowest rounded-2xl p-8 shadow-[0_20px_40px_rgba(24,28,30,0.06)] transition-all duration-300 hover:scale-105 border-4 border-transparent hover:border-primary-container/20 cursor-pointer opacity-50">
                <div class="flex flex-col h-full">
                    <div class="mb-8 flex">
                        <div class="w-14 h-14 rounded-xl bg-primary-fixed flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-3xl">explore</span>
                        </div>
                    </div>
                    <div class="mb-10">
                        <h2 class="text-2xl font-bold text-on-surface mb-3">Custom Adventure</h2>
                        <p class="text-on-surface-variant leading-relaxed opacity-80">
                            Build your own itinerary. Choose your dates, activities, and accommodations for a bespoke experience.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <button disabled class="w-full bg-slate-400 text-white font-bold py-4 px-6 rounded-full transition-all duration-200 transform active:scale-95 shadow-lg shadow-slate-400/20 uppercase tracking-widest text-xs cursor-not-allowed">
                            Coming Soon
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Aesthetic Layering Image Decor -->
        <div class="mt-12 flex justify-center opacity-30">
            <img alt="Coastal landscape" class="w-full max-w-2xl h-48 object-cover rounded-2xl" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCLNb3u7d6hcJQUoN5WhYmzTtMzDZ4wPWlOzHp4LygWed3_FLcDskpH6N8szItlMknwKkg7fp9ZjFo2-Hsto7SXtdJ_2MwWmloYq7kALX-KQWsSTMfliQp3HUxZyUhKRbGUtkrAHilyHfXMf17B41X23fWq3w_YUOBmn_qAlgX4J8TU80gw56UKjx2wDqslGO9U9h23GKojMq59hArW9TJmAoymH5KY2r9HLOQDqmGBOEtRXQgO1TszWlbv0gbyovYp9doyKhwkDhk"/>
        </div>
    </div>
</main>
@endsection
