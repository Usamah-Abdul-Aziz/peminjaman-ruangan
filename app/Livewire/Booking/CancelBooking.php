<?php

namespace App\Livewire\Booking;

use App\Models\RoomBooking;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class CancelBooking extends ModalComponent
{
    public RoomBooking $booking;

    public function mount(RoomBooking $booking)
    {
        $this->booking = $booking;
    }

    public function cancel()
    {
        $this->booking->status = 'cancelled';
        $this->booking->save();

        $this->dispatch('booking-updated');
        $this->closeModal();
        Toaster::success('Booking has been cancelled successfully.');
    }

    public function render()
    {
        return view('livewire.booking.cancel-booking');
    }
}