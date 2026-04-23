@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative w-full h-[600px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-black/50 z-10"></div>
        <img alt="Moroccan Surf Scene" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCuCKosRv7F2uFvNN_5jHrPyquVs4k34_GAGCy8LnMrdQZIdOQEgoK29_UPj6maUi40naHvF9Rj2xX-AY7MPK59CWcyEhhovTQP0lcEI12KIITPFa9XTxjuw2YYGATW0Nmx2kYEMyWlvPrf1Dhn-4UcZV-9qNTWIUoqiqY9Orxlyn4cK7l4JS0qQWshX1ugy8Y2Hb8Wuhu4kzXTF8MewO-gQS8b9i2gPAcJqIR8adcfqbz1jGkOH2ztGdAiTzb8TxZgCSiwlbNvTfU"/>
    </div>
    <div class="relative z-20 text-center max-w-4xl px-4">
        <h1 class="text-white text-4xl md:text-6xl font-black leading-tight mb-6">
            WeSurfSkateMorocco Events & Adventures — More Than Just Surfing
        </h1>
        <p class="text-white/90 text-lg md:text-xl leading-relaxed font-medium">
            Experience the soul of Morocco through our curated adventures. From hidden waterfalls in the Atlas Mountains to vibrant local markets and rhythmic nights under the starlit desert sky.
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

<!-- Dynamic Events -->
<div class="max-w-7xl mx-auto px-4 space-y-24 pb-24">
    @forelse($events as $event)
    <section class="flex flex-col {{ $loop->even ? 'lg:flex-row-reverse' : 'lg:flex-row' }} items-center gap-12 lg:gap-20">
        <div class="w-full lg:w-1/2 relative group">
            <div class="absolute -inset-4 bg-primary/10 rounded-2xl -z-10 group-hover:scale-105 transition-transform"></div>
            <img
                alt="{{ $event->title }}"
                class="w-full aspect-[4/3] object-cover rounded-2xl shadow-2xl"
                src="{{ $event->image_path ? asset('storage/' . $event->image_path) : 'https://placehold.co/600x400/e2e8f0/94a3b8?text=No+Image' }}"
                onerror="this.src='https://placehold.co/600x400/e2e8f0/94a3b8?text=No+Image'"
            />
        </div>
        <div class="w-full lg:w-1/2 space-y-6">
            <span class="script-font text-primary text-2xl">Adventure</span>
            <h3 class="text-3xl md:text-4xl font-bold text-slate-900">{{ $event->title }}</h3>
            <p class="text-slate-600 text-lg leading-relaxed">{{ $event->description }}</p>
            <div class="flex flex-wrap items-center gap-4 text-sm font-medium text-slate-500 pt-2">
                <span class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-base text-primary">calendar_today</span>
                    {{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}
                </span>
                <span class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-base text-primary">group</span>
                    Max {{ $event->max_participants }} participants
                </span>
                <span class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-base text-primary">payments</span>
                    €{{ number_format($event->price, 0) }}
                </span>
            </div>
        </div>
    </section>
    @empty
    <div class="text-center py-16 text-gray-500">
        <span class="material-symbols-outlined text-6xl opacity-30 mb-4 block">event</span>
        <p class="text-lg">No events available yet. Check back soon!</p>
    </div>
    @endforelse
</div>

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
