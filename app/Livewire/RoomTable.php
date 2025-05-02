<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Room;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

#[Title('Manage Rooms')]

class RoomTable extends Component
{
    use WithPagination;

    public $perPage = 5;
    public $search = '';
    public $sortByField = 'name';
    public $sortDirection = 'desc';

    protected $listeners = ['room-updated' => '$refresh'];

    // public function delete(Room $room)
    // {
    //     $room->delete();
    // }

    public function setSortBy($sortByField) {
        if($this->sortByField === $sortByField) {
            $this->sortDirection = ($this->sortDirection == 'asc') ? 'desc' : 'asc';
        } else {
            $this->sortByField = $sortByField;
            $this->sortDirection = 'desc';
        }
    }

    public function render()
    {
        return view('livewire.room-table', [
            'rooms'=> Room::search($this->search)
                ->orderBy($this->sortByField, $this->sortDirection)
                ->paginate($this->perPage),
        ]);
    }
}