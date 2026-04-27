@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <!-- Page Header Header -->
    <div class="flex flex-col gap-1">
        <p class="text-sky-600 font-medium text-sm tracking-wide" style="">Overview</p>
        <h2 class="text-3xl font-black text-on-surface tracking-tight" style="">Customer Management</h2>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="bg-emerald-50 border border-emerald-300 rounded-lg p-4 text-emerald-700 text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <!-- Bento Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Stat 1: Total Customers -->
        <div class="bg-surface-container-lowest p-6 rounded-xl flex flex-col justify-between min-h-[160px] group hover:bg-surface-container-low transition-all duration-300">
            <div class="flex justify-between items-start">
                <div class="p-2 bg-sky-50 text-sky-600 rounded-lg">
                    <span class="material-symbols-outlined" data-icon="group" style="">group</span>
                </div>
            </div>
            <div>
                <p class="text-sm text-slate-500 font-medium" style="">Total Customers</p>
                <h3 class="text-2xl font-black text-slate-900" style="">{{ $totalCustomers }}</h3>
            </div>
        </div>

        <!-- Stat 2: Total Bookings -->
        <div class="bg-surface-container-lowest p-6 rounded-xl flex flex-col justify-between min-h-[160px] group hover:bg-surface-container-low transition-all duration-300">
            <div class="flex justify-between items-start">
                <div class="p-2 bg-sky-50 text-sky-600 rounded-lg">
                    <span class="material-symbols-outlined" data-icon="calendar_month" style="">calendar_month</span>
                </div>
            </div>
            <div>
                <p class="text-sm text-slate-500 font-medium" style="">Total Bookings</p>
                <h3 class="text-2xl font-black text-slate-900" style="">{{ $totalBookings }}</h3>
            </div>
        </div>

        <!-- Stat 3: Total Revenue -->
        <div class="bg-surface-container-lowest p-6 rounded-xl flex flex-col justify-between min-h-[160px] group hover:bg-surface-container-low transition-all duration-300">
            <div class="flex justify-between items-start">
                <div class="p-2 bg-sky-50 text-sky-600 rounded-lg">
                    <span class="material-symbols-outlined" data-icon="payments" style="">payments</span>
                </div>
            </div>
            <div>
                <p class="text-sm text-slate-500 font-medium" style="">Total Revenue</p>
                <h3 class="text-2xl font-black text-slate-900" style="">€{{ number_format($totalRevenue, 0) }}</h3>
            </div>
        </div>
    </div>

    <!-- Customers Table -->
    <div class="space-y-6">
        <div class="flex justify-between items-end">
            <h3 class="text-xl font-bold text-slate-900" style="">All Customers</h3>
        </div>
        <div class="bg-surface-container-lowest rounded-xl overflow-hidden">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-surface-container-low text-slate-500 uppercase text-[0.65rem] font-bold tracking-widest">
                        <th class="px-8 py-4" style="">ID</th>
                        <th class="px-8 py-4" style="">Customer Name</th>
                        <th class="px-8 py-4" style="">Email</th>
                        <th class="px-8 py-4 text-center" style="">Status</th>
                        <th class="px-8 py-4 text-right" style="">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-container-low" id="customerTableBody">
                    @forelse ($users as $user)
                        <tr class="group hover:bg-surface-container-low/30 transition-colors customer-row" data-customer-name="{{ strtolower($user->name) }}" data-customer-email="{{ strtolower($user->email) }}">
                            <td class="px-8 py-5 text-slate-900 font-bold" style="">#{{ $user->id }}</td>
                            <td class="px-8 py-5" style="">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-xs font-bold text-slate-600" style="">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                                    <span class="font-semibold text-slate-900" style="">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td class="px-8 py-5 text-slate-600 text-sm" style="">{{ $user->email }}</td>
                            <td class="px-8 py-5" style="">
                                <div class="flex justify-center">
                                    @if ($user->is_banned)
                                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-red-50 text-red-600 border border-red-100" style="">Banned</span>
                                    @else
                                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-50 text-emerald-600 border border-emerald-100" style="">Active</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-8 py-5 text-right" style="">
                                <form action="{{ route('admin.users.toggle_ban', $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 text-[10px] font-bold uppercase rounded-lg transition-colors @if ($user->is_banned) bg-emerald-500 hover:bg-emerald-600 text-white @else bg-red-500 hover:bg-red-600 text-white @endif">
                                        @if ($user->is_banned)
                                            Unban
                                        @else
                                            Ban
                                        @endif
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-8 py-5 text-center text-slate-400">No customers found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-6">
            {{ $users->links() }}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/admin/dashboard.js') }}"></script>
@endsection
