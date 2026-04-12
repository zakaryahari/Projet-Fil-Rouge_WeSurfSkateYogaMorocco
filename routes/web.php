<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'packages' => \App\Models\Package::all(),
        'rooms' => \App\Models\Room::all(),
        'activities' => \App\Models\Activity::all(),
    ]);
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Dashboard Routes - Protected by 'auth' and 'admin' middleware
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard', [
            'totalRevenue' => 124500,
            'revenueGrowth' => 12,
            'occupancyRate' => 85,
            'activeBookings' => 42,
            'bookingsIncrease' => 5,
            'pendingAlerts' => 7,
            'recentBookings' => \App\Models\Booking::with('user')->latest()->limit(4)->get(),
            'seasonalTitle' => 'Upcoming Winter Peak Season',
            'seasonalDescription' => 'Bookings for December are up 30% compared to last year. Prepare extra staff for the Surf & Skate clinics.',
            'quickInsight' => 'Revenue from the Pro-Skate package has reached its monthly goal 10 days early.',
        ]);
    })->name('dashboard');
});

require __DIR__.'/auth.php';
