@extends('layouts.app')

@section('content')
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Progress Indicator -->
    <div class="mb-12 max-w-3xl mx-auto">
        <div class="flex items-center justify-between mb-4">
            <div class="flex flex-col items-center gap-2">
                <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold">
                    <span class="material-symbols-outlined text-lg">check</span>
                </div>
                <span class="text-xs font-semibold text-primary">Select Package</span>
            </div>
            <div class="flex-1 h-1 bg-primary mx-4 rounded-full"></div>
            <div class="flex flex-col items-center gap-2">
                <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold">
                    <span class="material-symbols-outlined text-lg">check</span>
                </div>
                <span class="text-xs font-semibold text-primary">Stay Details</span>
            </div>
            <div class="flex-1 h-1 bg-primary mx-4 rounded-full"></div>
            <div class="flex flex-col items-center gap-2">
                <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold">3</div>
                <span class="text-xs font-semibold text-primary">Payment</span>
            </div>
        </div>
    </div>

    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Main Content -->
        <div class="lg:w-2/3">
            <div class="rounded-2xl p-8 bg-white dark:bg-slate-800 shadow-sm border border-slate-200 dark:border-slate-700">
                <div class="mb-8">
                    <p class="text-sm font-semibold text-slate-500 uppercase tracking-wide">Final Step</p>
                    <h1 class="text-3xl font-bold text-slate-900 dark:text-white mb-2">Ready to confirm your booking?</h1>
                    <p class="text-slate-600 dark:text-slate-400">Review your booking details below and proceed to secure Stripe Checkout.</p>
                </div>

                <!-- Booking Details Summary -->
                <div class="space-y-6">
                    <!-- Package Details -->
                    <div class="pb-6 border-b border-slate-100 dark:border-slate-700">
                        <p class="text-sm font-bold text-slate-900 dark:text-white uppercase tracking-wide mb-4">Package Details</p>
                        <div class="flex gap-4">
                            @if($booking->package->image_path)
                                <img src="{{ asset('storage/' . $booking->package->image_path) }}" alt="{{ $booking->package->name }}" class="w-24 h-24 rounded-lg object-cover">
                            @endif
                            <div>
                                <h3 class="font-bold text-lg text-slate-900 dark:text-white">{{ $booking->package->name }}</h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400 mt-2">{{ $booking->package->description ?? 'Experience the best of Morocco' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Stay Information -->
                    <div class="pb-6 border-b border-slate-100 dark:border-slate-700">
                        <p class="text-sm font-bold text-slate-900 dark:text-white uppercase tracking-wide mb-4">Stay Information</p>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-xs text-slate-500 dark:text-slate-400 uppercase tracking-wide">Check-in</p>
                                <p class="text-lg font-semibold text-slate-900 dark:text-white">{{ \Carbon\Carbon::parse($booking->start_date)->format('M d, Y') }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 dark:text-slate-400 uppercase tracking-wide">Check-out</p>
                                <p class="text-lg font-semibold text-slate-900 dark:text-white">{{ \Carbon\Carbon::parse($booking->end_date)->format('M d, Y') }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 dark:text-slate-400 uppercase tracking-wide">Room Type</p>
                                <p class="text-lg font-semibold text-slate-900 dark:text-white">{{ $booking->room->type }} Room</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 dark:text-slate-400 uppercase tracking-wide">Nights</p>
                                @php
                                    $startDate = new DateTime($booking->start_date);
                                    $endDate = new DateTime($booking->end_date);
                                    $interval = $endDate->diff($startDate);
                                    $nights = max((int)$interval->format('%a'), 1);
                                @endphp
                                <p class="text-lg font-semibold text-slate-900 dark:text-white">{{ $nights }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Extras -->
                    @if($booking->events->count() > 0)
                        <div class="pb-6 border-b border-slate-100 dark:border-slate-700">
                            <p class="text-sm font-bold text-slate-900 dark:text-white uppercase tracking-wide mb-4">Extras</p>
                            <div class="space-y-2">
                                @foreach($booking->events as $event)
                                    <div class="flex justify-between items-center p-3 bg-slate-50 dark:bg-slate-900 rounded-lg">
                                        <span class="text-slate-700 dark:text-slate-300">{{ $event->title }}</span>
                                        <span class="font-semibold text-slate-900 dark:text-white">€{{ number_format($event->price, 2) }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Security Notice -->
                    <div class="flex items-start gap-3 p-4 bg-green-50 dark:bg-green-900/20 rounded-lg border border-green-200 dark:border-green-800">
                        <span class="material-symbols-outlined text-green-600 dark:text-green-400 text-xl flex-shrink-0">verified</span>
                        <div>
                            <p class="font-semibold text-green-900 dark:text-green-200 text-sm">Secure Payment Powered by Stripe</p>
                            <p class="text-xs text-green-700 dark:text-green-300 mt-1">Your payment information is encrypted and handled by Stripe, a PCI-compliant payment processor.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Summary Sidebar -->
        <div class="lg:w-1/3">
            <div class="sticky top-24 bg-white dark:bg-slate-800 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
                <div class="p-6 border-b border-slate-100 dark:border-slate-700">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">Order Summary</h3>
                </div>

                <div class="p-6 space-y-4">
                    <!-- Price Breakdown -->
                    @php
                        $startDate = new DateTime($booking->start_date);
                        $endDate = new DateTime($booking->end_date);
                        $interval = $endDate->diff($startDate);
                        $nights = max((int)$interval->format('%a'), 1);
                        $roomCharge = $booking->room->price_per_night * $nights;
                    @endphp

                    <div class="space-y-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-slate-600 dark:text-slate-400">Package Base</span>
                            <span class="font-semibold text-slate-900 dark:text-white">€{{ number_format($booking->package->base_price, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-slate-600 dark:text-slate-400">{{ $booking->room->type }} Room ({{ $nights }}×)</span>
                            <span class="font-semibold text-slate-900 dark:text-white">€{{ number_format($roomCharge, 2) }}</span>
                        </div>
                        @if($booking->events->count() > 0)
                            <div class="flex justify-between text-sm">
                                <span class="text-slate-600 dark:text-slate-400">Extras</span>
                                <span class="font-semibold text-slate-900 dark:text-white">€{{ number_format($booking->events->sum('price'), 2) }}</span>
                            </div>
                        @endif
                    </div>

                    <!-- Total -->
                    <div class="border-t border-slate-100 dark:border-slate-700 pt-4">
                        <div class="flex justify-between items-end">
                            <span class="text-lg font-bold text-slate-900 dark:text-white">Total</span>
                            <p class="text-4xl font-bold text-primary">€{{ number_format($booking->total_price, 2) }}</p>
                        </div>
                    </div>

                    <!-- Checkout Button -->
                    <form action="{{ route('bookings.payment.process', $booking->id) }}" method="POST" class="mt-6">
                        @csrf
                        <button type="submit" class="w-full bg-primary text-white py-4 rounded-xl font-bold text-lg hover:shadow-lg hover:shadow-primary/30 transition-all flex items-center justify-center gap-2 group">
                            <span>Proceed to Secure Stripe Checkout</span>
                            <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </button>
                    </form>

                    <!-- Back Link -->
                    <a href="{{ route('bookings.create', $booking->package_id) }}" class="block text-center text-sm text-slate-500 hover:text-primary transition-colors py-2">
                        Back to Details
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
