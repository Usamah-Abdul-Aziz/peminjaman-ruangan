<?php

namespace App\Livewire\Booking;

use App\Models\RoomBooking;
use LivewireUI\Modal\ModalComponent;

class BookingDetails extends ModalComponent
{
    public RoomBooking $booking;

    public function mount(RoomBooking $booking)
    {
        $this->booking = $booking;
    }

    public function render()
    {
        return view('livewire.booking.booking-details');
    }
}