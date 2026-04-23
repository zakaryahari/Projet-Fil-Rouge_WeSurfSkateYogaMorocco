@extends('layouts.admin')

@section('title', 'Room Inventory - Admin Dashboard')

@section('content')
    <!-- Page Header -->
    <div class="flex flex-col gap-1 mb-8">
        <p class="text-sky-600 font-medium text-sm tracking-wide">Inventory</p>
        <h2 class="text-3xl font-black text-on-surface tracking-tight">Room Inventory</h2>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="bg-emerald-50 border border-emerald-300 rounded-lg p-4 text-emerald-700 text-sm font-medium mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Room Inventory Table -->
    <div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm">
        <div class="p-6 flex justify-between items-center bg-surface-container-low/50 border-b border-surface-container-high">
            <h3 class="font-bold text-lg">Rooms</h3>
            <button onclick="openAddRoom()" class="flex items-center gap-2 py-2 px-5 bg-primary-container text-white rounded-full font-bold text-sm hover:bg-primary transition-all">
                <span class="material-symbols-outlined text-lg">add</span>
                Add New Room
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-surface-container-low text-slate-500 uppercase text-[0.65rem] font-bold tracking-widest">
                        <th class="px-8 py-4">Image</th>
                        <th class="px-8 py-4">Title</th>
                        <th class="px-8 py-4">Price/Night</th>
                        <th class="px-8 py-4">Total Stock</th>
                        <th class="px-8 py-4 text-center">Status</th>
                        <th class="px-8 py-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-container-low">
                    @forelse ($rooms as $room)
                        <tr class="group hover:bg-surface-container-low/30 transition-colors">
                            <td class="px-8 py-5">
                                @if ($room->image_path)
                                    <img src="{{ asset('storage/' . $room->image_path) }}" alt="{{ $room->name }}" class="w-12 h-12 rounded-lg object-cover">
                                @else
                                    <div class="w-12 h-12 rounded-lg bg-surface-container flex items-center justify-center">
                                        <span class="material-symbols-outlined text-slate-400">image</span>
                                    </div>
                                @endif
                            </td>
                            <td class="px-8 py-5">
                                <div>
                                    <p class="font-semibold text-slate-900">{{ $room->name }}</p>
                                    <p class="text-xs text-slate-500">{{ $room->type }}</p>
                                </div>
                            </td>
                            <td class="px-8 py-5 font-medium text-slate-900">€{{ number_format($room->price_per_night, 2) }}</td>
                            <td class="px-8 py-5">
                                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-sky-50 text-sky-600 border border-sky-100">
                                    {{ $room->total_stock }} Units
                                </span>
                            </td>
                            <td class="px-8 py-5">
                                <div class="flex justify-center">
                                    @if ($room->is_active)
                                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-50 text-emerald-600 border border-emerald-100">Active</span>
                                    @else
                                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-slate-50 text-slate-600 border border-slate-100">Inactive</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-8 py-5 text-right">
                                <div class="flex justify-end gap-2">
                                    <button onclick='openEditRoom(@json($room))' class="p-2 text-slate-400 hover:text-sky-600 hover:bg-sky-50 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined">edit</span>
                                    </button>
                                    <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this room?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                            <span class="material-symbols-outlined">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-8 py-5 text-center text-slate-400">No rooms found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
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
        <form id="room-form" method="POST" enctype="multipart/form-data" class="flex-1 p-6 space-y-5 flex flex-col">
            @csrf
            <input type="hidden" id="form-method" name="_method" value="POST">

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Room Title</label>
                <input id="room-title" type="text" name="name" class="w-full bg-surface-container-low border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary-container" required>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Room Type</label>
                <select id="room-type" name="type" class="w-full bg-surface-container-low border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary-container" required>
                    <option value="">Select a room type</option>
                    <option value="Standard">Standard</option>
                    <option value="Deluxe">Deluxe</option>
                    <option value="Suite">Suite</option>
                    <option value="Villa">Villa</option>
                    <option value="Beach House">Beach House</option>
                </select>
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
                        <input id="room-active" type="checkbox" name="is_active" class="sr-only peer" checked>
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

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview-image').src = e.target.result;
                    document.getElementById('preview-image').classList.remove('hidden');
                    document.getElementById('preview-content').classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        }

        function clearImagePreview() {
            document.getElementById('room-image').value = '';
            document.getElementById('preview-image').src = '';
            document.getElementById('preview-image').classList.add('hidden');
            document.getElementById('preview-content').classList.remove('hidden');
        }

        function openAddRoom() {
            document.getElementById('panel-title').textContent = 'Add Room';
            document.getElementById('room-form').reset();
            clearImagePreview();
            document.getElementById('form-method').value = 'POST';
            document.getElementById('room-form').action = '{{ route("admin.rooms.store") }}';
            document.getElementById('room-active').checked = true;
            document.getElementById('room-panel').classList.remove('hidden');
        }

        function openEditRoom(roomData) {
            document.getElementById('panel-title').textContent = 'Edit Room';
            document.getElementById('room-title').value = roomData.name;
            document.getElementById('room-type').value = roomData.type;
            document.getElementById('room-price').value = roomData.price_per_night;
            document.getElementById('room-stock').value = roomData.total_stock;
            document.getElementById('room-capacity').value = roomData.capacity || '';
            document.getElementById('room-active').checked = roomData.is_active === 1 || roomData.is_active === true;

            // Set image preview if exists
            if (roomData.image_path) {
                document.getElementById('preview-image').src = '{{ asset("storage/") }}' + roomData.image_path;
                document.getElementById('preview-image').classList.remove('hidden');
                document.getElementById('preview-content').classList.add('hidden');
            } else {
                clearImagePreview();
            }

            document.getElementById('form-method').value = 'PUT';
            document.getElementById('room-form').action = '{{ route("admin.rooms.update", ":id") }}'.replace(':id', roomData.id);
            document.getElementById('room-panel').classList.remove('hidden');
        }

        function closePanel() {
            document.getElementById('room-panel').classList.add('hidden');
        }

        // Close panel when clicking outside
        document.addEventListener('click', function(event) {
            const panel = document.getElementById('room-panel');
            if (!panel.contains(event.target) && event.target.id !== 'add-room-btn' && !event.target.closest('button[onclick*="openAddRoom"]') && !event.target.closest('button[onclick*="openEditRoom"]')) {
                if (!panel.classList.contains('hidden') && !event.target.closest('form')) {
                    // Allow clicks on the form
                }
            }
        });
    </script>
@endsection
