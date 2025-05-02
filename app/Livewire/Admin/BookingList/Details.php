<?php

namespace App\Livewire\Admin\BookingList;

use App\Models\RoomBooking;
use LivewireUI\Modal\ModalComponent;

class Details extends ModalComponent
{
    public RoomBooking $booking;

    public function mount(RoomBooking $booking)
    {
        $this->booking = $booking;
    }

    public function render()
    {
        return view('livewire.admin.booking-list.details');
    }
}