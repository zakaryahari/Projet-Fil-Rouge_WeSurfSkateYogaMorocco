<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class CustomerReviewController extends Controller
{
    public function getUnreviewedBooking()
    {
        if (!auth()->check()) {
            return null;
        }

        return auth()->user()
            ->bookings()
            ->where('status', 'finished')
            ->doesntHave('review')
            ->with('package')
            ->first();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'package_id' => 'required|exists:packages,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'booking_id' => $validated['booking_id'],
            'package_id' => $validated['package_id'],
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
        ]);

        return redirect()->back()->with('success', 'Thank you for your review!');
    }
}
