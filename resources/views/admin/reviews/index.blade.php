@extends('layouts.admin')

@section('title', 'User Reviews - Admin Dashboard')

@section('content')
    <!-- Page Header -->
    <div class="flex flex-col gap-1 mb-8">
        <p class="text-sky-600 font-medium text-sm tracking-wide">Moderation</p>
        <h2 class="text-3xl font-black text-on-surface tracking-tight">User Reviews</h2>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="bg-emerald-50 border border-emerald-300 rounded-lg p-4 text-emerald-700 text-sm font-medium mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Reviews Moderation Section -->
    <div class="mb-12">
        @if ($reviews->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($reviews as $review)
                    <div class="bg-surface-container-lowest rounded-xl shadow-sm border border-surface-container-high p-6 hover:shadow-md transition-shadow">
                        <!-- Header: User name and date -->
                        <div class="flex items-start justify-between mb-4 pb-4 border-b border-surface-container-low">
                            <div>
                                <p class="font-bold text-sm text-on-surface">
                                    {{ $review->user->name ?? 'Unknown User' }}
                                </p>
                                <p class="text-xs text-on-surface-variant">
                                    {{ $review->created_at->format('M d, Y') }}
                                </p>
                            </div>
                        </div>

                        <!-- Rating Stars -->
                        <div class="mb-4">
                            <div class="flex items-center gap-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="text-lg {{ $i <= $review->rating ? 'text-yellow-400' : 'text-surface-container-low' }}">★</span>
                                @endfor
                            </div>
                            <p class="text-xs text-on-surface-variant mt-1">{{ $review->rating }}/5 rating</p>
                        </div>

                        <!-- Comment -->
                        <div class="mb-6">
                            <p class="text-sm text-on-surface leading-relaxed">{{ $review->comment }}</p>
                        </div>

                        <!-- Package info -->
                        @if ($review->package)
                            <p class="text-xs text-on-surface-variant mb-4 p-2 bg-surface-container-low rounded">
                                Package: <span class="font-semibold">{{ $review->package->name }}</span>
                            </p>
                        @endif

                        <!-- Delete Button with Form -->
                        <div class="flex">
                            <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" class="w-full"
                                  onsubmit="return confirm('Are you sure you want to delete this review?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="w-full py-2 px-4 bg-red-600 text-white text-sm font-bold rounded-lg hover:bg-red-700 transition-colors">
                                    Delete Review
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
            <div class="bg-surface-container-lowest rounded-xl p-12 text-center">
                <span class="material-symbols-outlined text-4xl text-outline mb-4 block">review</span>
                <p class="text-on-surface-variant">No reviews yet. Customer feedback will appear here.</p>
            </div>
        @endif
    </div>
@endsection
