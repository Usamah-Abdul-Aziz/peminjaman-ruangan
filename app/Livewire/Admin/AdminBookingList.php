<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\RoomBooking;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

#[Title('Admin Booking List')]

class AdminBookingList extends Component
{
    use WithPagination;

    // Add this protected property
    protected $paginationTheme = 'tailwind';

    public $perPage = 10;
    public $search = '';
    public $status = '';
    public $startDate = '';
    public $endDate = '';
    
    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
        'startDate' => ['except' => ''],
        'endDate' => ['except' => ''],
        'perPage' => ['except' => 10]
    ];

    protected $listeners = ['booking-updated' => '$refresh'];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedDate()
    {
        $this->resetPage();
    }

    public function cancel($id)
    {
        $booking = RoomBooking::findOrFail($id);
        $booking->status = 'cancelled';
        $booking->save();

        Toaster::success('Booking berhasil dibatalkan.');
    }

    public function resetFilters()
    {
        $this->reset(['search', 'status', 'startDate', 'endDate']);
        $this->resetPage();
    }

    public function render()
    {
        $query = RoomBooking::with(['user', 'room']);
        
        if ($this->search) {
            $query->whereHas('user', function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->status) {
            $query->where('status', $this->status);
        }

        if ($this->startDate) {
            $query->whereDate('date', '>=', $this->startDate);
        }

        if ($this->endDate) {
            $query->whereDate('date', '<=', $this->endDate);
        }

        return view('livewire.admin.admin-booking-list', [
            'pendingBookings' => $query->latest()->paginate($this->perPage)
        ]);
    }
}