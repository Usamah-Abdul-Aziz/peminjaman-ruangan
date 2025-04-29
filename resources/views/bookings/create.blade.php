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
                        {{ $room->name }} 
                    </option>
                @endforeach
            </select>
        </div>

        <div id="room-info" class="mt-4 hidden border p-4 rounded bg-gray-100">
            <h4 class="text-lg font-semibold mb-2">Informasi Ruangan</h4>
            <p><strong>Deskripsi:</strong> <span id="room-description">-</span></p>
            <p><strong>Kapasitas:</strong> <span id="room-capacity">-</span></p>
            <p><strong>Fasilitas:</strong> <span id="room-facilities">-</span></p>
        </div>


        <div class="mb-3">
            <label for="date" class="form-label">Tanggal Peminjaman</label>
            <input type="date" name="date" value="{{ request('date') }}" class="form-control" required>
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
            if (!option.dataset.building) return;
            option.hidden = option.dataset.building !== building;
        });

        document.getElementById('room-select').value = '';
        document.getElementById('room-info').classList.add('hidden');
    });

    document.getElementById('room-select').addEventListener('change', function () {
        let roomId = this.value;
        if (!roomId) {
            document.getElementById('room-info').classList.add('hidden');
            return;
        }

        fetch(`/rooms/${roomId}/details`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('room-description').innerText = data.description || '-';
                document.getElementById('room-capacity').innerText = data.capacity || '-';
                document.getElementById('room-facilities').innerText = data.facilities || '-';
                document.getElementById('room-info').classList.remove('hidden');
            })
            .catch(error => {
                console.error('Gagal memuat data ruangan', error);
                document.getElementById('room-info').classList.add('hidden');
            });
    });
</script>
@endsection
