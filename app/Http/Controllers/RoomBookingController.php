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
        $buildings = Room::select('building')->distinct()->pluck('building');
        $rooms = Room::all();
        return view('bookings.create', compact('rooms', 'buildings'));
    }

    // Tambah di RoomBookingController.php
    public function getRoomDetails($id)
    {
        $room = \App\Models\Room::findOrFail($id);
        return response()->json([
            'description' => $room->description,
            'capacity' => $room->capacity,
            'facilities' => $room->facilities,
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'date' => 'required|date|after_or_equal:today',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
        ]);

        // Cek konflik booking
        $exists = RoomBooking::where('room_id', $request->room_id)
            ->where('date', $request->date)
            ->whereIn('status', ['pending', 'accepted'])
            ->where(function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('waktu_mulai', '<', $request->waktu_selesai)
                      ->where('waktu_selesai', '>', $request->waktu_mulai);
                });
            })
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Ruangan sudah dibooking pada waktu tersebut.');
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
