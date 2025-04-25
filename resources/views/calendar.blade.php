@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Jadwal Peminjaman Ruangan</h2>
    <div id="calendar"></div>
</div>
@endsection

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/index.global.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.8/index.global.min.css" rel="stylesheet">
@endpush

@push('scripts')
    <script type="module">
        import { Calendar } from "https://cdn.skypack.dev/@fullcalendar/core";
        import dayGridPlugin from "https://cdn.skypack.dev/@fullcalendar/daygrid";

        document.addEventListener('DOMContentLoaded', function () {
            const calendarEl = document.getElementById('calendar');

            if (calendarEl) {
                const calendar = new Calendar(calendarEl, {
                    plugins: [dayGridPlugin],
                    initialView: 'dayGridMonth',
                    events: '{{ url("/calendar/events") }}'
                });

                calendar.render();
            }
        });
    </script>
@endpush
