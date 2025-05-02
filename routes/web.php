<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\RoomTable;
use App\Livewire\Dashboard;
use App\Livewire\CreateBooking;
use App\Livewire\Admin\AdminBookingList;
use App\Livewire\Calendar;
use App\Livewire\MyBookings;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', Dashboard::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// routes/web.php
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', function () {
        return 'Edit profile page';
    })->name('profile.edit');

    Route::get('/booking', CreateBooking::class)->name('booking.create');

    Route::get('/calendar', Calendar::class)->name('calendar.index');

    Route::get('/mybookings', MyBookings::class)->name('mybookings');

    // Admin
    Route::middleware(['is_admin'])->group(function () {
        Route::get('/admin/rooms', RoomTable::class)->name('admin.rooms');
        Route::get('/admin/bookings', AdminBookingList::class)->name('admin.bookings.index');
    });
});

require __DIR__ . '/auth.php';
