
const calendarInit = () => {

    let c = $('#calendar');

    let calendar = new FullCalendar.Calendar(c[0], {
        slotDuration: "00:15:00",
        slotMinTime: "08:00:00",
        slotMaxTime: "19:00:00",
        themeSystem: "bootstrap",
        bootstrapFontAwesome: false,
        businessHours: true,
        buttonText: {
            today: "Today",
            month: "Month",
            week: "Week",
            day: "Day",
            list: "List",
            prev: "<<",
            next: ">>",
        },
        initialView: 'dayGridMonth',
        //eventMinHeight: 60,
        handleWindowResize: !0,
        height: $(window).height() - 200,
        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth,timeGridWeek",
        },
        events: $('#room_id').val(),
        eventSourceSuccess: ({data}) => data,
        editable: false,
        droppable: false,
        selectable: true,
        dateClick: function (dateClickInfo) {
            //console.log(dateClickInfo);
        },
        // eventClick: handleEventClick,
        selectOverlap: false,
        selectAllow: (selectInfo) => (!selectInfo.allDay),
        // select: handleSelect,
        eventTimeFormat: {
            hour: 'numeric',
            meridiem: 'short'
        }
    });

    calendar.render();

    return calendar;
}
