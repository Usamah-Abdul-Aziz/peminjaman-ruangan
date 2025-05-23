import './bootstrap';
import '../../vendor/masmerise/livewire-toaster/resources/js';

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
