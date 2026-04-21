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

// Public Package Details Route
Route::get('/packages', function () {
    return view('pages.packages', [
        'packages' => \App\Models\Package::all(),
    ]);
})->name('packages.index');

Route::get('/packages/{id}', [\App\Http\Controllers\PublicPackageController::class, 'show'])->name('packages.show');

// Public Booking Routes
Route::get('/bookings/packages', function () {
    return view('bookings.choose_package', [
        'packages' => \App\Models\Package::all(),
    ]);
})->name('bookings.packages');

Route::get('/bookings/{package_id}/create', function ($package_id) {
    $package = \App\Models\Package::findOrFail($package_id);
    return view('bookings.create', [
        'package' => $package,
        'rooms' => \App\Models\Room::all(),
        'events' => \App\Models\Event::all(),
    ]);
})->name('bookings.create');

Route::post('/bookings', [\App\Http\Controllers\BookingController::class, 'store'])
    ->middleware('auth')
    ->name('bookings.store');

Route::middleware('auth')->get('/booking/{booking}/payment', [\App\Http\Controllers\BookingController::class, 'payment'])->name('payment.show');

Route::middleware('auth')->post('/booking/{booking}/payment/process', [\App\Http\Controllers\BookingController::class, 'processPayment'])->name('bookings.payment.process');

Route::middleware('auth')->get('/booking/{booking}/success', [\App\Http\Controllers\BookingController::class, 'success'])->name('bookings.success');

Route::middleware('auth')->get('/booking/{booking}/stripe/success', [\App\Http\Controllers\BookingController::class, 'stripeSuccess'])->name('bookings.stripe.success');

Route::middleware('auth')->get('/booking/{booking}/stripe/cancel', [\App\Http\Controllers\BookingController::class, 'stripeCancel'])->name('bookings.stripe.cancel');

// Public Static Pages Routes
Route::view('/events', 'pages.events')->name('events');
Route::view('/about', 'pages.about')->name('about');
Route::view('/accommodation', 'pages.accommodation')->name('accommodation');
Route::view('/contact', 'pages.contact')->name('contact');

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

    Route::resource('rooms', \App\Http\Controllers\Admin\RoomController::class);
    Route::resource('packages', \App\Http\Controllers\Admin\PackageController::class);
    Route::resource('activities', \App\Http\Controllers\Admin\ActivityController::class);
});



require __DIR__.'/auth.php';
