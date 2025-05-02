<?php

namespace App\Livewire;

use App\Models\RoomBooking;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Calendar')]
class Calendar extends Component
{
    public $events = [];

    public function mount()
    {
        $this->loadEvents();
    }

    public function loadEvents()
    {
        $bookings = RoomBooking::with(['room', 'user'])
            ->whereIn('status', ['pending', 'approved'])
            ->get();

        $this->events = $bookings->map(function ($booking) {
            // Fix: Update regex pattern to match "7a " at the start of room name
            $roomName = str_replace('7a ', '', $booking->room->name);
            
            return [
                'id' => $booking->id,
                'title' => $roomName,  // Just show room name without status
                'start' => $booking->date,
                'backgroundColor' => $booking->status === 'pending' ? '#F59E0B' : '#10B981',
                'borderColor' => $booking->status === 'pending' ? '#F59E0B' : '#10B981',
                'textColor' => '#FFFFFF',
                'display' => 'block',
                'extendedProps' => [
                    'status' => ucfirst($booking->status),
                    'user' => $booking->user->name,
                    'time' => $booking->waktu_mulai . ' - ' . $booking->waktu_selesai
                ]
            ];
        })->toArray();
    }

    public function render()
    {
        return view('livewire.calendar');
    }
}