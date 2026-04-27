@extends('layouts.admin')

@section('title', 'Coaches - Admin Dashboard')

@section('content')
    <!-- Page Header -->
    <div class="flex flex-col gap-1 mb-8">
        <p class="text-sky-600 font-medium text-sm tracking-wide">Team</p>
        <h2 class="text-3xl font-black text-on-surface tracking-tight">Coaches</h2>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="bg-emerald-50 border border-emerald-300 rounded-lg p-4 text-emerald-700 text-sm font-medium mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Coaches Table -->
    <div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm">
        <div class="p-6 flex justify-between items-center bg-surface-container-low/50 border-b border-surface-container-high">
            <h3 class="font-bold text-lg">Coaches</h3>
            <button onclick="openAddCoach()" class="flex items-center gap-2 py-2 px-5 bg-primary-container text-white rounded-full font-bold text-sm hover:bg-primary transition-all">
                <span class="material-symbols-outlined text-lg">add</span>
                Add New Coach
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-surface-container-low text-slate-500 uppercase text-[0.65rem] font-bold tracking-widest">
                        <th class="px-8 py-4">Name</th>
                        <th class="px-8 py-4">Specialty</th>
                        <th class="px-8 py-4">Years Experience</th>
                        <th class="px-8 py-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-container-low">
                    @forelse ($coaches as $coach)
                        <tr class="group hover:bg-surface-container-low/30 transition-colors">
                            <td class="px-8 py-5">
                                <p class="font-semibold text-slate-900">{{ $coach->name }}</p>
                            </td>
                            <td class="px-8 py-5 font-medium text-slate-900">{{ $coach->specialty }}</td>
                            <td class="px-8 py-5">
                                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-sky-50 text-sky-600 border border-sky-100">
                                    {{ $coach->years_experience }} Years
                                </span>
                            </td>
                            <td class="px-8 py-5 text-right">
                                <div class="flex justify-end gap-2">
                                    <button onclick='openEditCoach(@json($coach))' class="p-2 text-slate-400 hover:text-sky-600 hover:bg-sky-50 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined">edit</span>
                                    </button>
                                    <form action="{{ route('admin.coaches.destroy', $coach->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this coach?');">
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
                            <td colspan="4" class="px-8 py-5 text-center text-slate-400">No coaches found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Right-Side Panel (Slide-out Form) -->
    <div id="coach-panel" class="hidden fixed right-0 top-0 h-full w-96 bg-white shadow-xl z-50 flex flex-col border-l border-surface-container-high overflow-y-auto">
        <!-- Panel Header -->
        <div class="p-6 bg-primary-container text-white border-b border-primary">
            <div class="flex justify-between items-center">
                <h3 id="panel-title" class="font-bold text-xl">Add Coach</h3>
                <button onclick="closePanel()" class="text-white hover:rotate-90 transition-transform">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
        </div>

        <!-- Panel Form -->
        <form id="coach-form" method="POST" data-store-route="{{ route('admin.coaches.store') }}" data-update-route="{{ route('admin.coaches.update', ':id') }}" class="flex-1 p-6 space-y-5 flex flex-col">
            @csrf
            <input type="hidden" id="form-method" name="_method" value="POST">

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Coach Name</label>
                <input id="coach-name" type="text" name="name" placeholder="e.g., John Doe" class="w-full bg-surface-container-low border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary-container" required>
                <p class="text-xs text-slate-400 mt-1">Full name of the coach</p>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Specialty</label>
                <input id="coach-specialty" type="text" name="specialty" placeholder="e.g., Yoga, Surfing, Skateboarding" class="w-full bg-surface-container-low border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary-container" required>
                <p class="text-xs text-slate-400 mt-1">Area of expertise</p>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Years Experience</label>
                <input id="coach-years" type="number" name="years_experience" min="0" class="w-full bg-surface-container-low border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary-container" required>
                <p class="text-xs text-slate-400 mt-1">Years in the field</p>
            </div>

            <!-- Form Actions -->
            <div class="pt-4 space-y-3 mt-auto">
                <button type="submit" class="w-full py-3 bg-primary-container text-white rounded-full font-bold shadow-lg shadow-sky-200 hover:bg-primary transition-all">
                    Save Coach
                </button>
                <button type="button" onclick="closePanel()" class="w-full py-3 border-2 border-surface-container text-slate-500 rounded-full font-bold hover:bg-surface-container transition-all text-sm">
                    Cancel
                </button>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/admin/coach.js') }}"></script>
@endsection
