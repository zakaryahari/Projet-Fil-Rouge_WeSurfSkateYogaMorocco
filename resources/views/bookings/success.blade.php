@extends('layouts.app')

@section('content')
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Success Progress Bar -->
    <div class="mb-16 max-w-3xl mx-auto">
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
                <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold">
                    <span class="material-symbols-outlined text-lg">check</span>
                </div>
                <span class="text-xs font-semibold text-primary">Payment</span>
            </div>
        </div>
    </div>

    <!-- Success Card -->
    <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-2xl overflow-hidden">
        <!-- Success Header -->
        <div class="bg-gradient-to-r from-primary to-primary/80 p-12 text-center">
            <div class="mb-4 flex justify-center">
                <div class="bg-white/20 rounded-full p-4">
                    <span class="material-symbols-outlined text-6xl text-white">check_circle</span>
                </div>
            </div>
            <h1 class="text-4xl font-bold text-white mb-2">Booking Confirmed!</h1>
            <p class="text-white/90 text-lg">Your payment has been processed successfully.</p>
        </div>

        <!-- Booking Details -->
        <div class="p-8 space-y-8">
            <!-- Booking Number -->
            <div class="bg-slate-50 dark:bg-slate-900 rounded-2xl p-6 border-2 border-primary/20">
                <p class="text-sm text-slate-500 dark:text-slate-400 uppercase tracking-wide mb-2">Booking Confirmation Number</p>
                <p class="text-3xl font-bold text-slate-900 dark:text-white font-mono">#{{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }}</p>
            </div>

            <!-- Package & Dates -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400 uppercase tracking-wide mb-3">Package</p>
                    <div class="flex gap-4">
                        @if($booking->package->image_path)
                            <img src="{{ asset('storage/' . $booking->package->image_path) }}" alt="{{ $booking->package->name }}" class="w-16 h-16 rounded-lg object-cover">
                        @endif
                        <div>
                            <p class="font-bold text-slate-900 dark:text-white">{{ $booking->package->name }}</p>
                            <p class="text-sm text-slate-600 dark:text-slate-400">{{ $booking->package->description }}</p>
                        </div>
                    </div>
                </div>

                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400 uppercase tracking-wide mb-3">Check-in & Check-out</p>
                    <p class="text-lg font-semibold text-slate-900 dark:text-white mb-1">
                        <span class="material-symbols-outlined inline text-lg align-text-bottom">calendar_today</span>
                        {{ \Carbon\Carbon::parse($booking->start_date)->format('M d, Y') }}
                    </p>
                    <p class="text-lg font-semibold text-slate-900 dark:text-white">
                        <span class="material-symbols-outlined inline text-lg align-text-bottom">calendar_today</span>
                        {{ \Carbon\Carbon::parse($booking->end_date)->format('M d, Y') }}
                    </p>
                </div>
            </div>

            <!-- Room & Extras -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400 uppercase tracking-wide mb-3">Accommodation</p>
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">bed</span>
                        <div>
                            <p class="font-semibold text-slate-900 dark:text-white capitalize">{{ $booking->room->type }} Room</p>
                            <p class="text-sm text-slate-600 dark:text-slate-400">{{ $booking->room->capacity }} guest(s)</p>
                        </div>
                    </div>
                </div>

                @if($booking->events->count() > 0)
                    <div>
                        <p class="text-sm text-slate-500 dark:text-slate-400 uppercase tracking-wide mb-3">Extras Included</p>
                        <div class="space-y-1">
                            @foreach($booking->events as $event)
                                <div class="flex items-center gap-2 text-slate-700 dark:text-slate-300">
                                    <span class="material-symbols-outlined text-sm text-primary">check_circle</span>
                                    <span>{{ $event->title }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Price Breakdown -->
            <div class="bg-slate-50 dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-700">
                <p class="text-sm text-slate-500 dark:text-slate-400 uppercase tracking-wide font-semibold mb-4">Payment Summary</p>
                <div class="space-y-3">
                    <div class="flex justify-between text-slate-700 dark:text-slate-300">
                        <span>Total Paid</span>
                        <span class="font-semibold">€{{ number_format($booking->total_price, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-green-600 dark:text-green-400 pt-3 border-t border-slate-200 dark:border-slate-700">
                        <span class="font-semibold">Status</span>
                        <span class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-lg">verified</span>
                            <span>Completed</span>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Next Steps -->
            <div class="bg-blue-50 dark:bg-blue-900/20 rounded-2xl p-6 border-l-4 border-primary">
                <p class="text-sm text-slate-700 dark:text-slate-300 text-center">
                    <span class="material-symbols-outlined inline text-lg align-text-bottom mr-2">mail</span>
                    A confirmation email has been sent to <span class="font-semibold">{{ auth()->user()->email }}</span>
                </p>
            </div>

            <!-- Actions -->
            <div class="flex gap-4">
                <a href="{{ route('home') }}" class="flex-1 bg-primary text-white py-4 rounded-xl font-bold text-lg hover:shadow-lg hover:shadow-primary/30 transition-all flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined">home</span>
                    <span>Back to Home</span>
                </a>
                <a href="{{ route('bookings.packages') }}" class="flex-1 border-2 border-primary text-primary py-4 rounded-xl font-bold text-lg hover:bg-primary/5 transition-all flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined">add_circle</span>
                    <span>Book Another</span>
                </a>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="mt-16 max-w-3xl mx-auto">
        <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-8">What Happens Next?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white dark:bg-slate-800 rounded-2xl p-6 border border-slate-200 dark:border-slate-700">
                <div class="text-3xl font-bold text-primary mb-3">1</div>
                <h3 class="font-bold text-slate-900 dark:text-white mb-2">Confirmation</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400">You'll receive a confirmation email with all booking details and important information.</p>
            </div>

            <div class="bg-white dark:bg-slate-800 rounded-2xl p-6 border border-slate-200 dark:border-slate-700">
                <div class="text-3xl font-bold text-primary mb-3">2</div>
                <h3 class="font-bold text-slate-900 dark:text-white mb-2">Preparation</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400">Our team will prepare everything for your arrival and may contact you if needed.</p>
            </div>

            <div class="bg-white dark:bg-slate-800 rounded-2xl p-6 border border-slate-200 dark:border-slate-700">
                <div class="text-3xl font-bold text-primary mb-3">3</div>
                <h3 class="font-bold text-slate-900 dark:text-white mb-2">Enjoy!</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400">Arrive on your check-in date and enjoy your unforgettable Morocco experience!</p>
            </div>
        </div>
    </div>
</main>
@endsection
