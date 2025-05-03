<?php

namespace App\Livewire;

use App\Models\Room;
use App\Models\RoomBooking;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Masmerise\Toaster\Toaster;

class CreateBooking extends Component
{
    public $selectedBuilding = '';
    public $selectedRoom;
    public $date;
    public $waktu_mulai;
    public $waktu_selesai;
    public $roomDetails = null;

    public function mount()
    {
        $this->date = request()->query('date');
    }

    public function updatedSelectedBuilding()
    {
        $this->selectedRoom = null;
        $this->roomDetails = null;
    }

    public function updatedSelectedRoom()
    {
        if ($this->selectedRoom) {
            $room = Room::find($this->selectedRoom);
            $this->roomDetails = [
                'description' => $room->description,
                'capacity' => $room->capacity,
                'facilities' => $room->facilities
            ];
        } else {
            $this->roomDetails = null;
        }
    }

    public function createBooking()
    {
        $validated = $this->validate([
            'selectedRoom' => 'required|exists:rooms,id',
            'date' => 'required|date|after_or_equal:today',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
        ]);

        // Cek konflik booking
        $exists = RoomBooking::where('room_id', $this->selectedRoom)
            ->where('date', $this->date)
            ->whereIn('status', ['pending', 'accepted'])
            ->where(function ($query) {
                $query->where(function ($q) {
                    $q->where('waktu_mulai', '<', $this->waktu_selesai)
                      ->where('waktu_selesai', '>', $this->waktu_mulai);
                });
            })
            ->exists();

        if ($exists) {
            Toaster::error('The room was already booked at that time.');
            return;
        }

        $booking = RoomBooking::create([
            'user_id' => Auth::id(),
            'room_id' => $this->selectedRoom,
            'date' => $this->date,
            'waktu_mulai' => $this->waktu_mulai,
            'waktu_selesai' => $this->waktu_selesai,
            'status' => 'pending'
        ]);

        if($booking) {
            Toaster::success('Booking request has been submitted successfully!');
            return redirect()->route('my-bookings'); // Changed from dashboard to my-bookings
        }
    }

    public function render()
    {
        return view('livewire.create-booking', [
            'buildings' => Room::select('building')->distinct()->pluck('building'),
            'rooms' => Room::when($this->selectedBuilding, function($query) {
                return $query->where('building', $this->selectedBuilding);
            })->get()
        ]);
    }
}