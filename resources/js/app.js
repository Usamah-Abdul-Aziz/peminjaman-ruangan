import './bootstrap';
import '../../vendor/masmerise/livewire-toaster/resources/js';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';

document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');

    if (calendarEl) {
        const calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin],
            initialView: 'dayGridMonth',
            events: '/calendar/events' // endpoint untuk load event dari backend
        });

        calendar.render();
    }
});