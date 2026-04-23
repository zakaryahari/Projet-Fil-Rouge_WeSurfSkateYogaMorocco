@extends('layouts.app')

@section('content')
<main class="topo-texture">
    <!-- Camp Intro Section -->
    <section class="max-w-7xl mx-auto px-8 py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div class="space-y-6">
                <span class="italic text-primary text-2xl font-semibold">Camp Life</span>
                <h1 class="text-4xl md:text-5xl font-black tracking-tight leading-tight text-darkCharcoal">Camp, Atmosphere, Food & Drink</h1>
                <p class="text-slate-600 leading-relaxed text-lg">
                    Our Moroccan sanctuary is more than just a place to sleep. It's a vibrant community hub where the scent of fresh ocean air meets the aroma of traditional spices. Experience authentic hospitality in a space designed for surfers, skaters, and soul-seekers alike.
                </p>
                <div class="rounded-2xl overflow-hidden aspect-video bg-surface-container-high relative">
                    <img class="w-full h-full object-cover" data-alt="minimalist map graphic showing the coastal location of Taghazout Morocco with surf spot markers in soft blue tones" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDBTGmlZAs8D0lf4qJcL6J-pVx4ugOWLOBfcoS47JbvJjr8AZdUtzrfAxK-sowttMPAv7rvat6aN6anSZ8XSdmcC0_URPqHISftfCKuCiFKgnNTc0RcOyCcQfaMkX58Uf2M_ixdSWVQsHC8g0cAfwtNVvHB792yzrb5pVP6y-mVZpkTFp7uBXo4h8HBAuFPlt-85tsUg3002Bkk-1u1mopiYxk07xaA0Zxn6lZV9GXSqppcY-k0I3kt5pS6KvJLdnhjYnCKTgs_DKk"/>
                    <div class="absolute inset-0 flex items-center justify-center bg-black/5">
                        <span class="bg-white/90 px-4 py-2 rounded-full text-sm font-bold shadow-sm">Explore Our Coast</span>
                    </div>
                </div>
            </div>
            <div class="space-y-6 bg-white p-8 rounded-2xl shadow-lg">
                <span class="italic text-primary text-2xl font-semibold">Moroccan Soul</span>
                <h2 class="text-3xl font-bold tracking-tight text-darkCharcoal">Location & Conditions</h2>
                <div class="rounded-xl overflow-hidden aspect-[4/3] mb-6">
                    <img class="w-full h-full object-cover" data-alt="close-up of traditional Moroccan tagines with steaming hot food arranged on a colorful tiled table in warm afternoon sun" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCHOfr_DztgKYqwaNYsx9ox2uQGpZX6eLtNrEj29fhTZE6xpvGoivUN2d4YphsliNc6Caq9F9Is1i6tQPjE69QYwHPKBDNmBm03vv8v-nxxhi7kNaggdgnGLnCBqb_C5clE69glOL5DALPvIT-luILj1qIQ3mSuHumhF24C1tdyke8Se9kUMdxtKSRHcECIiUTuXMkyErEyfiEl8taZrLXuoGFQJVHPxElkq8-xuTzKkJPJcXL3zcDuYufvcx4JCGFtlLCnd9xvt7Q"/>
                </div>
                <p class="text-on-surface-variant">
                    Nestled in the heart of the coastal hills, we provide the perfect launchpad for world-class breaks and skate spots. After a day in the water, refuel with our chef's daily curated tagines and fresh local mint tea.
                </p>
            </div>
        </div>
    </section>

    <!-- Our Rooms Divider -->
    <section class="bg-slate-100 py-16 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-8 text-center relative z-10">
            <h2 class="text-5xl md:text-6xl font-black tracking-tighter uppercase text-darkCharcoal">Our Rooms</h2>
        </div>
    </section>

    <!-- Dynamic Room Sections -->
    <div class="py-20 space-y-32">
        @forelse($rooms as $room)
        <section class="max-w-7xl mx-auto px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                <div class="{{ $loop->even ? 'order-2 md:order-1' : '' }} relative group">
                    <div class="rounded-2xl overflow-hidden aspect-[4/5] shadow-xl">
                        <img class="w-full h-full object-cover" alt="{{ $room->name ?? $room->type }}"
                            src="{{ $room->image_path ? asset('storage/' . $room->image_path) : 'https://placehold.co/600x750/e2e8f0/94a3b8?text=No+Image' }}"
                            onerror="this.src='https://placehold.co/600x750/e2e8f0/94a3b8?text=No+Image'"/>
                    </div>
                </div>
                <div class="{{ $loop->even ? 'order-1 md:order-2' : '' }} space-y-8">
                    <div>
                        <span class="font-script text-primary-container text-2xl block mb-2">Accommodation</span>
                        <h3 class="text-4xl font-black tracking-tight">{{ $room->name ?? $room->type }}</h3>
                    </div>
                    <p class="text-on-surface-variant text-lg">{{ $room->type }} room — capacity {{ $room->capacity ?? 1 }} guest(s).</p>
                    <div class="flex gap-8 pt-4">
                        <div class="text-center">
                            <span class="material-symbols-outlined block text-3xl text-primary-container">bed</span>
                            <span class="text-[10px] uppercase font-bold tracking-widest">{{ $room->type }}</span>
                        </div>
                        <div class="text-center">
                            <span class="material-symbols-outlined block text-3xl text-primary-container">group</span>
                            <span class="text-[10px] uppercase font-bold tracking-widest">{{ $room->capacity ?? 1 }} Pax</span>
                        </div>
                        <div class="text-center">
                            <span class="material-symbols-outlined block text-3xl text-primary-container">payments</span>
                            <span class="text-[10px] uppercase font-bold tracking-widest">€{{ number_format($room->price_per_night, 0) }}/night</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @empty
        <div class="text-center py-16 text-gray-500 max-w-7xl mx-auto px-8">
            <span class="material-symbols-outlined text-6xl opacity-30 mb-4 block">bed</span>
            <p class="text-lg">No rooms available yet.</p>
        </div>
        @endforelse
    </div>

    <!-- Rooftop CTA -->
    <section class="py-24 flex flex-col items-center justify-center space-y-6">
        <div class="relative group cursor-pointer">
            <div class="w-24 h-24 bg-primary-container rounded-full flex items-center justify-center text-white shadow-2xl transition-transform group-hover:scale-110">
                <span class="material-symbols-outlined text-5xl" style="font-variation-settings: 'FILL' 1;">play_arrow</span>
            </div>
            <div class="absolute -inset-4 border-2 border-primary-container/20 rounded-full animate-pulse"></div>
        </div>
        <span class="font-script text-primary-container text-4xl">Rooftop Lounge</span>
        <p class="text-on-surface-variant font-medium">Click to see the sunset view</p>
    </section>

    <!-- Final CTA Section -->
    <section class="max-w-7xl mx-auto px-8 py-20">
        <div class="bg-surface-container-lowest rounded-[3rem] p-8 md:p-16 flex flex-col md:flex-row items-center gap-16 shadow-sm">
            <div class="w-full md:w-1/2">
                <div class="rounded-[2.5rem] overflow-hidden aspect-square shadow-2xl">
                    <img class="w-full h-full object-cover" data-alt="lifestyle shot of people laughing on a sun-drenched rooftop terrace with a skate ramp in the background and ocean views" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD3n1eoB9MO1obc2_GBfbOIzKiWa_B4z9_r750m_0wY5GDwfxXaBhtVhGrRY7xBpOp6k9qurtbKIc0DZFCF6XS-0LzlyhQ0W5YuEhHt9KKgBOjphctMiDlSnxaxcnuXJhqoLYCHX7Ir6i32UhgzYmG-FJrVLQ8MlJO7TEP5Q5zEgI6AkbMlgo5-Z69CdV9ElvTWNSW56Dtr9lefR4rsAOJQPhMH8G_8gNskj3g8IfIsBMYOHtdN5mPFRa92wvYSYjQOBoa1FnIDFPU"/>
                </div>
            </div>
            <div class="w-full md:w-1/2 space-y-8 text-center md:text-left">
                <h2 class="text-5xl font-black tracking-tighter leading-none">What are you waiting for?</h2>
                <p class="text-on-surface-variant text-xl leading-relaxed">
                    Your Moroccan adventure is just a click away. Secure your spot in our coastal paradise and join our global family of surfers and skaters.
                </p>
                <button class="bg-primary-container text-white px-10 py-5 rounded-full text-xl font-black shadow-lg shadow-sky-200 hover:scale-105 transition-transform inline-flex items-center gap-3">
                    Book Your Stay
                    <span class="material-symbols-outlined">arrow_forward</span>
                </button>
            </div>
        </div>
    </section>
</main>
@endsection

<style>
    .topo-texture {
        background-image: url("data:image/svg+xml,%3Csvg width='500' height='500' viewBox='0 0 500 500' xmlns='http://www.w3.org/2000/svg'%3C%3Cpath d='M0 450c50-20 100-20 150 0s100 40 150 20 100-60 150-40 50 20 50 20v50H0v-50z' fill='%2300aeef' fill-opacity='0.03'/%3E%3C/svg%3E");
    }
</style>
