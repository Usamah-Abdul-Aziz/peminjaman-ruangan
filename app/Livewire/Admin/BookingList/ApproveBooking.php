<?php

namespace App\Livewire\Admin\BookingList;

use App\Models\RoomBooking;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class ApproveBooking extends ModalComponent
{
    public RoomBooking $booking;

    public function mount(RoomBooking $booking)
    {
        $this->booking = $booking;
    }

    public function approve()
    {
        $this->booking->status = 'approved';
        $this->booking->save();

        $this->dispatch('booking-updated');
        $this->closeModal();
        Toaster::success('Booking approved successfully!');
    }

    public function render()
    {
        return view('livewire.admin.booking-list.approve-booking');
    }
}
