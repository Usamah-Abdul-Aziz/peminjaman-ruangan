@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Form Peminjaman Ruangan</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('booking.store') }}">
        @csrf
        <div class="mb-3">
            <label for="room_id" class="form-label">Ruangan</label>
            <select name="room_id" class="form-select" required>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Tanggal Peminjaman</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajukan</button>
    </form>
</div>
@endsection
