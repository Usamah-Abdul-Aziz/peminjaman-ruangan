<?php

namespace App\Livewire\Admin\BookingList;

use App\Models\RoomBooking;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class RejectBooking extends ModalComponent
{
    public RoomBooking $booking;

    public function mount(RoomBooking $booking)
    {
        $this->booking = $booking;
    }

    public function reject()
    {
        $this->booking->status = 'rejected';
        $this->booking->save();

        $this->dispatch('booking-updated');
        $this->closeModal();
        Toaster::success('Booking rejected successfully!');
    }

    public function render()
    {
        return view('livewire.admin.booking-list.reject-booking');
    }
}