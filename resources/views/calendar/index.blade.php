@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Kalender Peminjaman Ruangan</h2>
    <div 
        id="calendar" 
        data-events="{{ route('calendar.events') }}" 
        data-booking-create-url="{{ route('booking.create') }}"
        class="bg-white p-5 rounded-lg shadow-md max-w-5xl mx-auto"
    ></div>
</div>
@endsection

@push('styles')
    <!-- FullCalendar CSS dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/main.min.css" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const calendarEl = document.getElementById('calendar');

            if (calendarEl) {
                const calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: 'id',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: ''
                    },
                    selectable: true,
                    events: calendarEl.dataset.events,
                    dateClick: function (info) {
                        const selectedDate = info.dateStr; // format YYYY-MM-DD
                        const bookingUrl = calendarEl.dataset.bookingCreateUrl;
                        
                        // Langsung redirect ke halaman booking, dengan parameter tanggal
                        window.location.href = bookingUrl + '?date=' + selectedDate;
                    }
                });

                calendar.render();
            }
        });
    </script>
@endpush
