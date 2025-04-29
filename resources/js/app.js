import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';

document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');
    
    if (calendarEl) {
        const calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin],
            initialView: 'dayGridMonth',
            events: calendarEl.dataset.events,
            dateClick: function (info) {
                const bookingUrl = calendarEl.dataset.bookingCreateUrl;
                window.location.href = bookingUrl + '?date=' + info.dateStr;
            }
        });
        calendar.render();
    }
});
