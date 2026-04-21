@extends('layouts.app')

@section('content')
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    @if(!auth()->check())
        <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50" id="loginAlert">
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-2xl p-8 max-w-md w-full mx-4">
                <div class="flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-4xl text-primary">lock</span>
                </div>
                <h2 class="text-2xl font-bold text-center mb-2 text-slate-900 dark:text-white">Authentication Required</h2>
                <p class="text-center text-slate-600 dark:text-slate-400 mb-4">You must be logged in to complete a booking.</p>
                <a href="{{ route('login') }}" class="block w-full bg-primary text-white py-3 rounded-xl font-bold text-center hover:shadow-lg hover:shadow-primary/30 transition-all">Login Now</a>
            </div>
        </div>
    @endif

    <!-- 3-Step Progress Bar -->
    <div class="mb-12 max-w-3xl mx-auto">
        <div class="flex items-center justify-between mb-4">
            <div class="flex flex-col items-center gap-2">
                <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold">1</div>
                <span class="text-xs font-semibold text-primary">Select Package</span>
            </div>
            <div class="flex-1 h-1 bg-primary mx-4 rounded-full"></div>
            <div class="flex flex-col items-center gap-2">
                <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold">2</div>
                <span class="text-xs font-semibold text-primary">Stay Details</span>
            </div>
            <div class="flex-1 h-1 bg-slate-200 dark:bg-slate-700 mx-4 rounded-full"></div>
            <div class="flex flex-col items-center gap-2">
                <div class="w-10 h-10 rounded-full bg-slate-200 dark:bg-slate-700 text-slate-500 flex items-center justify-center font-bold">3</div>
                <span class="text-xs font-semibold text-slate-400">Confirmation</span>
            </div>
        </div>
    </div>

    <!-- Custom Error Modal Popup -->
    @if($errors->any())
        <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50" id="errorModal">
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-2xl p-8 max-w-md w-full mx-4">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-3xl text-red-600">warning</span>
                        <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Unable to Book</h2>
                    </div>
                    <button id="closeErrorModal" class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-300">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>

                <p class="text-slate-600 dark:text-slate-400 mb-4">We couldn't complete your booking:</p>

                <ul class="space-y-3 mb-6">
                    @foreach($errors->all() as $error)
                        <li class="flex items-start gap-3 bg-red-50 dark:bg-red-900/20 p-3 rounded-lg">
                            <span class="material-symbols-outlined text-sm text-red-600 mt-0.5 flex-shrink-0">info</span>
                            <span class="text-red-700 dark:text-red-300 text-sm">
                                @if(str_contains($error, 'fully booked'))
                                    This room type is fully booked for your selected dates. Please try different dates or another room.
                                @elseif(str_contains($error, 'unavailable'))
                                    This room is temporarily unavailable. Please select another room.
                                @elseif(str_contains($error, 'Failed to create'))
                                    Something went wrong. Please try again.
                                @else
                                    {{ $error }}
                                @endif
                            </span>
                        </li>
                    @endforeach
                </ul>

                <button id="closeErrorButton" class="w-full bg-primary text-white py-3 rounded-xl font-bold hover:shadow-lg hover:shadow-primary/30 transition-all">
                    Try Different Dates
                </button>
            </div>
        </div>

        <script>
            const errorModal = document.getElementById('errorModal');
            const closeErrorModal = document.getElementById('closeErrorModal');
            const closeErrorButton = document.getElementById('closeErrorButton');

            if (closeErrorModal) {
                closeErrorModal.addEventListener('click', () => {
                    errorModal.style.display = 'none';
                });
            }

            if (closeErrorButton) {
                closeErrorButton.addEventListener('click', () => {
                    errorModal.style.display = 'none';
                });
            }

            if (errorModal) {
                errorModal.addEventListener('click', (e) => {
                    if (e.target === errorModal) {
                        errorModal.style.display = 'none';
                    }
                });
            }
        </script>
    @endif

    <!-- Form Section -->
    <form action="{{ route('bookings.store') }}" method="POST" class="mt-12 max-w-7xl mx-auto">
        @csrf
        <input type="hidden" name="package_id" value="{{ $package->id }}"/>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Left Column: Multi-step form -->
            <div class="lg:w-2/3 space-y-10">
                <!-- Step 1: Package Summary -->
                <section>
                    <div class="flex items-center gap-3 mb-6">
                        <span class="material-symbols-outlined text-primary">explore</span>
                        <h2 class="text-2xl font-bold">Step 1: Your Package</h2>
                    </div>
                    <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700" data-base-price="{{ $package->base_price }}">
                        <h3 class="text-xl font-bold text-slate-900 mb-2">{{ $package->name }}</h3>
                        <p class="text-slate-600 mb-4">{{ $package->description }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-slate-500 dark:text-slate-400">Base Price</span>
                            <span class="text-2xl font-bold text-primary">€{{ number_format($package->base_price, 2) }}</span>
                        </div>
                    </div>
                </section>

                <!-- Step 2: Stay Details -->
                <section>
                    <div class="flex items-center gap-3 mb-6">
                        <span class="material-symbols-outlined text-primary">calendar_month</span>
                        <h2 class="text-2xl font-bold">Step 2: Stay Details</h2>
                    </div>
                    <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col gap-2">
                                <label class="text-sm font-semibold text-slate-600 dark:text-slate-300">Arrival Date</label>
                                <input class="bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-lg p-3 focus:ring-2 focus:ring-primary focus:border-primary" type="date" name="start_date" min="{{ date('Y-m-d') }}" required/>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-sm font-semibold text-slate-600 dark:text-slate-300">Departure Date</label>
                                <input class="bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-lg p-3 focus:ring-2 focus:ring-primary focus:border-primary" type="date" name="end_date" min="{{ date('Y-m-d') }}" required/>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Step 3: Accommodation -->
                <section>
                    <div class="flex items-center gap-3 mb-6">
                        <span class="material-symbols-outlined text-primary">bed</span>
                        <h2 class="text-2xl font-bold">Step 3: Accommodation</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @forelse($rooms as $room)
                            <label class="border-2 border-slate-200 dark:border-slate-700 p-5 rounded-xl bg-white dark:bg-slate-800 hover:border-primary transition-colors cursor-pointer has-[:checked]:border-primary has-[:checked]:bg-primary/5 dark:has-[:checked]:bg-primary/10">
                                <input type="radio" name="room_id" value="{{ $room->id }}" data-room-price="{{ $room->price_per_night }}" class="sr-only" required/>
                                <span class="material-symbols-outlined text-3xl text-primary mb-2">bed</span>
                                <h3 class="font-bold">{{ $room->type }} Room</h3>
                                <p class="text-sm text-slate-500 mb-4">Stock: {{ $room->total_stock }}</p>
                                <p class="font-bold text-slate-900 dark:text-white">€{{ number_format($room->price_per_night, 2) }}/night</p>
                            </label>
                        @empty
                            <div class="col-span-full text-center py-12 text-gray-500">No rooms available</div>
                        @endforelse
                    </div>
                </section>

                <!-- Step 4: Extras / Activities -->
                <section>
                    <div class="flex items-center gap-3 mb-6">
                        <span class="material-symbols-outlined text-primary">add_circle</span>
                        <h2 class="text-2xl font-bold">Step 4: Add Extras (Optional)</h2>
                    </div>
                    <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 space-y-4">
                        @forelse($events as $event)
                            <label class="flex items-center p-4 border border-slate-200 dark:border-slate-700 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-700/30 transition-colors cursor-pointer">
                                <input type="checkbox" name="events[]" value="{{ $event->id }}" data-event-price="{{ $event->price }}" class="w-4 h-4 text-primary rounded focus:ring-2 focus:ring-primary"/>
                                <div class="ml-4 flex-grow">
                                    <p class="font-semibold text-slate-900">{{ $event->title }}</p>
                                    <p class="text-sm text-slate-500">{{ $event->description }}</p>
                                </div>
                                <p class="font-bold text-primary">+€{{ number_format($event->price, 2) }}</p>
                            </label>
                        @empty
                            <div class="text-center py-8 text-gray-500">No extras available</div>
                        @endforelse
                    </div>
                </section>

                <!-- Buttons -->
                <div class="flex gap-4">
                    <a href="{{ route('bookings.packages') }}" class="flex-1 border-2 border-slate-300 text-slate-700 py-4 rounded-xl font-bold text-lg hover:border-slate-400 transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined">arrow_back</span>
                        <span>Back</span>
                    </a>
                    <button type="submit" class="flex-1 bg-primary text-white py-4 rounded-xl font-bold text-lg hover:shadow-lg hover:shadow-primary/30 transition-all flex items-center justify-center gap-2" id="confirm-btn">
                        <span>Confirm Booking</span>
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </button>
                </div>

                <p class="text-[10px] text-center text-slate-400 px-4">
                    By clicking Confirm Booking, you agree to our Terms of Service and Cancellation Policy.
                </p>
            </div>

            <!-- Right Column: Order Summary -->
            <div class="lg:w-1/3">
                <div class="sticky top-24 bg-white dark:bg-slate-800 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
                    <div class="p-6 border-b border-slate-100 dark:border-slate-700">
                        <h3 class="text-xl font-bold">Order Summary</h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-slate-500 dark:text-slate-400">Package:</span>
                            <span class="font-semibold">{{ $package->name }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-slate-500 dark:text-slate-400">Base Price:</span>
                            <span class="font-semibold">€{{ number_format($package->base_price, 2) }}</span>
                        </div>
                        <div class="pt-4 border-t border-slate-100 dark:border-slate-700">
                            <div class="flex justify-between items-end mb-6">
                                <span class="text-lg font-bold">Total Price</span>
                                <div class="text-right">
                                    <p class="text-3xl font-bold text-primary" data-total-price>€{{ number_format($package->base_price, 2) }}</p>
                                    <p class="text-xs text-slate-400">Includes all taxes & fees</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 p-3 rounded-lg flex items-center gap-3 text-green-700 dark:text-green-400">
                            <span class="material-symbols-outlined text-xl">verified_user</span>
                            <span class="text-xs font-semibold uppercase tracking-wider">Safe & Secure Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>

<script src="{{ asset('js/booking.js') }}"></script>
@endsection
