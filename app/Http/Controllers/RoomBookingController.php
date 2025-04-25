<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomBooking;
use Illuminate\Support\Facades\Auth;

class RoomBookingController extends Controller
{
    public function create()
    {
        $rooms = Room::all();
        return view('bookings.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'date' => 'required|date|after_or_equal:today',
        ]);

        $exists = RoomBooking::where('room_id', $request->room_id)
            ->where('date', $request->date)
            ->whereIn('status', ['pending', 'accepted'])
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Ruangan sudah dibooking pada tanggal tersebut.');
        }

        RoomBooking::create([
            'user_id' => Auth::id(),
            'room_id' => $request->room_id,
            'date' => $request->date,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'status' => 'pending'
        ]);

        return redirect()->route('dashboard')->with('success', 'Pengajuan berhasil dikirim!');
    }
}
