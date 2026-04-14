@extends('layouts.app')

@section('content')
<main class="pt-32 pb-24">
    <!-- Contact Form Section -->
    <section class="max-w-7xl mx-auto px-8 grid grid-cols-1 lg:grid-cols-10 gap-16 items-start">
        <!-- Left Side: Editorial Intro (30%) -->
        <div class="lg:col-span-3 space-y-8 sticky top-32">
            <div class="space-y-4">
                <p class="font-script text-primary-container text-2xl">Talk with our team</p>
                <h1 class="text-4xl lg:text-5xl font-extrabold tracking-tighter text-on-surface leading-tight">
                    Any Question? <br/>Feel Free to Contact
                </h1>
            </div>
            <div class="space-y-6">
                <a class="inline-flex items-center gap-3 bg-green-500 text-white px-6 py-3 rounded-full font-bold shadow-lg hover:bg-green-600 transition-all active:scale-95" href="https://wa.me/212671638705" target="_blank">
                    <span class="material-symbols-outlined" data-icon="chat">chat</span>
                    WhatsApp Chat
                </a>
                <div class="flex items-center gap-4">
                    <a class="w-10 h-10 flex items-center justify-center rounded-full bg-surface-container hover:bg-primary-container hover:text-white transition-all" href="#">
                        <span class="material-symbols-outlined text-lg" data-icon="facebook">social_leaderboard</span>
                    </a>
                    <a class="w-10 h-10 flex items-center justify-center rounded-full bg-surface-container hover:bg-primary-container hover:text-white transition-all" href="#">
                        <span class="material-symbols-outlined text-lg" data-icon="post_add">post_add</span>
                    </a>
                    <a class="w-10 h-10 flex items-center justify-center rounded-full bg-surface-container hover:bg-primary-container hover:text-white transition-all" href="#">
                        <span class="material-symbols-outlined text-lg" data-icon="photo_camera">photo_camera</span>
                    </a>
                    <a class="w-10 h-10 flex items-center justify-center rounded-full bg-surface-container hover:bg-primary-container hover:text-white transition-all" href="#">
                        <span class="material-symbols-outlined text-lg" data-icon="push_pin">push_pin</span>
                    </a>
                </div>
            </div>
            <div class="hidden lg:block relative mt-12 rounded-xl overflow-hidden shadow-2xl rotate-2 hover:rotate-0 transition-transform duration-500">
                <img alt="Surfing in Morocco" class="w-full h-64 object-cover" data-alt="Cinematic shot of surfer riding a Moroccan wave" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB7fRABq1F2ufNwu-J6lRu8haMeE89so69FmDMVrl8mDd2G3nijZ1KCsM8FSPLVfYSTYWvTL1UkuMRuPRrrXo8fHMlN6fB2JlT5uLXJVDX-eJuISCJ6Q_UwMLZaFZB_kRL1OZDpVmMzp7EFesnHmdwaZLvx_jZQd9uWPpmkGxOhy3bkj1q9AlnnmcYcmvhOYttDV_BuIxswpvTo0mk9KbHZ5iR49DaOqO9rFnp8izLGwfz-I0j3jCurPb6bKSzF3gBrrYPjx3M7e6U"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
            </div>
        </div>

        <!-- Right Side: Contact Form (70%) -->
        <div class="lg:col-span-7 bg-surface-container-lowest p-8 lg:p-12 rounded-[2rem] shadow-[0_20px_40px_rgba(24,28,30,0.06)]">
            <form action="#" class="space-y-8" method="POST">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label class="text-[0.75rem] font-bold uppercase tracking-[0.05em] text-on-surface-variant">First Name</label>
                        <input class="w-full bg-surface-container-low border-transparent focus:border-primary focus:ring-0 rounded-xl px-4 py-3.5 transition-all text-on-surface" placeholder="John" type="text"/>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[0.75rem] font-bold uppercase tracking-[0.05em] text-on-surface-variant">Last Name</label>
                        <input class="w-full bg-surface-container-low border-transparent focus:border-primary focus:ring-0 rounded-xl px-4 py-3.5 transition-all text-on-surface" placeholder="Doe" type="text"/>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label class="text-[0.75rem] font-bold uppercase tracking-[0.05em] text-on-surface-variant">Email Address <span class="text-primary">*</span></label>
                        <input class="w-full bg-surface-container-low border-transparent focus:border-primary focus:ring-0 rounded-xl px-4 py-3.5 transition-all text-on-surface" placeholder="john@example.com" required="" type="email"/>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[0.75rem] font-bold uppercase tracking-[0.05em] text-on-surface-variant">Subject</label>
                        <select class="w-full bg-surface-container-low border-transparent focus:border-primary focus:ring-0 rounded-xl px-4 py-3.5 transition-all text-on-surface appearance-none">
                            <option>General Inquiry</option>
                            <option>Package Booking</option>
                            <option>Accommodation</option>
                            <option>Partnership</option>
                        </select>
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="text-[0.75rem] font-bold uppercase tracking-[0.05em] text-on-surface-variant">Message</label>
                    <textarea class="w-full bg-surface-container-low border-transparent focus:border-primary focus:ring-0 rounded-xl px-4 py-3.5 transition-all text-on-surface resize-none" placeholder="Tell us about your next adventure..." rows="6"></textarea>
                </div>
                <button class="w-full bg-primary-container text-white py-4 rounded-full font-bold text-lg hover:opacity-90 active:scale-[0.98] transition-all shadow-[0_8px_20px_rgba(0,174,239,0.3)]" type="submit">
                    Submit Message
                </button>
            </form>
        </div>
    </section>

    <!-- Contact Info Cards -->
    <section class="max-w-7xl mx-auto px-8 mt-24">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Address Card -->
            <div class="bg-surface-container-lowest p-8 rounded-2xl transition-transform hover:-translate-y-2 duration-300">
                <div class="w-12 h-12 bg-primary-container/10 text-primary-container rounded-full flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined" data-icon="location_on">location_on</span>
                </div>
                <h3 class="text-lg font-bold mb-2">Our Base</h3>
                <p class="text-on-surface-variant leading-relaxed">Hay Aitsoual Tamraght, <br/>Agadir 80030, Morocco</p>
            </div>

            <!-- Phone Card -->
            <div class="bg-surface-container-lowest p-8 rounded-2xl transition-transform hover:-translate-y-2 duration-300">
                <div class="w-12 h-12 bg-primary-container/10 text-primary-container rounded-full flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined" data-icon="call">call</span>
                </div>
                <h3 class="text-lg font-bold mb-2">Call Us</h3>
                <p class="text-on-surface-variant leading-relaxed">+212 671 638 705 <br/>Available 9AM - 8PM (GMT)</p>
            </div>

            <!-- Email Card -->
            <div class="bg-surface-container-lowest p-8 rounded-2xl transition-transform hover:-translate-y-2 duration-300">
                <div class="w-12 h-12 bg-primary-container/10 text-primary-container rounded-full flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined" data-icon="mail">mail</span>
                </div>
                <h3 class="text-lg font-bold mb-2">Email Us</h3>
                <p class="text-on-surface-variant leading-relaxed">contact@skatesurfmorocco.com <br/>Replies within 24 hours</p>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="mt-24 h-[500px] w-full relative group overflow-hidden">
        <div class="absolute inset-0 bg-slate-200">
            <!-- Grayscale map simulation using a high-quality map background -->
            <img alt="Map of Tamraght" class="w-full h-full object-cover grayscale-map opacity-80 group-hover:opacity-100 transition-opacity duration-700" data-alt="Grayscale stylized map centered on Tamraght Morocco coastline" data-location="Tamraght, Agadir" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCgFnoc3FLuUkIvIXD17k5I03_rprWrS3UMFP-KcviaqTIIa9yM1WiYD8XeL1_r9M6kM_RaY2QS8zSqAuJmGYE4ZutP-hNcXpzTnSQtkFOAGHlZ3Vvfp-3uwthrtzu5nqy5m5utnBG3B9ZZdBtCsy9ivi3LSfuy4oT8Js_ZB9IXybht05BFF5TUl2eo6qnLwLTrY5BINYY5fI6YtQNfv0oaAq2AQDSpMv4ZhG7vop40QPbSZU1kUUTZoJP1rOqUKeOPWc07sLXW3w0"/>
            <!-- Floating Map Card -->
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white p-6 rounded-2xl shadow-2xl flex items-center gap-4 border border-outline-variant/15">
                <div class="w-10 h-10 bg-primary-container text-white rounded-full flex items-center justify-center">
                    <span class="material-symbols-outlined" data-icon="explore">explore</span>
                </div>
                <div>
                    <p class="text-sm font-bold">Skate Surf Camp</p>
                    <p class="text-xs text-slate-500">Tamraght, Morocco</p>
                </div>
            </div>
        </div>
        <!-- Overlay to blend with design -->
        <div class="absolute inset-0 pointer-events-none ring-1 ring-inset ring-black/5"></div>
    </section>
</main>
@endsection
