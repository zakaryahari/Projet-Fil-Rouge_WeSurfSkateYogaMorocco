<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ReviewModal extends Component
{
    public function render()
    {
        $unreviewedBooking = auth()->check()
            ? auth()->user()->bookings()
                ->where('status', 'finished')
                ->doesntHave('review')
                ->with('package')
                ->first()
            : null;

        // DEBUG - Check what we're finding
        \Log::info('ReviewModal Component Check', [
            'user_authenticated' => auth()->check(),
            'user_id' => auth()->id(),
            'user_name' => auth()->user()?->name,
            'unreviewed_booking_id' => $unreviewedBooking?->id,
            'unreviewed_booking_status' => $unreviewedBooking?->status,
            'package_name' => $unreviewedBooking?->package?->name,
        ]);

        return view('components.review-modal', [
            'unreviewedBooking' => $unreviewedBooking,
        ]);
    }
}
