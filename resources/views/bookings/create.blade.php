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
            <label for="building" class="form-label">Gedung</label>
            <select id="building-select" class="form-select" required>
                <option value="">-- Pilih Gedung --</option>
                @foreach($buildings as $building)
                    <option value="{{ $building }}">{{ $building }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="room_id" class="form-label">Ruangan</label>
            <select name="room_id" id="room-select" class="form-select" required>
                <option value="">-- Pilih Ruangan --</option>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}" data-building="{{ $room->building }}">
                        {{ $room->name }} (Kapasitas: {{ $room->capacity }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Tanggal Peminjaman</label>
            <input type="date" name="date" class="form-control" value="{{ request('date') ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
            <input type="time" name="waktu_mulai" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
            <input type="time" name="waktu_selesai" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajukan</button>
    </form>
</div>

<script>
    document.getElementById('building-select').addEventListener('change', function () {
        let building = this.value;
        let roomOptions = document.querySelectorAll('#room-select option');

        roomOptions.forEach(option => {
            if (!option.dataset.building) return; // skip default option
            option.hidden = option.dataset.building !== building;
        });

        document.getElementById('room-select').value = ''; // reset room select
    });
</script>
@endsection
