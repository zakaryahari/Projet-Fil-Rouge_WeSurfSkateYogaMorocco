@extends('layouts.admin')

@section('title', 'Admin Dashboard - WeSurfSkate Morocco')

@section('content')
    <!-- Page Header -->
    <div class="space-y-10">
        <div class="flex flex-col gap-1">
            <p class="text-sky-600 font-medium text-sm tracking-wide">Overview</p>
            <h2 class="text-3xl font-black text-on-surface tracking-tight">Performance Metrics</h2>
        </div>

        <!-- Bento Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Stat 1: Revenue -->
            <div class="bg-surface-container-lowest p-6 rounded-xl flex flex-col justify-between min-h-[160px] group hover:bg-surface-container-low transition-all duration-300">
                <div class="flex justify-between items-start">
                    <div class="p-2 bg-sky-50 text-sky-600 rounded-lg">
                        <span class="material-symbols-outlined" data-icon="payments">payments</span>
                    </div>
                    <span class="text-xs font-bold text-emerald-600 flex items-center gap-1 bg-emerald-50 px-2 py-1 rounded-full">
                        <span class="material-symbols-outlined text-[10px]" data-icon="trending_up">trending_up</span>
                        {{ $revenueGrowth }}%
                    </span>
                </div>
                <div>
                    <p class="text-sm text-slate-500 font-medium">Total Revenue</p>
                    <h3 class="text-2xl font-black text-slate-900">€{{ number_format($totalRevenue, 0) }}</h3>
                </div>
            </div>

            <!-- Stat 2: Occupancy -->
            <div class="bg-surface-container-lowest p-6 rounded-xl flex flex-col justify-between min-h-[160px] group hover:bg-surface-container-low transition-all duration-300">
                <div class="flex justify-between items-start">
                    <div class="p-2 bg-sky-50 text-sky-600 rounded-lg">
                        <span class="material-symbols-outlined" data-icon="bed">bed</span>
                    </div>
                </div>
                <div class="space-y-3">
                    <div>
                        <p class="text-sm text-slate-500 font-medium">Occupancy Rate</p>
                        <h3 class="text-2xl font-black text-slate-900">{{ $occupancyRate }}%</h3>
                    </div>
                    <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-primary-container h-full rounded-full" style="width: {{ $occupancyRate }}%"></div>
                    </div>
                </div>
            </div>

            <!-- Stat 3: Active Bookings -->
            <div class="bg-surface-container-lowest p-6 rounded-xl flex flex-col justify-between min-h-[160px] group hover:bg-surface-container-low transition-all duration-300">
                <div class="flex justify-between items-start">
                    <div class="p-2 bg-sky-50 text-sky-600 rounded-lg">
                        <span class="material-symbols-outlined" data-icon="event_available">event_available</span>
                    </div>
                </div>
                <div>
                    <p class="text-sm text-slate-500 font-medium">Active Bookings</p>
                    <h3 class="text-2xl font-black text-slate-900">{{ $activeBookings }}</h3>
                    <p class="text-[10px] text-slate-400 mt-1 uppercase tracking-tighter">+{{ $bookingsIncrease }} since yesterday</p>
                </div>
            </div>

            <!-- Stat 4: Alerts -->
            <div class="bg-surface-container-lowest p-6 rounded-xl flex flex-col justify-between min-h-[160px] group hover:bg-surface-container-low transition-all duration-300">
                <div class="flex justify-between items-start">
                    <div class="p-2 bg-red-50 text-red-600 rounded-lg">
                        <span class="material-symbols-outlined" data-icon="warning" data-weight="fill" style="font-variation-settings: 'FILL' 1;">warning</span>
                    </div>
                </div>
                <div>
                    <p class="text-sm text-slate-500 font-medium">Pending Alerts</p>
                    <h3 class="text-2xl font-black text-slate-900">{{ $pendingAlerts }}</h3>
                    <p class="text-[10px] text-red-400 mt-1 uppercase tracking-tighter">Requires attention</p>
                </div>
            </div>
        </div>

        <!-- Recent Activity Table -->
        <div class="space-y-6">
            <div class="flex justify-between items-end">
                <h3 class="text-xl font-bold text-slate-900">Recent Activity</h3>
                <button class="text-sky-600 text-sm font-bold hover:underline">View All Bookings</button>
            </div>
            <div class="bg-surface-container-lowest rounded-xl overflow-hidden">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-surface-container-low text-slate-500 uppercase text-[0.65rem] font-bold tracking-widest">
                            <th class="px-8 py-4">Customer Name</th>
                            <th class="px-8 py-4">Date</th>
                            <th class="px-8 py-4">Amount</th>
                            <th class="px-8 py-4 text-center">Status</th>
                            <th class="px-8 py-4 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-container-low">
                        @forelse($recentBookings as $booking)
                            <tr class="group hover:bg-surface-container-low/30 transition-colors">
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-xs font-bold text-slate-600">
                                            {{ strtoupper(substr($booking->user->name, 0, 1)) }}{{ strtoupper(substr(explode(' ', $booking->user->name)[1] ?? '', 0, 1)) }}
                                        </div>
                                        <span class="font-semibold text-slate-900">{{ $booking->user->name }}</span>
                                    </div>
                                </td>
                                <td class="px-8 py-5 text-slate-600 text-sm">{{ $booking->start_date->format('M d, Y') }}</td>
                                <td class="px-8 py-5 text-slate-900 font-bold">€{{ number_format($booking->total_price, 2) }}</td>
                                <td class="px-8 py-5">
                                    <div class="flex justify-center">
                                        @php
                                            $statusColors = [
                                                'pending' => 'bg-amber-50 text-amber-600 border-amber-100',
                                                'confirmed' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                                                'finished' => 'bg-slate-50 text-slate-600 border-slate-100',
                                                'cancelled' => 'bg-red-50 text-red-600 border-red-100',
                                                'maintenance' => 'bg-orange-50 text-orange-600 border-orange-100'
                                            ];
                                            $statusClass = $statusColors[$booking->status] ?? 'bg-gray-50 text-gray-600 border-gray-100';
                                        @endphp
                                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider {{ $statusClass }} border">
                                            {{ ucfirst($booking->status) }}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-8 py-5 text-right">
                                    <button class="text-slate-400 hover:text-sky-600 transition-colors">
                                        <span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-8 py-5 text-center text-slate-400">No bookings found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Seasonal Spotlight (Asymmetric Component) -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 relative overflow-hidden rounded-2xl h-64 group">
                <img alt="Taghazout Coastline" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAdHEm7Xddt59GguLtUhGqrRT75vL2EnVWSEww8YX0dDiivS5VzEEdTmT2jMqd9bSYz1gAjVs3R6zpzQjsFhrbMTQ8p5FpNYRZmtoUUiRdAjDklDIg8x_r8yBT8r590VXnCKYNnq7fkCtfUi5UjqenKPKp6JeR6hNaL9zhnGOkbd-_1tOtnBJdRRd2uWJshoeuuBy77bgO5SQFf-DCHhP_xUTzweQ05VPsukHqMivzz_NsdkHvcSgUueXOtCyoPzCUQt3g6QEkfhFk">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent flex flex-col justify-end p-8">
                    <span class="text-primary-container text-xs font-bold uppercase tracking-widest mb-2">Seasonal Insight</span>
                    <h4 class="text-white text-2xl font-black">{{ $seasonalTitle }}</h4>
                    <p class="text-slate-200 text-sm mt-1">{{ $seasonalDescription }}</p>
                </div>
            </div>
            <div class="bg-sky-600 rounded-2xl p-8 flex flex-col justify-center text-white space-y-4">
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                    <span class="material-symbols-outlined" data-icon="rocket_launch">rocket_launch</span>
                </div>
                <div>
                    <h4 class="text-xl font-bold">Quick Insights</h4>
                    <p class="text-sky-100 text-sm mt-2">{{ $quickInsight }}</p>
                </div>
                <button class="w-full bg-white text-sky-600 py-3 rounded-full font-black text-sm hover:bg-sky-50 transition-colors">
                    Run Full Report
                </button>
            </div>
        </div>
    </div>
@endsection
