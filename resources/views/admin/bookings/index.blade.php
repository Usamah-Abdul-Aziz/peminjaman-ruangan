@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Pengajuan Peminjaman Ruangan</h2>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    @if($pendingBookings->isEmpty())
        <p class="mt-3">Tidak ada pengajuan yang menunggu persetujuan.</p>
    @else
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Nama Pengguna</th>
                    <th>Ruangan</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pendingBookings as $booking)
                    <tr>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->room->name }}</td>
                        <td>{{ $booking->date }}</td>
                        <td>{{ ucfirst($booking->status) }}</td>
                        <td>
                            <form action="{{ route('admin.bookings.approve', $booking->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                            </form>

                            <form action="{{ route('admin.bookings.reject', $booking->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                            </form>

                            <form action="{{ route('admin.bookings.cancel', $booking->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm">Batalkan</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
