@extends('layouts.admin')

@section('title', 'Events - Admin Dashboard')

@section('content')
    <!-- Page Header -->
    <div class="flex flex-col gap-1 mb-8">
        <p class="text-sky-600 font-medium text-sm tracking-wide">Offerings</p>
        <h2 class="text-3xl font-black text-on-surface tracking-tight">Events</h2>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="bg-emerald-50 border border-emerald-300 rounded-lg p-4 text-emerald-700 text-sm font-medium mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Events Table -->
    <div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm">
        <div class="p-6 flex justify-between items-center bg-surface-container-low/50 border-b border-surface-container-high">
            <h3 class="font-bold text-lg">Events</h3>
            <button onclick="openAddEvent()" class="flex items-center gap-2 py-2 px-5 bg-primary text-white rounded-full font-bold text-sm hover:bg-darkCharcoal transition-all">
                <span class="material-symbols-outlined text-lg">add</span>
                Add New Event
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-surface-container-low text-slate-500 uppercase text-[0.65rem] font-bold tracking-widest">
                        <th class="px-8 py-4">Title</th>
                        <th class="px-8 py-4">Event Date</th>
                        <th class="px-8 py-4">Max Participants</th>
                        <th class="px-8 py-4">Price (€)</th>
                        <th class="px-8 py-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-container-low">
                    @forelse ($events as $event)
                        <tr class="group hover:bg-surface-container-low/30 transition-colors">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-3">
                                    @if ($event->image_path)
                                        <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}" class="w-10 h-10 rounded-lg object-cover">
                                    @else
                                        <div class="w-10 h-10 rounded-lg bg-slate-200 flex items-center justify-center">
                                            <span class="material-symbols-outlined text-slate-400 text-lg">image</span>
                                        </div>
                                    @endif
                                    <p class="font-semibold text-slate-900">{{ $event->title }}</p>
                                </div>
                            </td>
                            <td class="px-8 py-5">
                                <span class="text-slate-700 font-medium">
                                    {{ \Carbon\Carbon::parse($event->event_date)->format('d/m/Y H:i') }}
                                </span>
                            </td>
                            <td class="px-8 py-5">
                                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-purple-50 text-purple-600 border border-purple-100">
                                    {{ $event->max_participants }}
                                </span>
                            </td>
                            <td class="px-8 py-5">
                                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-50 text-emerald-600 border border-emerald-100">
                                    €{{ number_format($event->price, 2) }}
                                </span>
                            </td>
                            <td class="px-8 py-5 text-right">
                                <div class="flex justify-end gap-2">
                                    <button onclick='openEditEvent(@json($event))' class="p-2 text-slate-400 hover:text-sky-600 hover:bg-sky-50 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined">edit</span>
                                    </button>
                                    <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this event?');">
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
                            <td colspan="5" class="px-8 py-5 text-center text-slate-400">No events found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($events->hasPages())
            <div class="px-6 py-4 border-t border-surface-container-high">
                {{ $events->links() }}
            </div>
        @endif
    </div>

    <!-- Right-Side Panel (Slide-out Form) -->
    <div id="event-panel" class="hidden fixed right-0 top-0 h-full w-96 bg-white shadow-xl z-50 flex flex-col border-l border-surface-container-high overflow-y-auto">
        <!-- Panel Header -->
        <div class="p-6 bg-primary text-white border-b border-primary">
            <div class="flex justify-between items-center">
                <h3 id="panel-title" class="font-bold text-xl">Add Event</h3>
                <button onclick="closePanel()" class="text-white hover:rotate-90 transition-transform">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
        </div>

        <!-- Panel Form -->
        <form id="event-form" method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data" data-store-route="{{ route('admin.events.store') }}" data-update-route="{{ route('admin.events.update', ':id') }}" class="flex-1 p-6 space-y-5 flex flex-col">
            @csrf
            <input type="hidden" id="event-form-method" name="_method" value="POST">

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Event Title</label>
                <input id="event-title" type="text" name="title" placeholder="e.g., Surfing Championship, Skateboarding Competition" class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary focus:border-transparent" required>
                <p class="text-xs text-slate-400 mt-1">Name of the event</p>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Description</label>
                <textarea id="event-description" name="description" placeholder="Event details and information..." class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary focus:border-transparent resize-none h-24" required></textarea>
                <p class="text-xs text-slate-400 mt-1">Detailed description of the event</p>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Event Date & Time</label>
                <input id="event-date" type="datetime-local" name="event_date" class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary focus:border-transparent" required>
                <p class="text-xs text-slate-400 mt-1">When will the event happen</p>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Max Participants</label>
                <input id="event-max-participants" type="number" name="max_participants" min="1" max="999" placeholder="50" class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary focus:border-transparent" required>
                <p class="text-xs text-slate-400 mt-1">Maximum number of participants</p>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Price (€)</label>
                <input id="event-price" type="number" name="price" step="0.01" min="0" placeholder="99.99" class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary focus:border-transparent" required>
                <p class="text-xs text-slate-400 mt-1">Price in euros</p>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Event Image</label>
                <input id="event-image" type="file" name="image" accept="image/jpeg,image/png,image/jpg,image/gif" class="w-full bg-slate-50 border border-slate-200 rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary focus:border-transparent">
                <p class="text-xs text-slate-400 mt-1">JPEG, PNG, JPG, GIF (Max 2MB)</p>
            </div>

            <!-- Image Preview -->
            <div id="image-preview-container" class="hidden">
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Current Image</label>
                <div id="image-preview"></div>
            </div>

            <!-- Form Actions -->
            <div class="pt-4 space-y-3 mt-auto">
                <button type="submit" class="w-full py-3 bg-primary text-white rounded-full font-bold shadow-lg shadow-sky-200 hover:bg-darkCharcoal transition-all">
                    Save Event
                </button>
                <button type="button" onclick="closePanel()" class="w-full py-3 border-2 border-slate-300 text-slate-500 rounded-full font-bold hover:bg-slate-50 transition-all text-sm">
                    Cancel
                </button>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/admin/event.js') }}"></script>
@endsection
