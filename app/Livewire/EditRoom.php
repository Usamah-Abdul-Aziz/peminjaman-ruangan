<?php

namespace App\Livewire;

use App\Models\Room;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class EditRoom extends ModalComponent
{
    public Room $room;
    
    // Add form properties
    public $name;
    public $description;
    public $capacity;
    public $facilities;
    public $building;

    public function mount(Room $room)
    {
        $this->room = $room;
        
        // Set initial form values
        $this->name = $room->name;
        $this->description = $room->description;
        $this->capacity = $room->capacity;
        $this->facilities = $room->facilities;
        $this->building = $room->building;
    }

    public function save()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'capacity' => 'required|integer|min:1',
            'facilities' => 'required|string',
            'building' => 'required|string|max:255',
        ]);

        $this->room->update($validated);

        // Emit event for table refresh
        Toaster::success('Room created successfully!');
        $this->dispatch('room-updated');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.edit-room');
    }
}