@extends('layouts.admin')

@section('title', 'Packages - Admin Dashboard')

@section('content')
    <!-- Page Header -->
    <div class="flex flex-col gap-1 mb-8">
        <p class="text-sky-600 font-medium text-sm tracking-wide">Catalog</p>
        <h2 class="text-3xl font-black text-on-surface tracking-tight">Packages</h2>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="bg-emerald-50 border border-emerald-300 rounded-lg p-4 text-emerald-700 text-sm font-medium mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Packages Table -->
    <div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm">
        <div class="p-6 flex justify-between items-center bg-surface-container-low/50 border-b border-surface-container-high">
            <h3 class="font-bold text-lg">Packages</h3>
            <button onclick="openAddPackage()" class="flex items-center gap-2 py-2 px-5 bg-primary-container text-white rounded-full font-bold text-sm hover:bg-primary transition-all">
                <span class="material-symbols-outlined text-lg">add</span>
                Add New Package
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-surface-container-low text-slate-500 uppercase text-[0.65rem] font-bold tracking-widest">
                        <th class="px-8 py-4">Image</th>
                        <th class="px-8 py-4">Name</th>
                        <th class="px-8 py-4">Base Price</th>
                        <th class="px-8 py-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-container-low">
                    @forelse ($packages as $package)
                        <tr class="group hover:bg-surface-container-low/30 transition-colors">
                            <td class="px-8 py-5">
                                <img src="{{ asset($package->image_path ? 'storage/' . $package->image_path : 'images/default-package.png') }}" alt="{{ $package->name }}" class="w-12 h-12 rounded-lg object-cover" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22%3E%3Crect fill=%22%23e2e8f0%22 width=%22100%22 height=%22100%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 font-size=%2230%22 text-anchor=%22middle%22 dominant-baseline=%22middle%22 fill=%22%23a0aec0%22%3E📦%3C/text%3E%3C/svg%3E'">
                            </td>
                            <td class="px-8 py-5">
                                <div>
                                    <p class="font-semibold text-slate-900">{{ $package->name }}</p>
                                </div>
                            </td>
                            <td class="px-8 py-5 font-medium text-slate-900">€{{ number_format($package->base_price, 2) }}</td>
                            <td class="px-8 py-5 text-right">
                                <div class="flex justify-end gap-2">
                                    <button onclick='openEditPackage(@json($package))' class="p-2 text-slate-400 hover:text-sky-600 hover:bg-sky-50 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined">edit</span>
                                    </button>
                                    <form action="{{ route('admin.packages.destroy', $package->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this package?');">
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
                            <td colspan="4" class="px-8 py-5 text-center text-slate-400">No packages found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
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
        <form id="package-form" method="POST" enctype="multipart/form-data" class="flex-1 p-6 space-y-5 flex flex-col">
            @csrf
            <input type="hidden" id="form-method" name="_method" value="POST">

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Package Name</label>
                <input id="package-name" type="text" name="name" placeholder="e.g., 7-Day Retreat" class="w-full bg-surface-container-low border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary-container" required>
                <p class="text-xs text-slate-400 mt-1">Enter package name</p>
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
            document.getElementById('package-image').value = '';
            document.getElementById('preview-image').src = '';
            document.getElementById('preview-image').classList.add('hidden');
            document.getElementById('preview-content').classList.remove('hidden');
        }

        function openAddPackage() {
            document.getElementById('panel-title').textContent = 'Add Package';
            document.getElementById('package-form').reset();
            clearImagePreview();
            document.getElementById('form-method').value = 'POST';
            document.getElementById('package-form').action = '{{ route("admin.packages.store") }}';

            // Reset all activities
            document.querySelectorAll('.activity-checkbox').forEach(checkbox => {
                checkbox.checked = false;
            });
            document.querySelectorAll('.session-input').forEach(input => {
                input.classList.add('hidden');
                input.value = '';
            });

            document.getElementById('package-panel').classList.remove('hidden');
        }

        function openEditPackage(packageData) {
            document.getElementById('panel-title').textContent = 'Edit Package';
            document.getElementById('package-name').value = packageData.name;
            document.getElementById('package-description').value = packageData.description;
            document.getElementById('package-duration').value = packageData.duration_days;
            document.getElementById('package-price').value = packageData.base_price;

            // Set image preview if exists
            if (packageData.image_path) {
                document.getElementById('preview-image').src = '{{ asset("storage/") }}' + packageData.image_path;
                document.getElementById('preview-image').classList.remove('hidden');
                document.getElementById('preview-content').classList.add('hidden');
            } else {
                clearImagePreview();
            }

            // Reset all activities first
            document.querySelectorAll('.activity-checkbox').forEach(checkbox => {
                checkbox.checked = false;
            });
            document.querySelectorAll('.session-input').forEach(input => {
                input.classList.add('hidden');
                input.value = '';
            });

            // Check and unhide activities that are attached
            if (packageData.activities && packageData.activities.length > 0) {
                packageData.activities.forEach(activity => {
                    const checkbox = document.querySelector(`input[name="activity_ids[]"][value="${activity.id}"]`);
                    const sessionInput = document.querySelector(`input[name="sessions[${activity.id}]"]`);

                    if (checkbox) {
                        checkbox.checked = true;
                    }
                    if (sessionInput) {
                        sessionInput.classList.remove('hidden');
                        sessionInput.value = activity.pivot.included_sessions;
                    }
                });
            }

            document.getElementById('form-method').value = 'PUT';
            document.getElementById('package-form').action = '{{ route("admin.packages.update", ":id") }}'.replace(':id', packageData.id);
            document.getElementById('package-panel').classList.remove('hidden');
        }

        function closePanel() {
            document.getElementById('package-panel').classList.add('hidden');
        }

        function toggleSessionInput(checkbox) {
            const activityId = checkbox.value;
            const sessionInput = document.querySelector(`input[name="sessions[${activityId}]"]`);

            if (checkbox.checked) {
                sessionInput.classList.remove('hidden');
                sessionInput.focus();
            } else {
                sessionInput.classList.add('hidden');
                sessionInput.value = '';
            }
        }

        function validateSessionInput(input) {
            if (input.value === '' || input.value === '0') {
                input.value = '1';
            }
        }

        // Close panel when pressing Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !document.getElementById('package-panel').classList.contains('hidden')) {
                closePanel();
            }
        });
    </script>
@endsection
