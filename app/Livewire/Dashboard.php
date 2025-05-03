<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Room;
use App\Models\RoomBooking;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

#[Title("Dashboard")]
class Dashboard extends Component
{
    public function render()
    {
        $data = [];

        if (Auth::user()->role === 'admin') {
            $data = [
                'totalRooms' => Room::count(),
                'pendingBookings' => RoomBooking::where('status', 'pending')->count(),
                'totalUsers' => User::where('role', 'user')->count()
            ];
        } else {
            $data = [
                'userBookings' => RoomBooking::where('user_id', Auth::id())
                    ->whereIn('status', ['approved', 'pending'])
                    ->count()
            ];
        }

        return view('livewire.dashboard', $data);
    }
}