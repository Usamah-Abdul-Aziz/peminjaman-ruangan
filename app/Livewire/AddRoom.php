<?php

namespace App\Livewire;

use App\Models\Room;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class AddRoom extends ModalComponent
{
    public $name;
    public $description;
    public $capacity;
    public $facilities;
    public $building;

    public function save()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'capacity' => 'required|integer|min:1',
            'facilities' => 'required|string',
            'building' => 'required|string|max:255',
        ]);

        Room::create($validated);

        // Emit event for table refresh
        Toaster::success('Room created successfully!');
        $this->dispatch('room-updated');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.add-room');
    }
}