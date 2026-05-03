<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $reviewController = new CustomerReviewController();
    return view('home', [
        'packages' => \App\Models\Package::all(),
        'rooms' => \App\Models\Room::all(),
        'activities' => \App\Models\Activity::all(),
        'unreviewedBooking' => $reviewController->getUnreviewedBooking(),
    ]);
})->name('home');

// Route::get('/',[\App\Http\Controllers\testquery::class, 'index']);


Route::get('/packages', function () {
    return view('pages.packages', [
        'packages' => \App\Models\Package::all(),
    ]);
})->name('packages.index');

Route::get('/packages/{id}', [\App\Http\Controllers\PublicPackageController::class, 'show'])->name('packages.show');

Route::middleware(['auth', 'prevent_admin_access', 'prevent_banned_access'])->group(function () {
    
    Route::get('/my-bookings', [\App\Http\Controllers\CustomerBookingController::class, 'index'])->name('customer.bookings.index');

    
    Route::post('/reviews', [\App\Http\Controllers\CustomerReviewController::class, 'store'])
        ->name('customer.reviews.store');

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
        ->name('bookings.store');

    Route::get('/booking/{booking}/payment', [\App\Http\Controllers\BookingController::class, 'payment'])->name('payment.show');

    Route::post('/booking/{booking}/payment/process', [\App\Http\Controllers\BookingController::class, 'processPayment'])->name('bookings.payment.process');

    Route::get('/booking/{booking}/success', [\App\Http\Controllers\BookingController::class, 'success'])->name('bookings.success');

    Route::get('/booking/{booking}/stripe/success', [\App\Http\Controllers\BookingController::class, 'stripeSuccess'])->name('bookings.stripe.success');

    Route::get('/booking/{booking}/stripe/cancel', [\App\Http\Controllers\BookingController::class, 'stripeCancel'])->name('bookings.stripe.cancel');
});


Route::get('/events', function () {
    return view('pages.events', [
        'events' => \App\Models\Event::orderBy('event_date')->get(),
    ]);
})->name('events');
Route::view('/about', 'pages.about')->name('about');
Route::get('/accommodation', function () {
    return view('pages.accommodation', [
        'rooms' => \App\Models\Room::where('is_active', true)->get(),
    ]);
})->name('accommodation');
Route::view('/contact', 'pages.contact')->name('contact');

Route::middleware(['auth', 'prevent_admin_access'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/users/{user}/toggle-ban', [AdminController::class, 'toggleBan'])->name('users.toggle_ban');

    Route::resource('rooms', \App\Http\Controllers\Admin\RoomController::class);
    Route::resource('packages', \App\Http\Controllers\Admin\PackageController::class);
    Route::resource('coaches', \App\Http\Controllers\Admin\CoachController::class);
    Route::resource('activities', \App\Http\Controllers\Admin\ActivityController::class);
    Route::resource('events', \App\Http\Controllers\Admin\AdminEventController::class);
    Route::resource('bookings', \App\Http\Controllers\Admin\AdminBookingController::class);
    Route::resource('reviews', \App\Http\Controllers\Admin\AdminReviewController::class);
    Route::patch('/bookings/{booking}/status', [\App\Http\Controllers\Admin\AdminBookingController::class, 'updateStatus'])->name('bookings.updateStatus');
});



require __DIR__.'/auth.php';
