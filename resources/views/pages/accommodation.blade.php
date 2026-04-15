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
                <div class="rounded-2xl overflow-hidden aspect-video bg-slate-100 relative">
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
                <p class="text-slate-600">
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

    <!-- Alternating Room Sections -->
    <div class="py-20 space-y-32">
        <!-- Single Room -->
        <section class="max-w-7xl mx-auto px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                <div class="relative group">
                    <div class="rounded-2xl overflow-hidden aspect-[4/5] shadow-xl">
                        <img class="w-full h-full object-cover" data-alt="bright modern single bedroom with light wood accents white linens and a large window overlooking the ocean" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA_zRp9w0svjCiWmxCkeszpAUTqbUDCnhlRIj0z8cFQC_FsGIi8zt61mVfsog3pXvrmuoh-lsadFhCKwq0095R3_r_B2T8G7YS_lZ1m4wutlZhjpHJeRbiCKi5IXM2iRx-z1W3pTVVrCHpqKe_OIaEMhUV1YtMPUlWGQJm6sRInA6VVjPVLt_txy-1_s8_eLz9J_Gj4wx0d-8_du1lhipoGjZ2dTmUgV8c1YS0jdfDxeIk4-cfVmqsdKFbJhZB0RM7FsqD_Ctbjz1o"/>
                    </div>
                    <div class="absolute top-1/2 -left-4 -translate-y-1/2 flex flex-col gap-2">
                        <button class="bg-white p-2 rounded-full shadow-lg hover:text-primary transition-colors"><span class="material-symbols-outlined">chevron_left</span></button>
                    </div>
                    <div class="absolute top-1/2 -right-4 -translate-y-1/2">
                        <button class="bg-white p-2 rounded-full shadow-lg hover:text-primary transition-colors"><span class="material-symbols-outlined">chevron_right</span></button>
                    </div>
                </div>
                <div class="space-y-8">
                    <div>
                        <span class="italic font-semibold text-primary text-2xl block mb-2">Accommodation</span>
                        <h3 class="text-4xl font-black tracking-tight">Private Single Room</h3>
                    </div>
                    <p class="text-on-surface-variant text-lg">
                        For those seeking a personal retreat after a high-energy day. Our single rooms offer peace, privacy, and premium comfort with artisanal Moroccan touches.
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3 font-medium"><span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">check_circle</span> Premium Orthopedic Mattress</li>
                        <li class="flex items-center gap-3 font-medium"><span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">check_circle</span> Private Ocean-View Balcony</li>
                        <li class="flex items-center gap-3 font-medium"><span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">check_circle</span> Daily Housekeeping Service</li>
                    </ul>
                    <div class="flex gap-8 pt-4 grayscale opacity-60">
                        <div class="text-center"><span class="material-symbols-outlined block text-3xl">bed</span><span class="text-[10px] uppercase font-bold tracking-widest">King</span></div>
                        <div class="text-center"><span class="material-symbols-outlined block text-3xl">desk</span><span class="text-[10px] uppercase font-bold tracking-widest">Work</span></div>
                        <div class="text-center"><span class="material-symbols-outlined block text-3xl">shower</span><span class="text-[10px] uppercase font-bold tracking-widest">Private</span></div>
                        <div class="text-center"><span class="material-symbols-outlined block text-3xl">wifi</span><span class="text-[10px] uppercase font-bold tracking-widest">Fast</span></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Double Room -->
        <section class="max-w-7xl mx-auto px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                <div class="order-2 md:order-1 space-y-8">
                    <div>
                        <span class="italic font-semibold text-primary text-2xl block mb-2">Accommodation</span>
                        <h3 class="text-4xl font-black tracking-tight">Standard Double Room</h3>
                    </div>
                    <p class="text-on-surface-variant text-lg">
                        Perfect for couples or friends traveling together. Spacious, airy, and flooded with natural light, designed to keep the coastal vibes flowing indoors.
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3 font-medium"><span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">check_circle</span> Twin or Double Configuration</li>
                        <li class="flex items-center gap-3 font-medium"><span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">check_circle</span> Hand-woven Berber Rugs</li>
                        <li class="flex items-center gap-3 font-medium"><span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">check_circle</span> En-suite Modern Bathroom</li>
                    </ul>
                    <div class="flex gap-8 pt-4 grayscale opacity-60">
                        <div class="text-center"><span class="material-symbols-outlined block text-3xl">group</span><span class="text-[10px] uppercase font-bold tracking-widest">2 Pax</span></div>
                        <div class="text-center"><span class="material-symbols-outlined block text-3xl">tv</span><span class="text-[10px] uppercase font-bold tracking-widest">Smart TV</span></div>
                        <div class="text-center"><span class="material-symbols-outlined block text-3xl">ac_unit</span><span class="text-[10px] uppercase font-bold tracking-widest">Climate</span></div>
                        <div class="text-center"><span class="material-symbols-outlined block text-3xl">coffee_maker</span><span class="text-[10px] uppercase font-bold tracking-widest">Bar</span></div>
                    </div>
                </div>
                <div class="order-1 md:order-2 relative group">
                    <div class="rounded-2xl overflow-hidden aspect-[4/5] shadow-xl">
                        <img class="w-full h-full object-cover" data-alt="stylish double room with two twin beds featuring indigo blue throws and large sliding doors opening to a terrace" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCUoxiqHxZ9AAJnipLcyAEjxDcws0B4OK0OgYq8NRcjxijXIn9Mqgzdr9UxPWb6kd2bMe1XPyOd9Iy6ctsgBcMTWIV1TxUtb2WgAxThei3NOJxh4vGKtReOG3k11vYvOrunBzOLdQ17esJo4o5VRQFhGFg_HwBZ3qeKxq9q-2_pTmSiPOmgGtxhPOsC3PXfkp5tB7sqkyFJ2FQOB2aw1edPvjnIZoJ8ivpPOYlmNHCu7_uSXB4hd_E5zmUXhgm5JkCHjvD3E77eC7Y"/>
                    </div>
                </div>
            </div>
        </section>

        <!-- Shared Room -->
        <section class="max-w-7xl mx-auto px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                <div class="relative group">
                    <div class="rounded-2xl overflow-hidden aspect-[4/5] shadow-xl">
                        <img class="w-full h-full object-cover" data-alt="modern luxury hostel dormitory with custom wood bunk beds individual reading lights and locker storage with a community vibe" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAtnz86y3RHWS_MStur4DUQWSNyM4ZzzmwVuqehe1tyuZPYQ22wHrbzJBm89-ofZy3rsSanUCj3sH37rmunNHDKomJlbpqJh-8ehs3azgwwNegOKcpalwHkh2-BeWgKJtxxrP8rxH0ufa6e2yHEkaOrUcTPkbuyvWe4_ZGbYTLPxkovZZEwY4Seb0kUFKQRV-nUTzrmHEkG4gtYV66H88YqaydW0T6B1yUU1VNhG7zhmJP7URQKmniEoZZzG3Qc_FIov3LQvEhoaf8"/>
                    </div>
                    <div class="absolute -bottom-6 -right-6 bg-primary text-white px-8 py-4 rounded-xl shadow-2xl">
                        <p class="font-bold text-xl">Community Vibes</p>
                        <p class="text-sm opacity-90">Meet your next surf buddy</p>
                    </div>
                </div>
                <div class="space-y-8">
                    <div>
                        <span class="italic font-semibold text-primary text-2xl block mb-2">Accommodation</span>
                        <h3 class="text-4xl font-black tracking-tight">Surf Dorm / Shared</h3>
                    </div>
                    <p class="text-on-surface-variant text-lg">
                        Our shared rooms are the heartbeat of the camp. High-end bunk designs with maximum privacy and dedicated lockers, perfect for solo travelers looking to connect.
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3 font-medium"><span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">check_circle</span> Personal Power & Lights</li>
                        <li class="flex items-center gap-3 font-medium"><span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">check_circle</span> Secure Under-bed Lockers</li>
                        <li class="flex items-center gap-3 font-medium"><span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">check_circle</span> Social Lounge Access</li>
                    </ul>
                    <div class="flex gap-8 pt-4 grayscale opacity-60">
                        <div class="text-center"><span class="material-symbols-outlined block text-3xl">diversity_3</span><span class="text-[10px] uppercase font-bold tracking-widest">Shared</span></div>
                        <div class="text-center"><span class="material-symbols-outlined block text-3xl">lock</span><span class="text-[10px] uppercase font-bold tracking-widest">Secure</span></div>
                        <div class="text-center"><span class="material-symbols-outlined block text-3xl">charging_station</span><span class="text-[10px] uppercase font-bold tracking-widest">Power</span></div>
                        <div class="text-center"><span class="material-symbols-outlined block text-3xl">nest_eco_leaf</span><span class="text-[10px] uppercase font-bold tracking-widest">Eco</span></div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Rooftop CTA -->
    <section class="py-24 flex flex-col items-center justify-center space-y-6">
        <div class="relative group cursor-pointer">
            <div class="w-24 h-24 bg-primary rounded-full flex items-center justify-center text-white shadow-2xl transition-transform group-hover:scale-110">
                <span class="material-symbols-outlined text-5xl" style="font-variation-settings: 'FILL' 1;">play_arrow</span>
            </div>
            <div class="absolute -inset-4 border-2 border-primary/20 rounded-full animate-pulse"></div>
        </div>
        <span class="italic font-semibold text-primary text-4xl">Rooftop Lounge</span>
        <p class="text-on-surface-variant font-medium">Click to see the sunset view</p>
    </section>

    <!-- Final CTA Section -->
    <section class="max-w-7xl mx-auto px-8 py-20">
        <div class="bg-white rounded-[3rem] p-8 md:p-16 flex flex-col md:flex-row items-center gap-16 shadow-sm">
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
                <button class="bg-primary text-white px-10 py-5 rounded-full text-xl font-black shadow-lg hover:bg-darkCharcoal transition-all inline-flex items-center gap-3">
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
