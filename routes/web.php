<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomBookingController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\RoomController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// routes/web.php
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/rooms', [RoomController::class, 'index']);
    Route::get('/booking', [RoomBookingController::class, 'create'])->name('booking.create');
    Route::get('/rooms/{id}/details', [RoomBookingController::class, 'getRoomDetails'])->middleware('auth');
    Route::post('/booking', [RoomBookingController::class, 'store'])->name('booking.store');

    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
    Route::get('/calendar/events', [CalendarController::class, 'events'])->name('calendar.events');


    Route::middleware(['is_admin'])->group(function () {
        Route::get('/admin/bookings', [AdminBookingController::class, 'index'])->name('admin.bookings.index');
        Route::post('/admin/bookings/{id}/approve', [AdminBookingController::class, 'approve'])->name('admin.bookings.approve');
        Route::post('/admin/bookings/{id}/reject', [AdminBookingController::class, 'reject'])->name('admin.bookings.reject');
        Route::post('/admin/bookings/{id}/cancel', [AdminBookingController::class, 'cancel'])->name('admin.bookings.cancel');
    });
});

require __DIR__.'/auth.php';
