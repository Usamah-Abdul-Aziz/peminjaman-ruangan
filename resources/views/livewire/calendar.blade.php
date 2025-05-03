<div class="container mx-auto px-4 py-10">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Room Booking Calendar</h2>
            <a href="{{ route('booking.create') }}"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                New Booking
            </a>
        </div>

        <!-- Calendar Legend -->
        <div class="flex gap-4 mb-6">
            <span class="inline-flex items-center">
                <span class="w-3 h-3 inline-block mr-1 rounded-full bg-yellow-500"></span>
                <span class="text-sm text-gray-600">Pending</span>
            </span>
            <span class="inline-flex items-center">
                <span class="w-3 h-3 inline-block mr-1 rounded-full bg-green-500"></span>
                <span class="text-sm text-gray-600">Approved</span>
            </span>
        </div>

        <div wire:ignore class="bg-white p-5 rounded-lg">
            <div id="calendar"></div>
        </div>
    </div>
</div>

@push('styles')
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/main.min.css' rel='stylesheet' />
<link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/tippy.css" />
<style>
    /* Add hover effect to calendar dates */
    .fc-day:not(.fc-day-past):not(.fc-day-other):hover {
        background-color: #EEF2FF !important;
        cursor: pointer;
    }
    
    /* Add subtle indicator on hover */
    .fc-day:not(.fc-day-past):not(.fc-day-other):hover::after {
        content: '+';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 20px;
        color: #4F46E5;
        opacity: 0.5;
    }

    /* Style for past dates */
    .fc-day-past {
        background-color: #F3F4F6 !important;
        cursor: not-allowed !important;
    }

    /* Custom Tooltip Styles */
    .custom-tooltip {
        background: white;
        color: #1F2937;
        border-radius: 0.5rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        padding: 1rem;
        font-size: 0.875rem;
        border: 1px solid #E5E7EB;
        max-width: 300px;
    }

    .tooltip-title {
        font-weight: 600;
        color: #4F46E5;
        margin-bottom: 0.5rem;
        padding-bottom: 0.5rem;
        border-bottom: 1px solid #E5E7EB;
    }

    .tooltip-info {
        display: grid;
        gap: 0.5rem;
    }

    .tooltip-row {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .tooltip-label {
        color: #6B7280;
        font-weight: 500;
        min-width: 60px;
    }

    /* Tippy Custom Theme */
    .tippy-box[data-theme~='booking'] {
        background-color: white;
        color: #1F2937;
        border-radius: 0.5rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        border: 1px solid #E5E7EB;
    }

    .tippy-box[data-theme~='booking'] .tippy-content {
        padding: 1rem;
    }

    .event-tooltip {
        min-width: 200px;
    }

    .event-tooltip-title {
        font-weight: 600;
        font-size: 0.95rem;
        color: #4F46E5;
        padding-bottom: 0.5rem;
        margin-bottom: 0.5rem;
        border-bottom: 1px solid #E5E7EB;
    }

    .event-tooltip-content {
        font-size: 0.875rem;
    }

    .event-tooltip-row {
        display: flex;
        align-items: center;
        margin-bottom: 0.5rem;
    }

    .event-tooltip-label {
        color: #6B7280;
        font-weight: 500;
        width: 4rem;
    }

    .event-tooltip-value {
        font-weight: 500;
    }

    .status-pending {
        color: #D97706;
    }

    .status-approved {
        color: #059669;
    }

    /* Custom styles for prev/next buttons */
    .fc-prev-button,
    .fc-next-button {
        background-color: white !important;
        border: 1px solid #E5E7EB !important;
        color: #4B5563 !important;
    }

    .fc-prev-button:hover,
    .fc-next-button:hover {
        background-color: #F9FAFB !important;
        color: #111827 !important;
    }
</style>
@endpush

@push('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/tippy.js@6"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');
    
    if (calendarEl) {
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next',
                center: 'title',
                right: ''
            },
            height: 800,
            events: @json($events),
            selectable: true,
            selectConstraint: {
                start: new Date(new Date().setHours(0, 0, 0, 0)), // Set to start of today
            },
            dateClick: function(info) {
                // Allow today and future dates
                const today = new Date(new Date().setHours(0, 0, 0, 0));
                if (info.date < today) {
                    return;
                }
                window.location.href = '{{ route('booking.create') }}?date=' + info.dateStr;
            },
            dayCellDidMount: function(info) {
                // Add title attribute for tooltip
                const today = new Date(new Date().setHours(0, 0, 0, 0));
                if (info.date >= today) {
                    info.el.setAttribute('title', 'Click to create new booking');
                }
            },
            eventDidMount: function(info) {
                const content = `
                    <div class="event-tooltip">
                        <div class="event-tooltip-title">${info.event.title}</div>
                        <div class="event-tooltip-content">
                            <div class="event-tooltip-row">
                                <span class="event-tooltip-label">Status:</span>
                                <span class="event-tooltip-value ${info.event.extendedProps.status === 'Pending' ? 'status-pending' : 'status-approved'}">
                                    ${info.event.extendedProps.status}
                                </span>
                            </div>
                            <div class="event-tooltip-row">
                                <span class="event-tooltip-label">User:</span>
                                <span class="event-tooltip-value">${info.event.extendedProps.user}</span>
                            </div>
                            <div class="event-tooltip-row">
                                <span class="event-tooltip-label">Time:</span>
                                <span class="event-tooltip-value">${info.event.extendedProps.time}</span>
                            </div>
                        </div>
                    </div>
                `;

                tippy(info.el, {
                    content: content,
                    allowHTML: true,
                    placement: 'top',
                    interactive: true,
                    theme: 'booking',
                    arrow: true,
                    duration: [200, 200],
                    delay: [100, 0],
                    maxWidth: 300,
                });
            }
        });
        
        calendar.render();
        
        // Listen for Livewire events
        Livewire.on('refreshCalendar', events => {
            calendar.removeAllEvents();
            calendar.addEventSource(events);
        });
    }
});
</script>
@endpush
