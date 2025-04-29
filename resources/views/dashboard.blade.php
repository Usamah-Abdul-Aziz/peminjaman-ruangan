@extends('layouts.app')

@section('content')
<div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md">
        <div class="p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Menu</h2>
            <nav class="space-y-4">
                <a href="{{ route('dashboard') }}" class="block text-gray-700 hover:text-blue-600">Dashboard</a>
                <a href="#" class="block text-gray-700 hover:text-blue-600">Profile</a>
                <a href="{{ route('booking.create') }}" class="block text-gray-700 hover:text-blue-600">Room Booking</a>
                <a href="#" class="block text-gray-700 hover:text-blue-600">Settings</a>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 bg-gray-100 p-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Dashboard</h1>

            <p class="text-gray-600 mb-6">
                Welcome back, {{ Auth::user()->name }}! 🎉
            </p>

            <!-- Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-blue-100 p-4 rounded-lg shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold text-blue-800">Bookings</h3>
                    <p class="text-blue-600 mt-2">Lihat semua peminjaman ruangan.</p>
                </div>

                <div class="bg-green-100 p-4 rounded-lg shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold text-green-800">Profile</h3>
                    <p class="text-green-600 mt-2">Edit profil kamu disini.</p>
                </div>

                <div class="bg-purple-100 p-4 rounded-lg shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold text-purple-800">Settings</h3>
                    <p class="text-purple-600 mt-2">Pengaturan akun kamu.</p>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
