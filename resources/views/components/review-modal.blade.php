@php
    $unreviewedBooking = auth()->check() ? auth()->user()->bookings()->where('status', 'finished')->doesntHave('review')->with('package')->first() : null;
@endphp

@if($unreviewedBooking)
    <!-- Review Modal Overlay -->
    <div id="review-modal-overlay" class="fixed inset-0 z-50 bg-gray-900 bg-opacity-50 flex items-center justify-center opacity-100 transition-opacity duration-300" style="display: none;">
        <!-- Modal Container -->
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 transform transition-transform duration-300 scale-100" id="review-modal-content">
            <!-- Modal Header -->
            <div class="px-8 py-6 border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-900">
                    How was your experience?
                </h2>
                <p class="text-sm text-gray-600 mt-2">
                    with {{ $unreviewedBooking->package->name }}
                </p>
                <p class="text-xs text-gray-500 mt-1">
                    Booking #{{ $unreviewedBooking->id }}
                </p>
            </div>

            <!-- Modal Body -->
            <div class="px-8 py-6">
                <form id="review-form" method="POST" action="{{ route('customer.reviews.store') }}">
                    @csrf

                    <!-- Hidden Inputs -->
                    <input type="hidden" name="booking_id" value="{{ $unreviewedBooking->id }}">
                    <input type="hidden" name="package_id" value="{{ $unreviewedBooking->package_id }}">
                    <input type="hidden" name="rating" id="rating-value" required>

                    <!-- Star Rating -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-900 mb-3">
                            Your Rating
                        </label>
                        <div class="flex gap-2" id="star-container">
                            <button type="button" class="star-btn text-4xl transition-all duration-200" data-value="1">
                                <svg class="w-8 h-8 text-gray-300 hover:text-yellow-400 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </button>
                            <button type="button" class="star-btn text-4xl transition-all duration-200" data-value="2">
                                <svg class="w-8 h-8 text-gray-300 hover:text-yellow-400 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </button>
                            <button type="button" class="star-btn text-4xl transition-all duration-200" data-value="3">
                                <svg class="w-8 h-8 text-gray-300 hover:text-yellow-400 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </button>
                            <button type="button" class="star-btn text-4xl transition-all duration-200" data-value="4">
                                <svg class="w-8 h-8 text-gray-300 hover:text-yellow-400 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </button>
                            <button type="button" class="star-btn text-4xl transition-all duration-200" data-value="5">
                                <svg class="w-8 h-8 text-gray-300 hover:text-yellow-400 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Comment Textarea -->
                    <div class="mb-6">
                        <label for="comment" class="block text-sm font-semibold text-gray-900 mb-2">
                            Your Feedback (Optional)
                        </label>
                        <textarea
                            id="comment"
                            name="comment"
                            rows="4"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent resize-none"
                            placeholder="Tell us what you loved (or what we could improve)..."
                        ></textarea>
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-3">
                        <button
                            type="submit"
                            class="flex-1 px-4 py-3 bg-primary text-white font-semibold rounded-lg hover:bg-opacity-90 transition-all duration-200 transform hover:scale-105"
                        >
                            Submit Review
                        </button>
                        <button
                            type="button"
                            id="remind-later-btn"
                            class="flex-1 px-4 py-3 bg-gray-200 text-gray-900 font-semibold rounded-lg hover:bg-gray-300 transition-all duration-200"
                        >
                            Remind Me Later
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modalOverlay = document.getElementById('review-modal-overlay');
            const remindLaterBtn = document.getElementById('remind-later-btn');
            const starBtns = document.querySelectorAll('.star-btn');
            const ratingInput = document.getElementById('rating-value');
            let selectedRating = null;

            // Show modal on page load
            modalOverlay.style.display = 'flex';

            // Star rating functionality
            starBtns.forEach(btn => {
                btn.addEventListener('mouseover', function() {
                    const hoverValue = parseInt(this.dataset.value);
                    starBtns.forEach((b, index) => {
                        if (index < hoverValue) {
                            b.querySelector('svg').classList.remove('text-gray-300');
                            b.querySelector('svg').classList.add('text-yellow-400');
                        } else {
                            b.querySelector('svg').classList.remove('text-yellow-400');
                            if (selectedRating === null || index >= selectedRating) {
                                b.querySelector('svg').classList.add('text-gray-300');
                            }
                        }
                    });
                });

                btn.addEventListener('mouseout', function() {
                    if (selectedRating === null) {
                        starBtns.forEach(b => {
                            b.querySelector('svg').classList.remove('text-yellow-400');
                            b.querySelector('svg').classList.add('text-gray-300');
                        });
                    } else {
                        starBtns.forEach((b, index) => {
                            if (index < selectedRating) {
                                b.querySelector('svg').classList.remove('text-gray-300');
                                b.querySelector('svg').classList.add('text-yellow-400');
                            }
                        });
                    }
                });

                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    selectedRating = parseInt(this.dataset.value);
                    ratingInput.value = selectedRating;

                    starBtns.forEach((b, index) => {
                        if (index < selectedRating) {
                            b.querySelector('svg').classList.remove('text-gray-300');
                            b.querySelector('svg').classList.add('text-yellow-400');
                        } else {
                            b.querySelector('svg').classList.remove('text-yellow-400');
                            b.querySelector('svg').classList.add('text-gray-300');
                        }
                    });
                });
            });

            // Remind Me Later button
            remindLaterBtn.addEventListener('click', function() {
                modalOverlay.style.opacity = '0';
                modalOverlay.style.transition = 'opacity 0.3s ease-out';
                setTimeout(() => {
                    modalOverlay.style.display = 'none';
                }, 300);
            });

            // Close modal on background click
            modalOverlay.addEventListener('click', function(e) {
                if (e.target === modalOverlay) {
                    modalOverlay.style.opacity = '0';
                    modalOverlay.style.transition = 'opacity 0.3s ease-out';
                    setTimeout(() => {
                        modalOverlay.style.display = 'none';
                    }, 300);
                }
            });
        });
    </script>
@endif
