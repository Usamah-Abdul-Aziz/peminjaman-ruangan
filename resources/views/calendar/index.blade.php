@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Kalender Peminjaman Ruangan</h2>
    <div id="calendar"></div>
</div>
@endsection

@push('styles')
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.css' rel='stylesheet' />
    <style>
        #calendar {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
@endpush

@push('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'id',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: ''
                },
                selectable: true,
                events: '{{ route('calendar.events') }}',
                dateClick: function(info) {
                    const selectedDate = info.dateStr;
                    const url = '{{ route("booking.create") }}' + '?date=' + selectedDate;
                    window.location.href = url;
                }
            });

            calendar.render();
        });
    </script>
@endpush
