<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalCustomers = User::where('role', 'customer')->where('is_banned', false)->count();
        $totalBookings = Booking::count();
        $totalRevenue = Payment::where('status', 'paid')->sum('amount');

        $users = User::where('role', 'customer')->paginate(6);

        return view('admin.dashboard', [
            'totalCustomers' => $totalCustomers,
            'totalBookings' => $totalBookings,
            'totalRevenue' => $totalRevenue,
            'users' => $users,
        ]);
    }

    public function toggleBan(User $user)
    {
        $user->is_banned = !$user->is_banned;
        $user->save();

        return redirect()->back()->with('success', $user->is_banned ? 'User banned successfully.' : 'User unbanned successfully.');
    }
}
