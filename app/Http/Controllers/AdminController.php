<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Court;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalBookings = Booking::count();

        $totalCourts = Court::count();

        $totalUsers = User::count();

        $totalRevenue = Booking::where(
            'status',
            'approved'
        )->sum('total_price');

        $recentBookings = Booking::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalBookings',
            'totalCourts',
            'totalUsers',
            'totalRevenue',
            'recentBookings'
        ));
    }
}