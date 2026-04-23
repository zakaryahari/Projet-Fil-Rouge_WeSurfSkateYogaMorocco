<!-- SideNavBar Shell -->
<aside class="fixed left-0 top-0 h-screen flex flex-col bg-slate-900 w-64 z-50">
    <div class="p-8">
        <h1 class="text-xl font-black text-white"><font face="Montserrat, sans-serif"><span style="font-size: 24px; letter-spacing: -1.2px;">SKATE SURF.</span></font></h1>
        <p class="text-xs text-slate-400 mt-1 uppercase tracking-widest">Back-Office Panel</p>
    </div>
    <nav class="flex-1 px-4 space-y-1">
        <!-- Active Tab: Dashboard -->
        <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.dashboard') ? 'text-sky-400 font-bold border-r-4 border-sky-400 bg-slate-800/50' : 'text-slate-400 hover:text-white hover:bg-slate-800' }} transition-all duration-200" href="{{ route('admin.dashboard') }}">
            <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
            <span class="text-sm">Dashboard</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white transition-all duration-200 hover:bg-slate-800" href="#">
            <span class="material-symbols-outlined" data-icon="calendar_month">calendar_month</span>
            <span class="text-sm">Bookings</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.rooms.*') ? 'text-sky-400 font-bold border-r-4 border-sky-400 bg-slate-800/50' : 'text-slate-400 hover:text-white hover:bg-slate-800' }} transition-all duration-200" href="{{ route('admin.rooms.index') }}">
            <span class="material-symbols-outlined" data-icon="bed">bed</span>
            <span class="text-sm">Rooms</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.packages.*') ? 'text-sky-400 font-bold border-r-4 border-sky-400 bg-slate-800/50' : 'text-slate-400 hover:text-white hover:bg-slate-800' }} transition-all duration-200" href="{{ route('admin.packages.index') }}">
            <span class="material-symbols-outlined" data-icon="package">package</span>
            <span class="text-sm">Packages</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.activities.*') ? 'text-sky-400 font-bold border-r-4 border-sky-400 bg-slate-800/50' : 'text-slate-400 hover:text-white hover:bg-slate-800' }} transition-all duration-200" href="{{ route('admin.activities.index') }}">
            <span class="material-symbols-outlined" data-icon="surfing">surfing</span>
            <span class="text-sm">Activities</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.coaches.*') ? 'text-sky-400 font-bold border-r-4 border-sky-400 bg-slate-800/50' : 'text-slate-400 hover:text-white hover:bg-slate-800' }} transition-all duration-200" href="{{ route('admin.coaches.index') }}">
            <span class="material-symbols-outlined" data-icon="sports_handball">sports_handball</span>
            <span class="text-sm">Coaches</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white transition-all duration-200 hover:bg-slate-800" href="#">
            <span class="material-symbols-outlined" data-icon="group">group</span>
            <span class="text-sm">Users</span>
        </a>
    </nav>
    <div class="p-6">
        <button class="w-full bg-primary-container text-white py-3 px-4 rounded-full font-bold flex items-center justify-center gap-2 hover:brightness-110 transition-all">
            <span class="material-symbols-outlined text-sm" data-icon="add">add</span>
            New Booking
        </button>
    </div>
</aside>
