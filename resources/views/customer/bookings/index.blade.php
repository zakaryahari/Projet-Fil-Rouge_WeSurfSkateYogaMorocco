<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Page Header -->
            <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <span class="text-primary font-bold text-sm tracking-widest uppercase mb-2 block">Your Reservations</span>
                    <h1 class="text-4xl font-black text-on-surface tracking-tight">My Bookings</h1>
                    <p class="text-on-surface-variant mt-2 max-w-lg">View and manage all your reservations at WeSurfSkate. Complete payment for pending bookings below.</p>
                </div>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="bg-emerald-50 border border-emerald-300 rounded-lg p-4 text-emerald-700 text-sm font-medium mb-6 flex items-center gap-3">
                    <span class="material-symbols-outlined text-green-600">check_circle</span>
                    {{ session('success') }}
                </div>
            @endif

            <!-- Bookings Data Table -->
            <div class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm border border-surface-container-high/50">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-surface-container-low text-on-surface-variant uppercase text-[10px] tracking-widest font-black">
                                <th class="px-6 py-5">Booking ID</th>
                                <th class="px-6 py-5">Package</th>
                                <th class="px-6 py-5">Check-in / Out</th>
                                <th class="px-6 py-5">Room</th>
                                <th class="px-6 py-5">Total Price</th>
                                <th class="px-6 py-5">Status</th>
                                <th class="px-6 py-5 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/10">
                            @forelse ($bookings as $booking)
                                <tr class="hover:bg-surface-container-lowest/50 transition-colors">
                                    <!-- Booking ID -->
                                    <td class="px-6 py-6 font-mono text-sm text-primary font-bold">
                                        #{{ $booking->id }}
                                    </td>

                                    <!-- Package Name -->
                                    <td class="px-6 py-6">
                                        <div>
                                            <p class="text-sm font-bold text-on-surface">{{ $booking->package->name ?? 'N/A' }}</p>
                                            <p class="text-xs text-on-surface-variant">{{ Str::limit($booking->package->description ?? '', 30) }}</p>
                                        </div>
                                    </td>

                                    <!-- Dates -->
                                    <td class="px-6 py-6">
                                        <p class="text-sm font-medium text-on-surface">
                                            {{ $booking->start_date->format('M d') }} — {{ $booking->end_date->format('M d, Y') }}
                                        </p>
                                        <p class="text-[10px] text-on-surface-variant mt-0.5">
                                            {{ $booking->start_date->diffInDays($booking->end_date) }} nights
                                        </p>
                                    </td>

                                    <!-- Room Type -->
                                    <td class="px-6 py-6 text-sm text-on-surface font-medium">
                                        {{ $booking->room->type ?? 'N/A' }}
                                    </td>

                                    <!-- Total Price -->
                                    <td class="px-6 py-6 font-black text-sm text-on-surface">
                                        €{{ number_format($booking->total_price, 2) }}
                                    </td>

                                    <!-- Status Badge -->
                                    <td class="px-6 py-6">
                                        @php
                                            $statusColors = [
                                                'pending' => 'bg-yellow-100 text-yellow-700',
                                                'confirmed' => 'bg-green-100 text-green-700',
                                                'cancelled' => 'bg-red-100 text-red-700',
                                                'finished' => 'bg-blue-100 text-blue-700',
                                            ];
                                            $colorClass = $statusColors[$booking->status] ?? 'bg-gray-100 text-gray-700';
                                        @endphp
                                        <span class="px-3 py-1 {{ $colorClass }} text-[10px] font-black uppercase tracking-tighter rounded-full">
                                            {{ ucfirst($booking->status) }}
                                        </span>
                                    </td>

                                    <!-- Action Column -->
                                    <td class="px-6 py-6 text-right">
                                        @if ($booking->status === 'pending')
                                            {{-- PAY NOW BUTTON FOR PENDING BOOKINGS --}}
                                            <a href="{{ route('payment.show', $booking->id) }}" class="inline-flex items-center gap-2 px-4 py-2 bg-primary-container text-on-primary-container font-bold text-sm rounded-lg hover:brightness-110 transition-all shadow-md hover:shadow-lg group">
                                                <span class="material-symbols-outlined text-lg group-hover:scale-110 transition-transform">payment</span>
                                                <span>Pay Now</span>
                                            </a>
                                        @elseif ($booking->status === 'confirmed')
                                            <span class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-50 text-emerald-700 font-bold text-sm rounded-lg border border-emerald-200">
                                                <span class="material-symbols-outlined text-lg">check_circle</span>
                                                <span>Confirmed</span>
                                            </span>
                                        @elseif ($booking->status === 'finished')
                                            <span class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-700 font-bold text-sm rounded-lg border border-blue-200">
                                                <span class="material-symbols-outlined text-lg">done_all</span>
                                                <span>Completed</span>
                                            </span>
                                        @else
                                            <span class="text-slate-500 text-sm italic">No action</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-12 text-center">
                                        <span class="material-symbols-outlined text-6xl text-outline mb-4 block opacity-40">calendar_month</span>
                                        <p class="text-on-surface font-bold text-lg mb-2">No Bookings Yet</p>
                                        <p class="text-on-surface-variant mb-6">Start your WeSurfSkate journey by booking a package today!</p>
                                        <a href="{{ route('bookings.packages') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-primary-container text-on-primary-container font-bold rounded-lg hover:brightness-110 transition-all shadow-lg">
                                            <span class="material-symbols-outlined">add</span>
                                            <span>Book Now</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Footer -->
                @if ($bookings->count() > 0)
                    <div class="p-6 bg-surface-container-lowest flex items-center justify-between border-t border-outline-variant/10">
                        <p class="text-xs text-on-surface-variant">
                            Showing {{ $bookings->count() }} of {{ $bookings->total() }} bookings
                        </p>
                        <div class="flex gap-2">
                            {{ $bookings->links() }}
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
