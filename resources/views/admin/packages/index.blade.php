@extends('layouts.admin')

@section('title', 'Packages - Admin Dashboard')

@section('content')
    <!-- Page Header -->
    <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <span class="text-primary font-bold text-sm tracking-widest uppercase mb-2 block">Catalog Hub</span>
            <h1 class="text-4xl font-black text-on-surface tracking-tight">Packages</h1>
            <p class="text-on-surface-variant mt-2 max-w-lg">Curated retreat and activity packages featuring world-class coaching and comprehensive experiences.</p>
        </div>
        <button onclick="openAddPackage()" class="flex items-center gap-2 py-3 px-6 bg-primary-container text-on-primary-container rounded-full font-bold text-sm shadow-lg shadow-sky-200 hover:brightness-110 transition-all">
            <span class="material-symbols-outlined text-lg">add</span>
            Add New Package
        </button>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="bg-emerald-50 border border-emerald-300 rounded-lg p-4 text-emerald-700 text-sm font-medium mb-6 flex items-center gap-3">
            <span class="material-symbols-outlined text-green-600">check_circle</span>
            {{ session('success') }}
        </div>
    @endif

    <!-- Packages Grid Cards -->
    <div>
        @if ($packages->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($packages as $package)
                    <div class="group bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-surface-container-high/50 hover:border-primary/30 flex flex-col h-full">

                        <!-- Image Section with Gradient Overlay -->
                        <div class="relative h-48 overflow-hidden bg-gradient-to-br from-sky-100 to-blue-100">
                            <img src="{{ asset($package->image_path ? 'storage/' . $package->image_path : 'images/default-package.png') }}" alt="{{ $package->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22%3E%3Crect fill=%22%23e0f2fe%22 width=%22100%22 height=%22100%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 font-size=%2250%22 text-anchor=%22middle%22 dominant-baseline=%22middle%22%3E📦%3C/text%3E%3C/svg%3E'">
                            <!-- Status Badge -->
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-white/95 text-slate-900 text-[10px] font-black uppercase tracking-widest rounded-full shadow-md">
                                    {{ $package->duration_days }}-Day
                                </span>
                            </div>
                        </div>

                        <!-- Card Content -->
                        <div class="p-6 flex-1 flex flex-col">
                            <!-- Title and Price -->
                            <h3 class="text-xl font-black text-on-surface mb-2 line-clamp-2">{{ $package->name }}</h3>
                            <p class="text-xs text-on-surface-variant mb-4 line-clamp-2">{{ $package->description }}</p>

                            <!-- Details Grid -->
                            <div class="grid grid-cols-2 gap-3 mb-4 py-4 border-y border-surface-container-low/50">
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-primary text-lg">schedule</span>
                                    <div>
                                        <p class="text-[10px] text-on-surface-variant uppercase font-bold">Duration</p>
                                        <p class="text-sm font-black text-on-surface">{{ $package->duration_days }} Days</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-orange-500 text-lg">euro</span>
                                    <div>
                                        <p class="text-[10px] text-on-surface-variant uppercase font-bold">Price</p>
                                        <p class="text-sm font-black text-on-surface">€{{ number_format($package->base_price, 0) }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Activities Section -->
                            @if ($package->activities->count() > 0)
                                <div class="mb-4">
                                    <p class="text-[10px] text-on-surface-variant uppercase font-bold mb-2">
                                        <span class="material-symbols-outlined text-sm align-text-bottom mr-1 inline">local_activity</span>
                                        Activities ({{ $package->activities->count() }})
                                    </p>
                                    <div class="flex flex-wrap gap-2">
                                        @foreach ($package->activities->take(3) as $activity)
                                            <span class="px-2 py-1 bg-sky-50 text-sky-700 text-[10px] font-bold rounded-full border border-sky-200">
                                                {{ $activity->name }}
                                            </span>
                                        @endforeach
                                        @if ($package->activities->count() > 3)
                                            <span class="px-2 py-1 bg-slate-100 text-slate-700 text-[10px] font-bold rounded-full border border-slate-200">
                                                +{{ $package->activities->count() - 3 }} more
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            @else
                                <div class="mb-4 p-3 bg-amber-50 rounded-lg border border-amber-200">
                                    <p class="text-[10px] text-amber-700 font-medium">No activities added yet</p>
                                </div>
                            @endif
                        </div>

                        <!-- Action Buttons -->
                        <div class="p-6 bg-surface-container-lowest/50 border-t border-surface-container-low/50 flex items-center justify-end gap-3">
                            <button onclick='openEditPackage(@json($package))' class="flex-1 py-2 px-4 bg-sky-50 text-sky-600 rounded-lg font-bold text-sm hover:bg-sky-100 transition-all flex items-center justify-center gap-2 group/edit">
                                <span class="material-symbols-outlined text-lg group-hover/edit:scale-110 transition-transform">edit</span>
                                <span class="hidden sm:inline">Edit</span>
                            </button>
                            <form action="{{ route('admin.packages.destroy', $package->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this package?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-error hover:bg-error/10 rounded-lg transition-all hover:scale-110">
                                    <span class="material-symbols-outlined text-lg">delete</span>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if ($packages->hasPages())
                <div class="mt-10 flex justify-center">
                    {{ $packages->links() }}
                </div>
            @endif
        @else
            <div class="bg-surface-container-lowest rounded-2xl p-16 text-center shadow-sm border border-surface-container-high/50">
                <span class="material-symbols-outlined text-6xl text-outline mb-4 block opacity-40">package_2</span>
                <h3 class="text-xl font-bold text-on-surface mb-2">No Packages Yet</h3>
                <p class="text-on-surface-variant font-medium mb-6">Create your first package to get started with offering retreats and activities.</p>
                <button onclick="openAddPackage()" class="inline-flex items-center gap-2 py-3 px-6 bg-primary-container text-on-primary-container rounded-full font-bold text-sm shadow-lg shadow-sky-200 hover:brightness-110 transition-all">
                    <span class="material-symbols-outlined">add</span>
                    Create First Package
                </button>
            </div>
        @endif
    </div>

    <!-- Right-Side Panel (Slide-out Form) -->
    <div id="package-panel" class="hidden fixed right-0 top-0 h-full w-full md:w-[700px] bg-white shadow-xl z-50 flex flex-col border-l border-surface-container-high overflow-y-auto">
        <!-- Panel Header -->
        <div class="p-6 bg-primary-container text-white border-b border-primary">
            <div class="flex justify-between items-center">
                <h3 id="panel-title" class="font-bold text-xl">Add Package</h3>
                <button onclick="closePanel()" class="text-white hover:rotate-90 transition-transform">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
        </div>

        <!-- Panel Form -->
        <form id="package-form" method="POST" enctype="multipart/form-data" data-store-route="{{ route('admin.packages.store') }}" data-update-route="{{ route('admin.packages.update', ':id') }}" data-storage-url="{{ asset('storage/') }}" class="flex-1 p-6 space-y-5 flex flex-col">
            @csrf
            <input type="hidden" id="form-method" name="_method" value="POST">

            <!-- Error Messages Display -->
            <div id="error-container" class="hidden bg-red-50 border border-red-300 rounded-lg p-4">
                <div class="flex gap-2 mb-2">
                    <span class="material-symbols-outlined text-red-600 text-lg">error</span>
                    <p class="text-red-700 font-bold text-sm">Please fix the errors below:</p>
                </div>
                <ul id="error-list" class="text-red-600 text-xs space-y-1 ml-4"></ul>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Package Name</label>
                <input id="package-name" type="text" name="name" placeholder="e.g., 7-Day Retreat" class="w-full bg-surface-container-low border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary-container" required>
                <p class="text-xs text-slate-400 mt-1">Enter package name</p>
                <p id="name-error" class="text-red-600 text-xs mt-1 hidden"></p>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Description</label>
                <textarea id="package-description" name="description" placeholder="Package details..." class="w-full bg-surface-container-low border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary-container" rows="3" required></textarea>
                <p class="text-xs text-slate-400 mt-1">Detailed package description</p>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Duration (Days)</label>
                <input id="package-duration" type="number" name="duration_days" min="1" placeholder="e.g., 7" class="w-full bg-surface-container-low border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary-container" required>
                <p class="text-xs text-slate-400 mt-1">Package duration in days</p>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Base Price (€)</label>
                <input id="package-price" type="number" name="base_price" step="0.01" min="0" placeholder="0.00" class="w-full bg-surface-container-low border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary-container" required>
                <p class="text-xs text-slate-400 mt-1">Starting price in EUR</p>
            </div>

            <!-- Image Upload Section -->
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-3">Package Image</label>
                <div class="relative">
                    <div id="image-preview" class="w-full h-32 bg-gradient-to-br from-sky-50 to-blue-50 rounded-lg border-2 border-dashed border-sky-300 flex items-center justify-center cursor-pointer hover:border-sky-500 transition-colors overflow-hidden">
                        <div id="preview-content" class="text-center">
                            <span class="material-symbols-outlined text-4xl text-sky-400 block mb-1">image</span>
                            <p class="text-xs text-slate-500">Click to upload image</p>
                        </div>
                        <img id="preview-image" src="" alt="preview" class="hidden w-full h-full object-cover">
                    </div>
                    <input id="package-image" type="file" name="image" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewImage(event)">
                </div>
                <p class="text-xs text-slate-400 mt-2">JPG, PNG, GIF up to 2MB</p>
            </div>

            <!-- Activities Section -->
            <div class="border-t border-surface-container-high pt-4">
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-3">Activities & Sessions</label>
                <div class="space-y-2 max-h-96 overflow-y-auto pr-2">
                    @forelse($activities as $activity)
                        <div class="flex items-center gap-3 p-3 bg-surface-container-low rounded-lg hover:bg-surface-container transition-colors">
                            <input type="checkbox" class="activity-checkbox rounded cursor-pointer" name="activity_ids[]" value="{{ $activity->id }}" onchange="toggleSessionInput(this)" id="activity-{{ $activity->id }}">
                            <label for="activity-{{ $activity->id }}" class="flex-1 text-sm font-medium text-slate-900 cursor-pointer">{{ $activity->name }}</label>
                            <input type="number" class="session-input hidden bg-white border border-surface-container-high rounded px-3 py-2 text-sm w-24" name="sessions[{{ $activity->id }}]" min="1" placeholder="Sessions" onchange="validateSessionInput(this)">
                        </div>
                    @empty
                        <p class="text-xs text-slate-500 text-center py-4">No activities available</p>
                    @endforelse
                </div>
            </div>

            <!-- Form Actions -->
            <div class="pt-4 space-y-3 mt-auto">
                <button type="submit" class="w-full py-3 bg-primary-container text-white rounded-full font-bold shadow-lg shadow-sky-200 hover:bg-primary transition-all">
                    Save Package
                </button>
                <button type="button" onclick="closePanel()" class="w-full py-3 border-2 border-surface-container text-slate-500 rounded-full font-bold hover:bg-surface-container transition-all text-sm">
                    Cancel
                </button>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/admin/package.js') }}"></script>
@endsection
