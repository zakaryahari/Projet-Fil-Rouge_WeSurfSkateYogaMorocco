@extends('layouts.admin')

@section('title', 'Booking Management - Admin Dashboard')

@section('content')
    <!-- Page Header -->
    <div class="flex flex-col gap-1 mb-8">
        <p class="text-sky-600 font-medium text-sm tracking-wide">Management</p>
        <h2 class="text-3xl font-black text-on-surface tracking-tight">Booking Management</h2>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="bg-emerald-50 border border-emerald-300 rounded-lg p-4 text-emerald-700 text-sm font-medium mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Bookings Data Table -->
    <div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface-container-low text-on-surface-variant uppercase text-[10px] tracking-widest font-black">
                        <th class="px-6 py-5">Booking ID</th>
                        <th class="px-6 py-5">Customer Name</th>
                        <th class="px-6 py-5">Check-in / Out</th>
                        <th class="px-6 py-5">Total Price</th>
                        <th class="px-6 py-5">Status</th>
                        <th class="px-6 py-5">Room</th>
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

                            <!-- Customer Name -->
                            <td class="px-6 py-6">
                                <div class="flex items-center gap-3">
                                    <div>
                                        <p class="text-sm font-bold text-on-surface">{{ $booking->user->name ?? 'N/A' }}</p>
                                        <p class="text-xs text-on-surface-variant">{{ $booking->user->email ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </td>

                            <!-- Dates -->
                            <td class="px-6 py-6">
                                <p class="text-sm font-medium text-on-surface">
                                    {{ $booking->start_date->format('M d') }} — {{ $booking->end_date->format('M d, Y') }}
                                </p>
                                <p class="text-[10px] text-on-surface-variant mt-0.5">
                                    {{ $booking->start_date->diffInDays($booking->end_date) }} nights • {{ $booking->room->type ?? 'N/A' }}
                                </p>
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

                            <!-- Room -->
                            <td class="px-6 py-6 text-sm text-on-surface">
                                {{ $booking->room->type ?? 'N/A' }}
                            </td>

                            <!-- Action: Status Dropdown Form -->
                            <td class="px-6 py-6 text-right">
                                <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST" class="flex items-center justify-end gap-2">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="px-3 py-2 text-sm rounded-lg border border-outline-variant/30 bg-surface-container-low focus:ring-2 focus:ring-primary-container focus:outline-none">
                                        <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                        <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        <option value="finished" {{ $booking->status === 'finished' ? 'selected' : '' }}>Finished</option>
                                    </select>
                                    <button type="submit" class="px-4 py-2 bg-primary-container text-white text-sm font-bold rounded-lg hover:brightness-110 transition-all">
                                        Update
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <span class="material-symbols-outlined text-4xl text-outline mb-4 block">calendar_month</span>
                                <p class="text-on-surface-variant">No bookings found</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Footer -->
        <div class="p-6 bg-surface-container-lowest flex items-center justify-between border-t border-outline-variant/10">
            <p class="text-xs text-on-surface-variant">
                Showing {{ $bookings->count() }} of {{ $bookings->total() }} bookings
            </p>
            <div class="flex gap-2">
                {{ $bookings->links() }}
            </div>
        </div>
    </div>
@endsection
