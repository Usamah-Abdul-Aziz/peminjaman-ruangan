@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Daftar Pengajuan Peminjaman Ruangan</h2>

    <!-- Filter -->
    <form method="GET" action="{{ route('admin.bookings.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div>
            <label for="search" class="block text-sm font-semibold text-gray-600">Cari Nama Pengguna</label>
            <input type="text" name="search" id="search" value="{{ request('search') }}"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                placeholder="Nama pengguna...">
        </div>
        <div>
            <label for="date" class="block text-sm font-semibold text-gray-600">Tanggal</label>
            <input type="date" name="date" id="date" value="{{ request('date') }}"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div class="flex items-end">
            <button type="submit"
                class="w-full inline-flex justify-center py-2 px-4 rounded-lg text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 shadow">
                Filter
            </button>
        </div>
        <div class="flex items-end">
            <a href="{{ route('admin.bookings.index') }}"
                class="w-full inline-flex justify-center py-2 px-4 rounded-lg text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 shadow">
                Reset
            </a>
        </div>
    </form>

    <!-- Table -->
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100 text-gray-600 text-xs uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-3 text-left font-medium">Nama Pengguna</th>
                    <th class="px-6 py-3 text-left font-medium">Ruangan</th>
                    <th class="px-6 py-3 text-left font-medium">Tanggal</th>
                    <th class="px-6 py-3 text-left font-medium">Status</th>
                    <th class="px-6 py-3 text-center font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                @forelse($pendingBookings as $booking)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $booking->user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $booking->room->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap capitalize">{{ $booking->status }}</td>
                        <td class="px-6 py-4 text-center whitespace-nowrap space-x-2">
                            <form action="{{ route('admin.bookings.approve', $booking->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit"
                                    class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white text-xs font-semibold rounded">
                                    Setujui
                                </button>
                            </form>
                            <form action="{{ route('admin.bookings.reject', $booking->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit"
                                    class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white text-xs font-semibold rounded">
                                    Tolak
                                </button>
                            </form>
                            <form action="{{ route('admin.bookings.cancel', $booking->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit"
                                    class="px-3 py-1 bg-yellow-400 hover:bg-yellow-500 text-black text-xs font-semibold rounded">
                                    Batalkan
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-6 text-center text-gray-500 italic">Tidak ada pengajuan peminjaman ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
