@extends('layouts.admin')

@section('title', 'User Reviews - Admin Dashboard')

@section('content')
    <!-- Header Section -->
    <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <span class="text-primary font-bold text-sm tracking-widest uppercase mb-2 block">Moderation Hub</span>
            <h1 class="text-4xl font-black text-on-surface tracking-tight">User Reviews</h1>
            <p class="text-on-surface-variant mt-2 max-w-lg">Manage customer feedback, verify authenticity, and maintain quality standards for all reviews.</p>
        </div>
        <!-- <div class="flex gap-3">
            <button class="px-6 py-3 rounded-full bg-surface-container-lowest text-primary font-semibold text-sm border border-outline-variant/20 hover:bg-surface-container-low transition-all">
                Export Reviews
            </button>
            <button class="px-6 py-3 rounded-full bg-primary-container text-on-primary-container font-bold text-sm shadow-lg shadow-sky-200 hover:brightness-110 transition-all">
                Bulk Moderate
            </button>
        </div> -->
    </div>

    <!-- Stats Overview Cards -->
    @if ($reviews->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-surface-container-lowest p-6 rounded-xl shadow-sm border-b-4 border-sky-400">
                <p class="text-xs font-bold text-outline uppercase tracking-wider">Total Reviews</p>
                <h3 class="text-3xl font-black mt-2">{{ $reviews->total() }}</h3>
                <p class="text-xs text-on-surface-variant mt-1">Customer feedback collected</p>
            </div>
            <div class="bg-surface-container-lowest p-6 rounded-xl shadow-sm border-b-4 border-yellow-400">
                <p class="text-xs font-bold text-outline uppercase tracking-wider">Average Rating</p>
                <h3 class="text-3xl font-black mt-2">
                    {{ number_format($reviews->avg('rating') ?? 0, 1) }}<span class="text-lg text-yellow-400">/5</span>
                </h3>
                <p class="text-xs text-on-surface-variant mt-1">Overall satisfaction</p>
            </div>
            <div class="bg-surface-container-lowest p-6 rounded-xl shadow-sm border-b-4 border-green-500">
                <p class="text-xs font-bold text-outline uppercase tracking-wider">High Ratings</p>
                <h3 class="text-3xl font-black mt-2">{{ $reviews->where('rating', '>=', 4)->count() }}</h3>
                <p class="text-xs text-on-surface-variant mt-1">4 & 5 star reviews</p>
            </div>
        </div>
    @endif

    <!-- Success Message -->
    @if (session('success'))
        <div class="bg-emerald-50 border border-emerald-300 rounded-lg p-4 text-emerald-700 text-sm font-medium mb-6 flex items-center gap-3">
            <span class="material-symbols-outlined text-green-600">check_circle</span>
            {{ session('success') }}
        </div>
    @endif

    <!-- Reviews Grid Section -->
    <div class="mb-12">
        @if ($reviews->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($reviews as $review)
                    <div class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-200 border border-surface-container-high/50 flex flex-col">
                        <!-- Card Header with User Info -->
                        <div class="px-6 pt-6 pb-4 border-b border-surface-container-low/50">
                            <div class="flex items-center justify-between gap-4">
                                <div class="flex items-center gap-3 flex-1">
                                    <div class="w-10 h-10 rounded-full bg-primary-fixed flex items-center justify-center shrink-0">
                                        <span class="material-symbols-outlined text-primary text-lg">account_circle</span>
                                    </div>
                                    <div class="min-w-0">
                                        <p class="text-sm font-bold text-on-surface truncate">
                                            {{ $review->user->name ?? 'Unknown User' }}
                                        </p>
                                        <p class="text-xs text-on-surface-variant">
                                            {{ $review->created_at->format('M d, Y') }}
                                        </p>
                                    </div>
                                </div>
                                <!-- Rating Badge -->
                                <div class="flex items-center gap-1 shrink-0">
                                    <span class="text-lg text-yellow-400">★</span>
                                    <span class="text-sm font-black text-on-surface">{{ $review->rating }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Card Content -->
                        <div class="px-6 py-4 flex-1">
                            <!-- Rating Stars Full Display -->
                            <div class="flex items-center gap-1 mb-4">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="text-base {{ $i <= $review->rating ? 'text-yellow-400' : 'text-surface-container-low' }}">★</span>
                                @endfor
                            </div>

                            <!-- Review Comment -->
                            <p class="text-sm text-on-surface leading-relaxed line-clamp-4">{{ $review->comment }}</p>

                            <!-- Package Info Badge -->
                            @if ($review->package)
                                <div class="mt-4 p-3 bg-surface-container-low/50 rounded-lg border border-surface-container-high/30">
                                    <p class="text-xs text-on-surface-variant">
                                        <span class="material-symbols-outlined text-sm align-text-bottom mr-1 inline">package_2</span>
                                        <span class="font-semibold text-on-surface">{{ $review->package->name }}</span>
                                    </p>
                                </div>
                            @endif
                        </div>

                        <!-- Card Footer Actions -->
                        <div class="px-6 py-4 bg-surface-container-lowest/50 border-t border-surface-container-low/50 flex items-center justify-end gap-2">
                            <button class="p-2 hover:bg-surface-container rounded-lg transition-colors text-slate-500 hover:text-sky-600 group" title="View Details">
                                <span class="material-symbols-outlined text-[20px] group-hover:scale-110 transition-transform">visibility</span>
                            </button>
                            <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Are you sure you want to delete this review?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 hover:bg-error/10 rounded-lg transition-colors text-error group" title="Delete Review">
                                    <span class="material-symbols-outlined text-[20px] group-hover:scale-110 transition-transform">delete</span>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8 flex justify-center">
                {{ $reviews->links() }}
            </div>
        @else
            <div class="bg-surface-container-lowest rounded-2xl p-12 text-center shadow-sm border border-surface-container-high/50">
                <span class="material-symbols-outlined text-5xl text-outline mb-4 block opacity-40">feedback</span>
                <p class="text-on-surface-variant font-medium">No reviews yet. Customer feedback will appear here.</p>
            </div>
        @endif
    </div>
@endsection
