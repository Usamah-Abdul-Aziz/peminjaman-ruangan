<?php

namespace App\Livewire;

use App\Models\Room;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class DeleteRoom extends ModalComponent
{
    public Room $room;

    public function mount(Room $room)
    {
        $this->room = $room;
    }

    public function delete()
    {
        $this->room->delete();

        $this->dispatch('room-updated');
        $this->closeModal();
        Toaster::success('Room deleted successfully!');

        // Redirect ke halaman yang sama
        return redirect()->route('admin.rooms');
    }

    public function render()
    {
        return view('livewire.delete-room');
    }
}