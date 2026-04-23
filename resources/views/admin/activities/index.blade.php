@extends('layouts.admin')

@section('title', 'Activities - Admin Dashboard')

@section('content')
    <!-- Page Header -->
    <div class="flex flex-col gap-1 mb-8">
        <p class="text-sky-600 font-medium text-sm tracking-wide">Offerings</p>
        <h2 class="text-3xl font-black text-on-surface tracking-tight">Activities</h2>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="bg-emerald-50 border border-emerald-300 rounded-lg p-4 text-emerald-700 text-sm font-medium mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Activities Table -->
    <div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm">
        <div class="p-6 flex justify-between items-center bg-surface-container-low/50 border-b border-surface-container-high">
            <h3 class="font-bold text-lg">Activities</h3>
            <button onclick="openAddActivity()" class="flex items-center gap-2 py-2 px-5 bg-primary-container text-white rounded-full font-bold text-sm hover:bg-primary transition-all">
                <span class="material-symbols-outlined text-lg">add</span>
                Add New Activity
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-surface-container-low text-slate-500 uppercase text-[0.65rem] font-bold tracking-widest">
                        <th class="px-8 py-4">Name</th>
                        <th class="px-8 py-4">Duration (Minutes)</th>
                        <th class="px-8 py-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-container-low">
                    @forelse ($activities as $activity)
                        <tr class="group hover:bg-surface-container-low/30 transition-colors">
                            <td class="px-8 py-5">
                                <p class="font-semibold text-slate-900">{{ $activity->name }}</p>
                            </td>
                            <td class="px-8 py-5">
                                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-sky-50 text-sky-600 border border-sky-100">
                                    {{ $activity->duration_minutes }} min
                                </span>
                            </td>
                            <td class="px-8 py-5 text-right">
                                <div class="flex justify-end gap-2">
                                    <button onclick='openEditActivity(@json($activity))' class="p-2 text-slate-400 hover:text-sky-600 hover:bg-sky-50 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined">edit</span>
                                    </button>
                                    <form action="{{ route('admin.activities.destroy', $activity->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this activity?');">
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
                            <td colspan="3" class="px-8 py-5 text-center text-slate-400">No activities found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Right-Side Panel (Slide-out Form) -->
    <div id="activity-panel" class="hidden fixed right-0 top-0 h-full w-96 bg-white shadow-xl z-50 flex flex-col border-l border-surface-container-high overflow-y-auto">
        <!-- Panel Header -->
        <div class="p-6 bg-primary-container text-white border-b border-primary">
            <div class="flex justify-between items-center">
                <h3 id="panel-title" class="font-bold text-xl">Add Activity</h3>
                <button onclick="closePanel()" class="text-white hover:rotate-90 transition-transform">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
        </div>

        <!-- Panel Form -->
        <form id="activity-form" method="POST" class="flex-1 p-6 space-y-5 flex flex-col">
            @csrf
            <input type="hidden" id="form-method" name="_method" value="POST">

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Activity Name</label>
                <input id="activity-name" type="text" name="name" placeholder="e.g., Surfing Lesson, Yoga Class" class="w-full bg-surface-container-low border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary-container" required>
                <p class="text-xs text-slate-400 mt-1">Name of the activity</p>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Duration (Minutes)</label>
                <input id="activity-duration" type="number" name="duration_minutes" min="1" placeholder="60" class="w-full bg-surface-container-low border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary-container" required>
                <p class="text-xs text-slate-400 mt-1">Duration in minutes</p>
            </div>

            <!-- Form Actions -->
            <div class="pt-4 space-y-3 mt-auto">
                <button type="submit" class="w-full py-3 bg-primary-container text-white rounded-full font-bold shadow-lg shadow-sky-200 hover:bg-primary transition-all">
                    Save Activity
                </button>
                <button type="button" onclick="closePanel()" class="w-full py-3 border-2 border-surface-container text-slate-500 rounded-full font-bold hover:bg-surface-container transition-all text-sm">
                    Cancel
                </button>
            </div>
        </form>
    </div>

    <script>
        function openAddActivity() {
            document.getElementById('panel-title').textContent = 'Add Activity';
            document.getElementById('activity-form').reset();
            document.getElementById('form-method').value = 'POST';
            document.getElementById('activity-form').action = '{{ route("admin.activities.store") }}';
            document.getElementById('activity-panel').classList.remove('hidden');
        }

        function openEditActivity(activityData) {
            document.getElementById('panel-title').textContent = 'Edit Activity';
            document.getElementById('activity-name').value = activityData.name;
            document.getElementById('activity-duration').value = activityData.duration_minutes;

            document.getElementById('form-method').value = 'PUT';
            document.getElementById('activity-form').action = '{{ route("admin.activities.update", ":id") }}'.replace(':id', activityData.id);
            document.getElementById('activity-panel').classList.remove('hidden');
        }

        function closePanel() {
            document.getElementById('activity-panel').classList.add('hidden');
        }
    </script>
@endsection
