<?php

namespace App\Http\Controllers;

use App\Models\RoomBooking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index()
    {
        $pendingBookings = RoomBooking::with(['user', 'room'])->where('status', 'pending')->get();
        return view('admin.bookings.index', compact('pendingBookings'));
    }

    public function approve($id)
    {
        $booking = RoomBooking::findOrFail($id);
        $booking->status = 'approved';
        $booking->save();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking disetujui.');
    }

    public function reject($id)
    {
        $booking = RoomBooking::findOrFail($id);
        $booking->status = 'rejected';
        $booking->save();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking ditolak.');
    }

    public function cancel($id)
    {
        $booking = RoomBooking::findOrFail($id);
        $booking->status = 'cancelled';
        $booking->save();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking dibatalkan.');
    }

}
