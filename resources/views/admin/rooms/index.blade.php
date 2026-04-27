@extends('layouts.admin')

@section('title', 'Room Inventory - Admin Dashboard')

@section('content')
    <!-- Page Header -->
    <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <span class="text-tertiary font-bold text-sm tracking-widest uppercase mb-2 block">Accommodation</span>
            <h1 class="text-4xl font-black text-on-surface tracking-tight">Room Inventory</h1>
            <p class="text-on-surface-variant mt-2 max-w-lg">Manage your premium room collection with real-time stock tracking and availability monitoring.</p>
        </div>
        <button onclick="openAddRoom()" class="flex items-center gap-2 py-3 px-6 bg-tertiary-container text-on-tertiary rounded-full font-bold text-sm shadow-lg shadow-blue-200 hover:brightness-110 transition-all">
            <span class="material-symbols-outlined text-lg">add</span>
            Add New Room
        </button>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="bg-emerald-50 border border-emerald-300 rounded-lg p-4 text-emerald-700 text-sm font-medium mb-6 flex items-center gap-3">
            <span class="material-symbols-outlined text-green-600">check_circle</span>
            {{ session('success') }}
        </div>
    @endif

    <!-- Rooms Grid Cards -->
    <div>
        @if ($rooms->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($rooms as $room)
                    <div class="group relative bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-300 border border-surface-container-high/50 hover:border-tertiary/40 flex flex-col h-full">

                        <!-- Status Indicator Badge (Top Right) -->
                        <div class="absolute top-4 right-4 z-10">
                            @if ($room->is_active)
                                <div class="flex items-center gap-2 px-3 py-1.5 bg-emerald-500/95 rounded-full shadow-lg">
                                    <span class="material-symbols-outlined text-white text-lg">check_circle</span>
                                    <span class="text-white text-[10px] font-black uppercase tracking-widest">Active</span>
                                </div>
                            @else
                                <div class="flex items-center gap-2 px-3 py-1.5 bg-slate-500/95 rounded-full shadow-lg">
                                    <span class="material-symbols-outlined text-white text-lg">pause_circle</span>
                                    <span class="text-white text-[10px] font-black uppercase tracking-widest">Inactive</span>
                                </div>
                            @endif
                        </div>

                        <!-- Image Section with Gradient -->
                        <div class="relative h-52 overflow-hidden bg-gradient-to-br from-blue-50 via-cyan-50 to-teal-50">
                            <img src="{{ asset($room->image_path ? 'storage/' . $room->image_path : 'images/default-room.png') }}" alt="{{ $room->type }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22%3E%3Crect fill=%22%23f0f9ff%22 width=%22100%22 height=%22100%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 font-size=%2250%22 text-anchor=%22middle%22 dominant-baseline=%22middle%22%3E🛏️%3C/text%3E%3C/svg%3E'">
                            <!-- Room Type Badge (Top Left) -->
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1.5 bg-white/95 text-slate-900 text-[10px] font-black uppercase tracking-widest rounded-lg shadow-md flex items-center gap-1">
                                    <span class="material-symbols-outlined text-lg">bed</span>
                                    {{ $room->type }}
                                </span>
                            </div>
                        </div>

                        <!-- Card Content -->
                        <div class="p-6 flex-1 flex flex-col">
                            <!-- Main Details Section -->
                            <div class="mb-4">
                                <p class="text-xs text-tertiary font-black uppercase tracking-wider mb-1">Premium Accommodation</p>
                                <h3 class="text-xl font-black text-on-surface">{{ $room->type }}</h3>
                            </div>

                            <!-- Price and Capacity Row -->
                            <div class="grid grid-cols-2 gap-3 mb-4 pb-4 border-b border-surface-container-low/50">
                                <div class="bg-tertiary-fixed/30 rounded-xl p-3 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-lg text-tertiary">euro</span>
                                    <div>
                                        <p class="text-[9px] text-on-surface-variant uppercase font-bold">Per Night</p>
                                        <p class="text-lg font-black text-on-surface">€{{ number_format($room->price_per_night, 0) }}</p>
                                    </div>
                                </div>
                                <div class="bg-blue-100/50 rounded-xl p-3 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-lg text-blue-600">group</span>
                                    <div>
                                        <p class="text-[9px] text-on-surface-variant uppercase font-bold">Capacity</p>
                                        <p class="text-lg font-black text-on-surface">{{ $room->capacity ?? '—' }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Stock Status -->
                            <div class="mb-4">
                                <div class="flex items-center justify-between mb-2">
                                    <p class="text-[10px] text-on-surface-variant uppercase font-bold flex items-center gap-1">
                                        <span class="material-symbols-outlined text-sm">inventory_2</span>
                                        Available Stock
                                    </p>
                                    <span class="text-sm font-black text-on-surface">{{ $room->total_stock }}</span>
                                </div>
                                <!-- Stock Progress Bar -->
                                <div class="w-full h-2 bg-surface-container-low rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-blue-400 to-cyan-500 rounded-full" style="width: {{ min($room->total_stock * 10, 100) }}%"></div>
                                </div>
                            </div>

                            <!-- Features Badges -->
                            <div class="flex flex-wrap gap-2">
                                <span class="px-2.5 py-1.5 bg-tertiary-fixed text-on-tertiary-fixed-variant text-[9px] font-black rounded-lg flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm">hotel</span>
                                    Standard
                                </span>
                                @if ($room->capacity >= 2)
                                    <span class="px-2.5 py-1.5 bg-blue-100 text-blue-700 text-[9px] font-black rounded-lg flex items-center gap-1">
                                        <span class="material-symbols-outlined text-sm">people</span>
                                        Multi-Guest
                                    </span>
                                @endif
                                @if ($room->is_active)
                                    <span class="px-2.5 py-1.5 bg-emerald-100 text-emerald-700 text-[9px] font-black rounded-lg flex items-center gap-1">
                                        <span class="material-symbols-outlined text-sm">check</span>
                                        Available
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Action Buttons Footer -->
                        <div class="p-6 bg-gradient-to-r from-slate-50/50 to-slate-50/30 border-t border-surface-container-low/50 flex items-center justify-between gap-3">
                            <button onclick='openEditRoom(@json($room))' class="flex-1 py-2.5 px-4 bg-tertiary-container text-white rounded-lg font-bold text-sm hover:brightness-110 transition-all flex items-center justify-center gap-2 group/edit">
                                <span class="material-symbols-outlined text-lg group-hover/edit:rotate-12 transition-transform">edit</span>
                                <span class="hidden sm:inline">Edit</span>
                            </button>
                            <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this room?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2.5 text-error hover:bg-error/10 rounded-lg transition-all hover:scale-110">
                                    <span class="material-symbols-outlined text-lg">delete</span>
                                </button>
                            </form>
                            <!-- Stock Indicator Dot -->
                            <div class="flex items-center gap-2 pl-3 border-l border-surface-container-low/30">
                                <span class="w-3 h-3 rounded-full {{ $room->total_stock > 0 ? 'bg-green-500 animate-pulse' : 'bg-red-500' }}"></span>
                                <span class="text-[10px] text-on-surface-variant font-bold uppercase">{{ $room->total_stock > 0 ? 'In Stock' : 'Empty' }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if ($rooms->hasPages())
                <div class="mt-10 flex justify-center">
                    {{ $rooms->links() }}
                </div>
            @endif
        @else
            <div class="bg-surface-container-lowest rounded-2xl p-16 text-center shadow-sm border border-surface-container-high/50">
                <span class="material-symbols-outlined text-6xl text-tertiary mb-4 block opacity-40">bed</span>
                <h3 class="text-xl font-bold text-on-surface mb-2">No Rooms Yet</h3>
                <p class="text-on-surface-variant font-medium mb-6">Create your first room to start managing your accommodation inventory.</p>
                <button onclick="openAddRoom()" class="inline-flex items-center gap-2 py-3 px-6 bg-tertiary-container text-on-tertiary rounded-full font-bold text-sm shadow-lg shadow-blue-200 hover:brightness-110 transition-all">
                    <span class="material-symbols-outlined">add</span>
                    Create First Room
                </button>
            </div>
        @endif
    </div>

    <!-- Right-Side Panel (Slide-out Form) -->
    <div id="room-panel" class="hidden fixed right-0 top-0 h-full w-96 bg-white shadow-xl z-50 flex flex-col border-l border-surface-container-high overflow-y-auto">
        <!-- Panel Header -->
        <div class="p-6 bg-primary-container text-white border-b border-primary">
            <div class="flex justify-between items-center">
                <h3 id="panel-title" class="font-bold text-xl">Add Room</h3>
                <button onclick="closePanel()" class="text-white hover:rotate-90 transition-transform">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
        </div>

        <!-- Panel Form -->
        <form id="room-form" method="POST" enctype="multipart/form-data" data-store-route="{{ route('admin.rooms.store') }}" data-update-route="{{ route('admin.rooms.update', ':id') }}" data-storage-url="{{ asset('storage/') }}" class="flex-1 p-6 space-y-5 flex flex-col">
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
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Room Type</label>
                <input id="room-type" type="text" name="type" placeholder="e.g., Standard, Deluxe, Suite..." class="w-full bg-surface-container-low border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary-container" required>
                <p class="text-xs text-slate-400 mt-1">Enter a unique room type name</p>
                <p id="type-error" class="text-red-600 text-xs mt-1 hidden"></p>
            </div>

            <!-- Image Upload Section -->
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-3">Room Image</label>
                <div class="relative">
                    <div id="image-preview" class="w-full h-32 bg-gradient-to-br from-sky-50 to-blue-50 rounded-lg border-2 border-dashed border-sky-300 flex items-center justify-center cursor-pointer hover:border-sky-500 transition-colors overflow-hidden">
                        <div id="preview-content" class="text-center">
                            <span class="material-symbols-outlined text-4xl text-sky-400 block mb-1">image</span>
                            <p class="text-xs text-slate-500">Click to upload image</p>
                        </div>
                        <img id="preview-image" src="" alt="preview" class="hidden w-full h-full object-cover">
                    </div>
                    <input id="room-image" type="file" name="image" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewImage(event)">
                </div>
                <p class="text-xs text-slate-400 mt-2">JPG, PNG, GIF up to 2MB</p>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Price (€/Night)</label>
                    <input id="room-price" type="number" name="price_per_night" step="0.01" class="w-full bg-surface-container-low border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary-container" required>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Stock</label>
                    <input id="room-stock" type="number" name="total_stock" class="w-full bg-surface-container-low border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary-container" required>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Capacity</label>
                <input id="room-capacity" type="number" name="capacity" class="w-full bg-surface-container-low border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary-container">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Active Status</label>
                <div class="flex items-center gap-4 mt-2">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="hidden" name="is_active" value="0">
                        <input id="room-active" type="checkbox" name="is_active" value="1" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-sky-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-sky-500"></div>
                        <span class="ml-3 text-sm font-medium text-slate-600">Active on Website</span>
                    </label>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="pt-4 space-y-3 mt-auto">
                <button type="submit" class="w-full py-3 bg-primary-container text-white rounded-full font-bold shadow-lg shadow-sky-200 hover:bg-primary transition-all">
                    Save Room
                </button>
                <button type="button" onclick="closePanel()" class="w-full py-3 border-2 border-surface-container text-slate-500 rounded-full font-bold hover:bg-surface-container transition-all text-sm">
                    Cancel
                </button>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/admin/room.js') }}"></script>
@endsection
