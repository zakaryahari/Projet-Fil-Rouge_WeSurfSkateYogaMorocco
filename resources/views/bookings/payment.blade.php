@extends('layouts.app')

@section('content')
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
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
        <div class="lg:w-2/3">
            <div class="rounded-2xl p-8 bg-white dark:bg-slate-800 shadow-sm border border-slate-200 dark:border-slate-700">
                <div class="mb-8">
                    <p class="text-sm font-semibold text-slate-500 uppercase tracking-wide">Final Step</p>
                    <h1 class="text-3xl font-bold text-slate-900 dark:text-white mb-2">Complete your booking.</h1>
                    <p class="text-slate-600 dark:text-slate-400">Secure your spot at our Morocco Surf Camp with our encrypted payment gateway.</p>
                </div>

                <form id="payment-form" action="{{ route('bookings.payment.process', $booking->id) }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="booking_id" value="{{ $booking->id }}">

                    <div>
                        <p class="text-sm font-bold text-slate-900 dark:text-white uppercase tracking-wide mb-4">Payment Method</p>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="border-2 border-slate-200 dark:border-slate-700 rounded-xl p-4 hover:border-primary cursor-pointer has-[:checked]:border-primary has-[:checked]:bg-primary/5 transition-all">
                                <input type="radio" name="payment_method" value="credit_card" class="sr-only payment-method-radio" checked required>
                                <span class="material-symbols-outlined text-3xl text-primary mb-2">credit_card</span>
                                <p class="font-semibold text-slate-900 dark:text-white">Credit / Debit</p>
                            </label>
                            <label class="border-2 border-slate-200 dark:border-slate-700 rounded-xl p-4 hover:border-primary cursor-pointer has-[:checked]:border-primary has-[:checked]:bg-primary/5 transition-all">
                                <input type="radio" name="payment_method" value="paypal" class="sr-only payment-method-radio" required>
                                <span class="material-symbols-outlined text-3xl text-primary mb-2">account_balance_wallet</span>
                                <p class="font-semibold text-slate-900 dark:text-white">PayPal</p>
                            </label>
                        </div>
                    </div>

                    <!-- Credit Card Fields (shown by default) -->
                    <div id="credit_card_fields" class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Name on Card</label>
                            <input type="text" name="card_name" placeholder="Jonathan Miller" class="w-full bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-lg p-3 focus:ring-2 focus:ring-primary focus:border-primary">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Card Number</label>
                            <input type="text" name="card_number" placeholder="0000 0000 0000 0000" maxlength="19" class="w-full bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-lg p-3 focus:ring-2 focus:ring-primary focus:border-primary">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Expiry Date</label>
                                <input type="text" name="expiry_date" placeholder="MM / YY" maxlength="7" class="w-full bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-lg p-3 focus:ring-2 focus:ring-primary focus:border-primary">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">CVC</label>
                                <input type="text" name="cvc" placeholder="123" maxlength="4" class="w-full bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-lg p-3 focus:ring-2 focus:ring-primary focus:border-primary">
                            </div>
                        </div>
                    </div>

                    <!-- PayPal Message (hidden by default) -->
                    <div id="paypal_message" class="hidden bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg border border-blue-200 dark:border-blue-800">
                        <div class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-blue-600 dark:text-blue-400 text-xl">info</span>
                            <div>
                                <p class="font-semibold text-blue-900 dark:text-blue-200">PayPal Payment</p>
                                <p class="text-sm text-blue-700 dark:text-blue-300 mt-1">You will be redirected to PayPal to complete your payment securely.</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 text-green-600 bg-green-50 dark:bg-green-900/20 p-3 rounded-lg">
                        <span class="material-symbols-outlined text-lg">verified</span>
                        <p class="text-xs font-semibold uppercase tracking-wider">SSL Secure Encryption</p>
                    </div>
                </form>
            </div>
        </div>

        <div class="lg:w-1/3">
            <div class="sticky top-24 bg-white dark:bg-slate-800 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
                <div class="p-6 border-b border-slate-100 dark:border-slate-700">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">Booking Summary</h3>
                </div>

                <div class="p-6 space-y-4">
                    <div class="flex gap-4">
                        @if($booking->package->image_path)
                            <img src="{{ asset('storage/' . $booking->package->image_path) }}" alt="{{ $booking->package->name }}" class="w-20 h-20 rounded-lg object-cover">
                        @endif
                        <div>
                            <p class="font-semibold text-slate-900 dark:text-white text-sm">{{ $booking->package->name }}</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                                <span class="material-symbols-outlined inline text-xs">calendar_today</span>
                                {{ \Carbon\Carbon::parse($booking->start_date)->format('M d') }} - {{ \Carbon\Carbon::parse($booking->end_date)->format('M d') }}
                            </p>
                            <p class="text-xs text-slate-500 dark:text-slate-400">
                                <span class="material-symbols-outlined inline text-xs">bed</span>
                                {{ $booking->room->type }} Room
                            </p>
                        </div>
                    </div>

                    @if($booking->events->count() > 0)
                        <div class="border-t border-slate-100 dark:border-slate-700 pt-4">
                            <p class="text-xs font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wide mb-3">Extras</p>
                            @foreach($booking->events as $event)
                                <div class="flex justify-between text-xs mb-2">
                                    <span class="text-slate-600 dark:text-slate-400">{{ $event->title }}</span>
                                    <span class="text-slate-900 dark:text-white font-semibold">+€{{ number_format($event->price, 2) }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="border-t border-slate-100 dark:border-slate-700 pt-4 space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-slate-500 dark:text-slate-400">Package Base</span>
                            <span class="font-semibold text-slate-900 dark:text-white">€{{ number_format($booking->package->base_price, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-slate-500 dark:text-slate-400">{{ $booking->room->type }} Room ({{ \Carbon\Carbon::parse($booking->end_date)->diffInDays(\Carbon\Carbon::parse($booking->start_date)) ?: 1 }} nights)</span>
                            <span class="font-semibold text-slate-900 dark:text-white">€{{ number_format($booking->room->price_per_night * (\Carbon\Carbon::parse($booking->end_date)->diffInDays(\Carbon\Carbon::parse($booking->start_date)) ?: 1), 2) }}</span>
                        </div>
                        @if($booking->events->count() > 0)
                            <div class="flex justify-between text-sm">
                                <span class="text-slate-500 dark:text-slate-400">Extras Total</span>
                                <span class="font-semibold text-slate-900 dark:text-white">€{{ number_format($booking->events->sum('price'), 2) }}</span>
                            </div>
                        @endif
                    </div>

                    <div class="border-t border-slate-100 dark:border-slate-700 pt-4">
                        <div class="flex justify-between items-end mb-6">
                            <span class="text-lg font-bold text-slate-900 dark:text-white">Total</span>
                            <p class="text-3xl font-bold text-primary">€{{ number_format($booking->total_price, 2) }}</p>
                        </div>
                    </div>

                    <button form="payment-form" type="submit" class="w-full bg-primary text-white py-4 rounded-xl font-bold text-lg hover:shadow-lg hover:shadow-primary/30 transition-all flex items-center justify-center gap-2">
                        <span>Pay €{{ number_format($booking->total_price, 2) }} & Confirm Booking</span>
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </button>

                    <a href="{{ route('bookings.create', $booking->package_id) }}" class="block text-center text-sm text-slate-500 hover:text-primary transition-colors py-2">
                        Back to Details
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
// Payment method toggle
const paymentMethodRadios = document.querySelectorAll('.payment-method-radio');
const creditCardFields = document.getElementById('credit_card_fields');
const paypalMessage = document.getElementById('paypal_message');

function updatePaymentUI() {
    const selectedMethod = document.querySelector('.payment-method-radio:checked').value;

    if (selectedMethod === 'credit_card') {
        creditCardFields.classList.remove('hidden');
        paypalMessage.classList.add('hidden');
    } else {
        creditCardFields.classList.add('hidden');
        paypalMessage.classList.remove('hidden');
    }
}

paymentMethodRadios.forEach(radio => {
    radio.addEventListener('change', updatePaymentUI);
});

// Card input formatting
const cardNumberInput = document.querySelector('input[name="card_number"]');
if (cardNumberInput) {
    cardNumberInput.addEventListener('input', (e) => {
        e.target.value = e.target.value.replace(/\D/g, '').replace(/(\d{4})(?=\d)/g, '$1 ');
    });
}

const expiryDateInput = document.querySelector('input[name="expiry_date"]');
if (expiryDateInput) {
    expiryDateInput.addEventListener('input', (e) => {
        e.target.value = e.target.value.replace(/\D/g, '').replace(/(\d{2})(?=\d)/, '$1 / ');
    });
}

const cvcInput = document.querySelector('input[name="cvc"]');
if (cvcInput) {
    cvcInput.addEventListener('input', (e) => {
        e.target.value = e.target.value.replace(/\D/g, '');
    });
}
</script>
@endsection