<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomBooking;

class CalendarController extends Controller
{
    // Menampilkan halaman kalender
    public function index()
    {
        return view('calendar.index'); // pastikan file resources/views/calendar/index.blade.php ada
    }

    // Mengembalikan data booking dalam format event untuk FullCalendar
    public function events()
    {
        $bookings = RoomBooking::with('room')->get();

        $events = $bookings->map(function ($booking) {
            return [
                'title' => $booking->room->name . ' - ' . ucfirst($booking->status),
                'start' => $booking->date,
                'allDay' => true,
            ];
        });

        return response()->json($events);
    }
}
