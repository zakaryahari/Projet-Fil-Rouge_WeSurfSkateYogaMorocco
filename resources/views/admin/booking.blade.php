<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Booking Management - WeSurfSkate Admin</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "outline": "#6e7881",
                        "tertiary-fixed": "#cde5ff",
                        "inverse-on-surface": "#eef1f3",
                        "surface-container": "#ebeef0",
                        "surface-container-highest": "#e0e3e5",
                        "on-surface": "#181c1e",
                        "on-secondary-fixed-variant": "#474746",
                        "on-error": "#ffffff",
                        "on-tertiary": "#ffffff",
                        "error": "#ba1a1a",
                        "surface-tint": "#00658d",
                        "on-primary-fixed-variant": "#004c6b",
                        "secondary-fixed": "#e5e2e1",
                        "surface-container-high": "#e5e9eb",
                        "primary-fixed-dim": "#82cfff",
                        "surface-bright": "#f7fafc",
                        "inverse-primary": "#82cfff",
                        "secondary-container": "#e2dfde",
                        "surface-variant": "#e0e3e5",
                        "surface": "#f7fafc",
                        "on-primary-fixed": "#001e2d",
                        "inverse-surface": "#2d3133",
                        "tertiary-container": "#55a9eb",
                        "on-secondary": "#ffffff",
                        "primary-fixed": "#c6e7ff",
                        "on-background": "#181c1e",
                        "background": "#f7fafc",
                        "primary": "#00658d",
                        "secondary-fixed-dim": "#c8c6c5",
                        "on-surface-variant": "#3e4850",
                        "tertiary": "#006399",
                        "on-tertiary-fixed": "#001d32",
                        "on-tertiary-fixed-variant": "#004b74",
                        "on-error-container": "#93000a",
                        "error-container": "#ffdad6",
                        "surface-container-lowest": "#ffffff",
                        "outline-variant": "#bdc8d1",
                        "secondary": "#5f5e5e",
                        "on-secondary-fixed": "#1c1b1b",
                        "primary-container": "#00aeef",
                        "on-primary": "#ffffff",
                        "on-secondary-container": "#636262",
                        "tertiary-fixed-dim": "#94ccff",
                        "on-primary-container": "#003e58",
                        "surface-container-low": "#f1f4f6",
                        "surface-dim": "#d7dadc",
                        "on-tertiary-container": "#003c5f"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "fontFamily": {
                        "headline": ["Inter"],
                        "body": ["Inter"],
                        "label": ["Inter"]
                    }
                },
            },
        }
    </script>
<style>
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-surface text-on-surface">
<!-- SideNavBar Shell -->
<aside class="fixed left-0 top-0 h-screen flex flex-col bg-slate-900 dark:bg-black w-64 z-50">
<div class="p-6">
<div class="text-xl font-black text-white">WeSurfSkate Admin</div>
<div class="text-xs text-slate-400 mt-1 tracking-widest uppercase">Back-Office Panel</div>
</div>
<nav class="flex-1 px-4 py-4 space-y-1">
<a class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white transition-all duration-200 hover:bg-slate-800 rounded-lg group" href="#">
<span class="material-symbols-outlined text-[20px]">dashboard</span>
<span class="text-sm font-medium">Dashboard</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-sky-400 font-bold border-r-4 border-sky-400 bg-slate-800/50 rounded-l-lg scale-[0.98] transition-all" href="#">
<span class="material-symbols-outlined text-[20px]">calendar_month</span>
<span class="text-sm">Bookings</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white transition-all duration-200 hover:bg-slate-800 rounded-lg" href="#">
<span class="material-symbols-outlined text-[20px]">bed</span>
<span class="text-sm font-medium">Rooms</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white transition-all duration-200 hover:bg-slate-800 rounded-lg" href="#">
<span class="material-symbols-outlined text-[20px]">package</span>
<span class="text-sm font-medium">Packages</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white transition-all duration-200 hover:bg-slate-800 rounded-lg" href="#">
<span class="material-symbols-outlined text-[20px]">surfing</span>
<span class="text-sm font-medium">Activities</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white transition-all duration-200 hover:bg-slate-800 rounded-lg" href="#">
<span class="material-symbols-outlined text-[20px]">sports_handball</span>
<span class="text-sm font-medium">Coaches</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white transition-all duration-200 hover:bg-slate-800 rounded-lg" href="#">
<span class="material-symbols-outlined text-[20px]">group</span>
<span class="text-sm font-medium">Users</span>
</a>
</nav>
<div class="p-4 mt-auto">
<button class="w-full bg-primary-container text-on-primary-container font-bold py-3 rounded-full flex items-center justify-center gap-2 transition-all hover:brightness-110 active:scale-95">
<span class="material-symbols-outlined">add</span>
                New Booking
            </button>
</div>
</aside>
<!-- TopNavBar Shell -->
<header class="fixed top-0 right-0 left-64 z-40 flex justify-between items-center px-8 h-16 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md shadow-sm">
<div class="flex items-center flex-1">
<div class="relative w-full max-w-md focus-within:ring-2 focus-within:ring-sky-500 rounded-lg">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
<input class="w-full bg-surface-container-low border-none rounded-lg pl-10 pr-4 py-2 text-sm focus:ring-0" placeholder="Search bookings..." type="text"/>
</div>
</div>
<div class="flex items-center gap-6">
<div class="flex items-center gap-4 border-r border-outline-variant pr-6">
<button class="text-slate-500 hover:text-sky-500 transition-colors">
<span class="material-symbols-outlined">notifications</span>
</button>
<button class="text-slate-500 hover:text-sky-500 transition-colors">
<span class="material-symbols-outlined">settings</span>
</button>
</div>
<div class="flex items-center gap-3">
<div class="text-right">
<p class="text-xs font-bold text-slate-900 uppercase tracking-widest leading-none">Admin User</p>
<p class="text-[10px] text-slate-500 mt-0.5">Manager Access</p>
</div>
<img alt="Admin User Profile" class="w-10 h-10 rounded-full object-cover ring-2 ring-primary-container ring-offset-2" data-alt="professional portrait of a confident male administrator in a light blue shirt with a clean modern office background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDURer8cfFC8viu65UCdIhAhqxpL0_pzxJwlnpevNdOP3RT9C_-naTjEvn4YanVBHAxa_tJ3Iw6GL4GMo4L3x3ICpTG2CZ0rjFEVqv5kjRBXoGQ2cr_-SRTC4HycLfeJ2T2fX6No8szBFP_gVnW_eYcWni__dgiui96XrlOxHVQ0qKs9xbIMrlCVEDttU424yqVsg7n-vNtsTzBe0nNgiUzmo25SiIdMoa6c1QCxCmpJfU9QXR3Im52be3rkdIzu8y7gVSoc0qoT-8"/>
</div>
</div>
</header>
<!-- Main Content Canvas -->
<main class="ml-64 pt-16 min-h-screen">
<div class="p-8 max-w-7xl mx-auto">
<!-- Header Section -->
<div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
<div>
<span class="text-primary font-bold text-sm tracking-widest uppercase mb-2 block">Management Hub</span>
<h1 class="text-4xl font-black text-on-surface tracking-tight">Booking Management</h1>
<p class="text-on-surface-variant mt-2 max-w-lg">Manage reservations, verify customer information, and maintain room availability for the Taghazout surf camp.</p>
</div>
<div class="flex gap-3">
<button class="px-6 py-3 rounded-full bg-surface-container-lowest text-primary font-semibold text-sm border border-outline-variant/20 hover:bg-surface-container-low transition-all">
                        Export Report
                    </button>
<button class="px-6 py-3 rounded-full bg-primary-container text-on-primary-container font-bold text-sm shadow-lg shadow-sky-200 hover:brightness-110 transition-all">
                        Bulk Confirm
                    </button>
</div>
</div>
<!-- Stats Overview (Bento Style) -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
<div class="bg-surface-container-lowest p-6 rounded-xl shadow-sm border-b-4 border-sky-400">
<p class="text-xs font-bold text-outline uppercase tracking-wider">Total Bookings</p>
<h3 class="text-3xl font-black mt-2">1,284</h3>
<p class="text-xs text-green-600 font-bold mt-1">+12% from last month</p>
</div>
<div class="bg-surface-container-lowest p-6 rounded-xl shadow-sm border-b-4 border-yellow-400">
<p class="text-xs font-bold text-outline uppercase tracking-wider">Pending Approval</p>
<h3 class="text-3xl font-black mt-2">18</h3>
<p class="text-xs text-on-surface-variant mt-1">Requires action</p>
</div>
<div class="bg-surface-container-lowest p-6 rounded-xl shadow-sm border-b-4 border-green-500">
<p class="text-xs font-bold text-outline uppercase tracking-wider">Check-ins Today</p>
<h3 class="text-3xl font-black mt-2">24</h3>
<p class="text-xs text-on-surface-variant mt-1">Taghazout Location</p>
</div>
<div class="bg-surface-container-lowest p-6 rounded-xl shadow-sm border-b-4 border-slate-400">
<p class="text-xs font-bold text-outline uppercase tracking-wider">Occupancy Rate</p>
<h3 class="text-3xl font-black mt-2">92%</h3>
<p class="text-xs text-on-surface-variant mt-1">High Season</p>
</div>
</div>
<!-- Data Table Section -->
<div class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low text-on-surface-variant uppercase text-[10px] tracking-widest font-black">
<th class="px-6 py-5">Booking ID</th>
<th class="px-6 py-5">Customer</th>
<th class="px-6 py-5">Check-in / Out</th>
<th class="px-6 py-5">Total Price</th>
<th class="px-6 py-5">Status</th>
<th class="px-6 py-5 text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/10">
<!-- Row 1 -->
<tr class="hover:bg-surface-container-lowest/50 transition-colors">
<td class="px-6 py-6 font-mono text-sm text-primary font-bold">#WSS-9281</td>
<td class="px-6 py-6">
<div class="flex items-center gap-3">
<img alt="Customer Avatar" class="w-10 h-10 rounded-xl object-cover" data-alt="portrait of a smiling young woman with sunglasses on her head against a coastal Moroccan background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDd5w1L3t883TrFUkf70LTThdmIzmNPF7J79-tMXwe5JZSEtwJY2JSaUhMgFMEa2fgTKqJKLmVX-HwLqAnjFM9MXg49PmwkbFHVWnCRvwLgQ461pgxGxmMNX3jYeYZYIiMkRqL6tHf9LhKQYYQ4LCdoAj4vnvgNrtgYPSBkz2mvjY05RVfJfVO0-Z3mXLujuM5ZSRcMa5VMllAVRK4bmx4ihqx-TfQrgdcwJOhXW7Iq94Qn2Ez6HPYopb6FqJBvm1EXOOumiRvWOyw"/>
<div>
<p class="text-sm font-bold">Emma Wilson</p>
<p class="text-xs text-on-surface-variant">emma.w@gmail.com</p>
</div>
</div>
</td>
<td class="px-6 py-6">
<p class="text-sm font-medium">Oct 12 — Oct 19, 2023</p>
<p class="text-[10px] text-on-surface-variant mt-0.5">7 Nights • Ocean Suite</p>
</td>
<td class="px-6 py-6 font-black text-sm">€1,240.00</td>
<td class="px-6 py-6">
<span class="px-3 py-1 bg-green-100 text-green-700 text-[10px] font-black uppercase tracking-tighter rounded-full">Confirmed</span>
</td>
<td class="px-6 py-6 text-right">
<div class="flex justify-end gap-2">
<button class="p-2 hover:bg-surface-container rounded-lg transition-colors text-slate-500 hover:text-sky-600">
<span class="material-symbols-outlined text-[20px]">visibility</span>
</button>
<button class="p-2 hover:bg-error/10 rounded-lg transition-colors text-error">
<span class="material-symbols-outlined text-[20px]">cancel</span>
</button>
</div>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-surface-container-lowest/50 transition-colors">
<td class="px-6 py-6 font-mono text-sm text-primary font-bold">#WSS-9285</td>
<td class="px-6 py-6">
<div class="flex items-center gap-3">
<img alt="Customer Avatar" class="w-10 h-10 rounded-xl object-cover" data-alt="smiling man in his late 20s with beachy hair and a casual linen shirt" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB5Sh84zWPwl0iDhXH2wpC8l0NkeH4srNEZejxJsuqA-8J5bXHT12h-DXedopud2Pivf661QCu2oERWAEO4dwOZwL5jOvIVxhvx2Hi-_g0L5C_tvNlaCskp-dSMRp9YbwDVIAK3R_99rCbYlXakuG6PmGokTUZOoaQ0YZDzSSn_n8DqIqxi_wGZZOwVkxSMbbNhII18jCziuxL61blIIC5TMNlkce2YdO6J9nOXng12YEInBGxqbtSXwDsxJ3SjngJcO-frtQiXyEU"/>
<div>
<p class="text-sm font-bold">Marcus Thorne</p>
<p class="text-xs text-on-surface-variant">m.thorne@icloud.com</p>
</div>
</div>
</td>
<td class="px-6 py-6">
<p class="text-sm font-medium">Oct 15 — Oct 22, 2023</p>
<p class="text-[10px] text-on-surface-variant mt-0.5">7 Nights • Shared Dorm</p>
</td>
<td class="px-6 py-6 font-black text-sm">€450.00</td>
<td class="px-6 py-6">
<span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-[10px] font-black uppercase tracking-tighter rounded-full">Pending</span>
</td>
<td class="px-6 py-6 text-right">
<div class="flex justify-end gap-2">
<button class="p-2 hover:bg-surface-container rounded-lg transition-colors text-slate-500 hover:text-sky-600">
<span class="material-symbols-outlined text-[20px]">visibility</span>
</button>
<button class="p-2 hover:bg-error/10 rounded-lg transition-colors text-error">
<span class="material-symbols-outlined text-[20px]">cancel</span>
</button>
</div>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-surface-container-lowest/50 transition-colors bg-surface-container-low/20">
<td class="px-6 py-6 font-mono text-sm text-primary font-bold opacity-50">#WSS-9270</td>
<td class="px-6 py-6 opacity-50">
<div class="flex items-center gap-3">
<img alt="Customer Avatar" class="w-10 h-10 rounded-xl object-cover grayscale" data-alt="calm woman looking at the camera with soft natural lighting and a coastal aesthetic" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDI41Qc5wXAg5DYhoNSDX7ny2qSv7dGF42TGt_u5iQWWbO4Pyn4GgFpE77nt2XE-w-1gFVlmvnsd_SVQ_QusiUJpv_VCvnR5VII8r73RTcYD1pDYqIggRns5thOqlkPVYrKoGybvORenbk5Zq_ZYkj5DX2OShE25PL0oasUGqM-Qcf8Pb6L9h2QTz_pXPWEmdDj1jogztmf3b99v5UvYNRs6KG1dVotMzqxeNJcFgvgix6wPSBxYxVh0wyIoSubiziXk-pjHPZIRiI"/>
<div>
<p class="text-sm font-bold">Sarah Jenkins</p>
<p class="text-xs text-on-surface-variant">s.jenkins@proton.me</p>
</div>
</div>
</td>
<td class="px-6 py-6 opacity-50">
<p class="text-sm font-medium">Oct 10 — Oct 14, 2023</p>
<p class="text-[10px] text-on-surface-variant mt-0.5">4 Nights • Standard Twin</p>
</td>
<td class="px-6 py-6 font-black text-sm opacity-50">€680.00</td>
<td class="px-6 py-6">
<span class="px-3 py-1 bg-red-100 text-red-700 text-[10px] font-black uppercase tracking-tighter rounded-full">Cancelled</span>
</td>
<td class="px-6 py-6 text-right">
<div class="flex justify-end gap-2">
<button class="p-2 hover:bg-surface-container rounded-lg transition-colors text-slate-500 hover:text-sky-600">
<span class="material-symbols-outlined text-[20px]">visibility</span>
</button>
<button class="p-2 bg-error/10 rounded-lg transition-colors text-error opacity-50 cursor-not-allowed">
<span class="material-symbols-outlined text-[20px]">cancel</span>
</button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<div class="p-6 bg-surface-container-lowest flex items-center justify-between border-t border-outline-variant/10">
<p class="text-xs text-on-surface-variant">Showing 1 to 10 of 1,284 bookings</p>
<div class="flex gap-2">
<button class="p-2 hover:bg-surface-container rounded-lg transition-colors disabled:opacity-30" disabled="">
<span class="material-symbols-outlined">chevron_left</span>
</button>
<button class="w-8 h-8 rounded-lg bg-primary-container text-on-primary-container text-xs font-bold">1</button>
<button class="w-8 h-8 rounded-lg hover:bg-surface-container text-xs font-bold">2</button>
<button class="w-8 h-8 rounded-lg hover:bg-surface-container text-xs font-bold">3</button>
<button class="p-2 hover:bg-surface-container rounded-lg transition-colors">
<span class="material-symbols-outlined">chevron_right</span>
</button>
</div>
</div>
</div>
</div>
</main>
<!-- Cancellation Confirmation Modal (Simulated View) -->
<!-- Note: This is visible in the source for representation, hidden by scale-0/opacity-0 classes -->
<div class="fixed inset-0 z-[100] flex items-center justify-center p-6 bg-slate-900/60 backdrop-blur-sm transition-all duration-300 opacity-0 pointer-events-none hover:opacity-100 hover:pointer-events-auto">
<div class="bg-surface-container-lowest w-full max-w-md rounded-[2rem] p-10 shadow-2xl relative overflow-hidden">
<div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-red-500 to-red-600"></div>
<div class="flex items-center justify-center w-16 h-16 bg-red-100 rounded-full mb-6 mx-auto">
<span class="material-symbols-outlined text-red-600 text-3xl">warning</span>
</div>
<h2 class="text-2xl font-black text-center text-on-surface tracking-tight mb-4">Confirm Cancellation</h2>
<div class="bg-surface-container-low p-6 rounded-2xl mb-8">
<p class="text-sm text-on-surface-variant leading-relaxed text-center">
                    Are you sure you want to cancel booking <span class="font-black text-on-surface">#WSS-9285</span>?
                </p>
<div class="mt-4 pt-4 border-t border-outline-variant/20">
<div class="flex items-center gap-3 text-sm text-on-surface-variant">
<span class="material-symbols-outlined text-green-600">inventory_2</span>
<p>This will automatically restore <span class="font-bold">1x Shared Dorm</span> to active stock.</p>
</div>
</div>
</div>
<div class="flex flex-col gap-3">
<button class="w-full py-4 bg-error text-white font-bold rounded-full hover:brightness-110 transition-all active:scale-[0.98]">
                    Cancel Booking &amp; Release Room
                </button>
<button class="w-full py-4 bg-transparent text-on-surface-variant font-bold rounded-full hover:bg-surface-container-low transition-all">
                    No, Keep Booking
                </button>
</div>
<p class="text-[10px] text-on-surface-variant mt-6 text-center uppercase tracking-widest font-medium">
                Internal action • Logged as Admin
            </p>
</div>
</div>
</body></html>