<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Models\RoomBooking;
use Illuminate\Support\Facades\Auth;
use Masmerise\Toaster\Toaster;

#[Title('My Bookings')]

class MyBookings extends Component
{
    use WithPagination;

    public $perPage = 5;
    public $search = '';
    public $filter = 'all'; // all, pending, approved, rejected, cancelled

    protected $listeners = ['booking-updated' => '$refresh'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $bookings = RoomBooking::with(['room'])
            ->where('user_id', Auth::id())
            ->when($this->search, function($query) {
                $query->whereHas('room', function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->filter !== 'all', function($query) {
                $query->where('status', $this->filter);
            })
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.my-bookings', [
            'bookings' => $bookings
        ]);
    }
}